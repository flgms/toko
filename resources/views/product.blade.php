@extends('layouts.app')

@section('title', $product->name . ' - Toko Online')

@section('content')
<div class="container my-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category', $product->category->slug) }}">{{ $product->category->name }}</a></li>
            <li class="breadcrumb-item active">{{ $product->name }}</li>
        </ol>
    </nav>

    <!-- Product Detail -->
    <div class="row">
        <div class="col-md-6">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded" alt="{{ $product->name }}">
            @else
                <img src="https://via.placeholder.com/600x400?text=No+Image" class="img-fluid rounded" alt="No Image">
            @endif
        </div>
        <div class="col-md-6">
            <span class="badge bg-secondary mb-2">{{ $product->category->name }}</span>
            <h1 class="mb-3">{{ $product->name }}</h1>
            <h2 class="text-primary mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</h2>
            
            <div class="mb-4">
                <h5>Deskripsi:</h5>
                <p class="text-muted">{{ $product->description ?? 'Tidak ada deskripsi.' }}</p>
            </div>

            <div class="mb-4">
                <h5>Stok: 
                    @if($product->stock > 0)
                        <span class="badge bg-success">{{ $product->stock }} unit</span>
                    @else
                        <span class="badge bg-danger">Habis</span>
                    @endif
                </h5>
            </div>

            @auth
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Jumlah:</label>
                    <input type="number" name="quantity" class="form-control w-25" value="1" min="1" max="{{ $product->stock }}" {{ $product->stock < 1 ? 'disabled' : '' }}>
                </div>
                <button type="submit" class="btn btn-primary btn-lg" {{ $product->stock < 1 ? 'disabled' : '' }}>
                    <i class="fas fa-cart-plus"></i> 
                    @if($product->stock < 1)
                        Stok Habis
                    @else
                        Tambah ke Keranjang
                    @endif
                </button>
            </form>
            @else
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-sign-in-alt"></i> Login untuk Membeli
            </a>
            @endauth
        </div>
    </div>

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
    <div class="mt-5">
        <h3 class="mb-4">Produk Terkait</h3>
        <div class="row">
            @foreach($relatedProducts as $related)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    @if($related->image)
                        <img src="{{ asset('storage/' . $related->image) }}" class="card-img-top product-image" alt="{{ $related->name }}">
                    @else
                        <img src="https://via.placeholder.com/300x250?text=No+Image" class="card-img-top product-image" alt="No Image">
                    @endif
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $related->name }}</h5>
                        <h4 class="text-primary mt-auto">Rp {{ number_format($related->price, 0, ',', '.') }}</h4>
                        <a href="{{ route('product.show', $related->slug) }}" class="btn btn-outline-primary btn-sm mt-2">
                            <i class="fas fa-eye"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection