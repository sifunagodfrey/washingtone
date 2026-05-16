@extends('admin.layouts.app')
@section('title','Orders | Admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-primary mb-0">Store Orders</h4>
</div>
@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<div class="card border-0 shadow-sm"><div class="card-body p-0">
<table class="table table-hover align-middle mb-0 small">
    <thead class="table-light"><tr><th>Order #</th><th>Customer</th><th>Phone</th><th>Payment</th><th>Amount</th><th>Status</th><th>Date</th><th>Action</th></tr></thead>
    <tbody>
    @forelse($orders as $order)
    <tr>
        <td><a href="{{ route('admin.orders.show', $order->id) }}" class="text-primary fw-bold">{{ $order->order_number }}</a></td>
        <td>{{ $order->customer_name }}</td>
        <td>{{ $order->customer_phone }}</td>
        <td><span class="badge bg-{{ $order->payment_method === 'mpesa' ? 'success' : 'info' }} text-dark">{{ strtoupper($order->payment_method) }}</span></td>
        <td class="fw-bold">KES {{ number_format($order->total_amount) }}</td>
        <td><span class="badge bg-{{ $order->status_badge }}">{{ ucfirst($order->status) }}</span></td>
        <td>{{ $order->created_at->format('d M Y') }}</td>
        <td><a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary">View</a></td>
    </tr>
    @empty
    <tr><td colspan="8" class="text-center py-4 text-muted">No orders yet.</td></tr>
    @endforelse
    </tbody>
</table></div></div>
<div class="mt-3">{{ $orders->links() }}</div>
@endsection
