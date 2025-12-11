@extends('layouts.app')

@section('title', 'Home - Toko Online')

@section('content')
<div class="container my-5">
    <!-- Header -->
    <div class="text-center mb-5">
        <h1 class="display-4">Selamat Datang di Toko Online</h1>
        <p class="lead text-muted">Temukan produk berkualitas dengan harga terbaik</p>
    </div>

    <!-- Categories -->
    @if($categories->count() > 0)
    <div class="mb-4">
        <h3 class="mb-3">Kategori</h3>
        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-3 mb-3">
                <a href="{{ route('category', $category->slug) }}" class="text-decoration-none">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-tag fa-3x text-primary mb-3"></i>
                            <h5 class="card-title">{{ $category->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Products -->
    <div class="mb-4">
        <h3 class="mb-3">Produk Terbaru</h3>
        
        @if($products->count() > 0)
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top product-image" alt="{{ $product->name }}">
                    @else
                        <img src="https://via.placeholder.com/300x250?text=No+Image" class="card-img-top product-image" alt="No Image">
                    @endif
                    
                    <div class="card-body d-flex flex-column">
                        <span class="badge bg-secondary mb-2">{{ $product->category->name }}</span>
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted small">
                            {{ Str::limit($product->description, 60) }}
                        </p>
                        <div class="mt-auto">
                            <h4 class="text-primary mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</h4>
                            <div class="d-flex gap-2">
                                <a href="{{ route('product.show', $product->slug) }}" class="btn btn-outline-primary btn-sm flex-grow-1">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                                @auth
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex-grow-1">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm w-100" {{ $product->stock < 1 ? 'disabled' : '' }}>
                                        <i class="fas fa-cart-plus"></i> 
                                        @if($product->stock < 1)
                                            Habis
                                        @else
                                            Beli
                                        @endif
                                    </button>
                                </form>
                                @else
                                <a href="{{ route('login') }}" class="btn btn-primary btn-sm flex-grow-1">
                                    <i class="fas fa-cart-plus"></i> Beli
                                </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination Simple -->
        <div class="d-flex justify-content-between mt-4">
            @if($products->previousPageUrl())
                <a href="{{ $products->previousPageUrl() }}" class="btn btn-primary">← Previous</a>
            @else
                <button class="btn btn-secondary" disabled>← Previous</button>
            @endif
            
            <span class="align-self-center">Halaman {{ $products->currentPage() }} dari {{ $products->lastPage() }}</span>
            
            @if($products->nextPageUrl())
                <a href="{{ $products->nextPageUrl() }}" class="btn btn-primary">Next →</a>
            @else
                <button class="btn btn-secondary" disabled>Next →</button>
            @endif
        </div>
        
        @else
        <div class="alert alert-info text-center">
            <i class="fas fa-info-circle"></i> Belum ada produk tersedia.
        </div>
        @endif
    </div>
</div>
@endsection