<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(12);
        $categories = Category::all();  // ← Pastikan baris ini ada!
        return view('home', compact('products', 'categories'));  // ← Pastikan categories dikirim!
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::where('category_id', $category->id)->paginate(12);
        $categories = Category::all();
        return view('category', compact('products', 'category', 'categories'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->with('category')->firstOrFail();
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();
        return view('product', compact('product', 'relatedProducts'));
    }
}