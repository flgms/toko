@extends('layouts.app')

@section('title', 'Pesanan Berhasil - Toko Online')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center py-5">
                    <i class="fas fa-check-circle fa-5x text-success mb-4"></i>
                    <h2 class="mb-3">Pesanan Berhasil Dibuat!</h2>
                    <p class="text-muted mb-4">Terima kasih telah berbelanja. Pesanan Anda sedang diproses.</p>
                    
                    <div class="alert alert-info">
                        <strong>Nomor Pesanan:</strong> {{ $order->order_number }}
                    </div>

                    <div class="row text-start mb-4">
                        <div class="col-md-6">
                            <h5>Detail Pesanan:</h5>
                            <p class="mb-1"><strong>Total:</strong> Rp {{ number_format($order->total, 0, ',', '.') }}</p>
                            <p class="mb-1"><strong>Status:</strong> 
                                <span class="badge bg-warning">{{ ucfirst($order->status) }}</span>
                            </p>
                            <p class="mb-1"><strong>Pembayaran:</strong> {{ $order->payment_method }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Alamat Pengiriman:</h5>
                            <p class="mb-0">{{ $order->shipping_address }}</p>
                        </div>
                    </div>

                    <h5 class="text-start mb-3">Produk yang Dibeli:</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderDetails as $detail)
                                <tr>
                                    <td>{{ $detail->product->name }}</td>
                                    <td>Rp {{ number_format($detail->price, 0, ',', '.') }}</td>
                                    <td>{{ $detail->quantity }}</td>
                                    <td>Rp {{ number_format($detail->price * $detail->quantity, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('order.index') }}" class="btn btn-primary">
                            <i class="fas fa-list"></i> Lihat Semua Pesanan
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-home"></i> Kembali ke Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection