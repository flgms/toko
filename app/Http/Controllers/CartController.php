<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $carts = Cart::with('product')->where('user_id', Auth::id())->get();
        $total = 0;
        
        foreach($carts as $cart) {
            $total += $cart->product->price * $cart->quantity;
        }
        
        return view('carts.index', [
            'carts' => $carts,
            'total' => $total
        ]);
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->first();

        if ($cart) {
            $cart->quantity += $request->quantity ?? 1;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'quantity' => $request->quantity ?? 1
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::where('user_id', Auth::id())->findOrFail($id);
        $cart->update(['quantity' => $request->quantity]);
        
        return redirect()->back()->with('success', 'Keranjang berhasil diupdate!');
    }

    public function remove($id)
    {
        $cart = Cart::where('user_id', Auth::id())->findOrFail($id);
        $cart->delete();
        
        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}
