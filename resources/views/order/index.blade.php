@extends('layouts.app')

@section('title', 'Pesanan Saya - Toko Online')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">
        <i class="fas fa-box"></i> Pesanan Saya
    </h2>

    @if($orders->count() > 0)
    <div class="row">
        @foreach($orders as $order)
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <h6 class="mb-1">Nomor Pesanan:</h6>
                            <p class="mb-0 text-primary fw-bold">{{ $order->order_number }}</p>
                        </div>
                        <div class="col-md-2">
                            <h6 class="mb-1">Tanggal:</h6>
                            <p class="mb-0">{{ $order->created_at->format('d M Y') }}</p>
                        </div>
                        <div class="col-md-2">
                            <h6 class="mb-1">Total:</h6>
                            <p class="mb-0 fw-bold">Rp {{ number_format($order->total, 0, ',', '.') }}</p>
                        </div>
                        <div class="col-md-2">
                            <h6 class="mb-1">Status:</h6>
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
                        <div class="col-md-3 text-end">
                            <a href="{{ route('order.show', $order->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i> Lihat Detail
                            </a>
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
            @if ($orders->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">« Previous</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $orders->previousPageUrl() }}">« Previous</a>
                </li>
            @endif

            <li class="page-item disabled">
                <span class="page-link">Page {{ $orders->currentPage() }} of {{ $orders->lastPage() }}</span>
            </li>

            @if ($orders->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $orders->nextPageUrl() }}">Next »</a>
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
</div>
@endsection