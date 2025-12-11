@extends('layouts.app')

@section('title', 'Checkout - Toko Online')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">
        <i class="fas fa-credit-card"></i> Checkout
    </h2>

    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <div class="row">
            <!-- Order Summary -->
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Produk yang Dibeli</h5>
                    </div>
                    <div class="card-body">
                        @foreach($carts as $cart)
                        <div class="row mb-3 pb-3 border-bottom">
                            <div class="col-md-2">
                                @if($cart->product->image)
                                    <img src="{{ asset('storage/' . $cart->product->image) }}" class="img-fluid rounded" alt="{{ $cart->product->name }}">
                                @else
                                    <img src="https://via.placeholder.com/80" class="img-fluid rounded" alt="No Image">
                                @endif
                            </div>
                            <div class="col-md-6">
                                <h6>{{ $cart->product->name }}</h6>
                                <p class="text-muted mb-0">Jumlah: {{ $cart->quantity }}</p>
                            </div>
                            <div class="col-md-4 text-end">
                                <p class="mb-0 fw-bold text-primary">
                                    Rp {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Alamat Pengiriman</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                            <textarea name="shipping_address" class="form-control @error('shipping_address') is-invalid @enderror" rows="4" required placeholder="Masukkan alamat lengkap untuk pengiriman...">{{ old('shipping_address') }}</textarea>
                            @error('shipping_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Metode Pembayaran</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="payment_method" id="bank_transfer" value="Bank Transfer" checked>
                            <label class="form-check-label" for="bank_transfer">
                                <i class="fas fa-university"></i> Transfer Bank
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="payment_method" id="cod" value="COD">
                            <label class="form-check-label" for="cod">
                                <i class="fas fa-money-bill-wave"></i> Cash on Delivery (COD)
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="payment_method" id="ewallet" value="E-Wallet">
                            <label class="form-check-label" for="ewallet">
                                <i class="fas fa-wallet"></i> E-Wallet
                            </label>
                        </div>
                        @error('payment_method')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Total & Submit -->
            <div class="col-md-4">
                <div class="card sticky-top" style="top: 20px;">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Ringkasan Pembayaran</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Item:</span>
                            <span class="fw-bold">{{ $carts->sum('quantity') }} item</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Subtotal:</span>
                            <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="fw-bold">Total Pembayaran:</span>
                            <span class="fw-bold text-primary fs-4">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 btn-lg">
                            <i class="fas fa-check-circle"></i> Buat Pesanan
                        </button>
                        <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary w-100 mt-2">
                            <i class="fas fa-arrow-left"></i> Kembali ke Keranjang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection