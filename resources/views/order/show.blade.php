@extends('layouts.app')

@section('title', 'Detail Pesanan - Toko Online')

@section('content')
<div class="container my-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Pesanan Saya</a></li>
            <li class="breadcrumb-item active">{{ $order->order_number }}</li>
        </ol>
    </nav>

    <h2 class="mb-4">
        <i class="fas fa-receipt"></i> Detail Pesanan
    </h2>

    <div class="row">
        <div class="col-md-8">
            <!-- Order Info -->
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Informasi Pesanan</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h6>Nomor Pesanan:</h6>
                            <p class="text-primary fw-bold">{{ $order->order_number }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h6>Tanggal Pesanan:</h6>
                            <p>{{ $order->created_at->format('d F Y, H:i') }} WIB</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h6>Status:</h6>
                            @if($order->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($order->status == 'processing')
                                <span class="badge bg-info">Diproses</span>
                            @elseif($order->status == 'completed')
                                <span class="badge bg-success">Selesai</span>
                            @else
                                <span class="badge bg-danger">Dibatalkan</span>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <h6>Metode Pembayaran:</h6>
                            <p>{{ $order->payment_method }}</p>
                        </div>
                        <div class="col-md-12">
                            <h6>Alamat Pengiriman:</h6>
                            <p>{{ $order->shipping_address }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Produk yang Dibeli</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderDetails as $detail)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($detail->product->image)
                                                <img src="{{ asset('storage/' . $detail->product->image) }}" class="rounded me-2" width="50" alt="{{ $detail->product->name }}">
                                            @else
                                                <img src="https://via.placeholder.com/50" class="rounded me-2" width="50" alt="No Image">
                                            @endif
                                            <span>{{ $detail->product->name }}</span>
                                        </div>
                                    </td>
                                    <td>Rp {{ number_format($detail->price, 0, ',', '.') }}</td>
                                    <td>{{ $detail->quantity }}</td>
                                    <td class="text-end">Rp {{ number_format($detail->price * $detail->quantity, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Summary -->
        <div class="col-md-4">
            <div class="card sticky-top" style="top: 20px;">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Ringkasan Pesanan</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total Item:</span>
                        <span class="fw-bold">{{ $order->orderDetails->sum('quantity') }} item</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Subtotal:</span>
                        <span>Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="fw-bold">Total:</span>
                        <span class="fw-bold text-primary fs-4">Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                    </div>
                    <a href="{{ route('order.index') }}" class="btn btn-outline-primary w-100">
                        <i class="fas fa-arrow-left"></i> Kembali ke Pesanan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection