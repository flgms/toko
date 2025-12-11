@extends('layouts.app')

@section('title', $category->name . ' - Toko Online')

@section('content')
<div class="container my-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">{{ $category->name }}</li>
        </ol>
    </nav>

    <!-- Category Header -->
    <div class="text-center mb-5">
        <h1 class="display-5">{{ $category->name }}</h1>
        @if($category->description)
        <p class="lead text-muted">{{ $category->description }}</p>
        @endif
    </div>

    <!-- Products -->
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

    <!-- Pagination -->
<div class="d-flex justify-content-center mt-4">
    <nav>
        <ul class="pagination">
            @if ($products->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">« Previous</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $products->previousPageUrl() }}">« Previous</a>
                </li>
            @endif

            <li class="page-item disabled">
                <span class="page-link">Page {{ $products->currentPage() }} of {{ $products->lastPage() }}</span>
            </li>

            @if ($products->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $products->nextPageUrl() }}">Next »</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">Next »</span>
                </li>
            @endif
        </ul>
    </nav>
</div>
@endif
@endsection
