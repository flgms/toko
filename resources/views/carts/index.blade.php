@extends('layouts.app')

@section('title', 'Keranjang Belanja - Toko Online')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">
        <i class="fas fa-shopping-cart"></i> Keranjang Belanja
    </h2>

    @if($carts->count() > 0)
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @foreach($carts as $cart)
                    <div class="row mb-3 pb-3 border-bottom">
                        <div class="col-md-2">
                            @if($cart->product->image)
                                <img src="{{ asset('storage/' . $cart->product->image) }}" class="img-fluid rounded" alt="{{ $cart->product->name }}">
                            @else
                                <img src="https://via.placeholder.com/100" class="img-fluid rounded" alt="No Image">
                            @endif
                        </div>
                        <div class="col-md-4">
                            <h5>{{ $cart->product->name }}</h5>
                            <p class="text-muted mb-0">{{ $cart->product->category->name }}</p>
                        </div>
                        <div class="col-md-2">
                            <p class="mb-0 fw-bold">Rp {{ number_format($cart->product->price, 0, ',', '.') }}</p>
                        </div>
                        <div class="col-md-2">
                            <form action="{{ route('cart.update', $cart->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="input-group input-group-sm">
                                    <input type="number" name="quantity" class="form-control" value="{{ $cart->quantity }}" min="1" max="{{ $cart->product->stock }}" onchange="this.form.submit()">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-2 text-end">
                            <p class="mb-2 fw-bold text-primary">
                                Rp {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}
                            </p>
                            <form action="{{ route('cart.remove', $cart->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Ringkasan Belanja</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total Item:</span>
                        <span class="fw-bold">{{ $carts->sum('quantity') }} item</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Total Harga:</span>
                        <span class="fw-bold text-primary fs-4">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <hr>
                    <a href="{{ route('checkout') }}" class="btn btn-primary w-100 btn-lg">
                        <i class="fas fa-check"></i> Checkout
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary w-100 mt-2">
                        <i class="fas fa-arrow-left"></i> Lanjut Belanja
                    </a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="text-center py-5">
        <i class="fas fa-shopping-cart fa-5x text-muted mb-3"></i>
        <h3>Keranjang Belanja Kosong</h3>
        <p class="text-muted">Belum ada produk di keranjang Anda.</p>
        <a href="{{ route('home') }}" class="btn btn-primary">
            <i class="fas fa-shopping-bag"></i> Mulai Belanja
        </a>
    </div>
    @endif
</div>
@endsection