@extends('admin.layouts.app')
@section('title','Order Details | Admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-primary mb-0">Order — {{ $order->order_number }}</h4>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill">← Back</a>
</div>
@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-header fw-bold">Customer Details</div>
            <div class="card-body">
                <div class="row g-2 small">
                    <div class="col-md-6"><strong>Name:</strong> {{ $order->customer_name }}</div>
                    <div class="col-md-6"><strong>Phone:</strong> {{ $order->customer_phone }}</div>
                    <div class="col-md-6"><strong>Email:</strong> {{ $order->customer_email ?? '—' }}</div>
                    <div class="col-md-6"><strong>Payment:</strong> <span class="badge bg-success text-dark">{{ strtoupper($order->payment_method) }}</span></div>
                    @if($order->mpesa_transaction_code)
                    <div class="col-12"><strong>M-Pesa Code:</strong> <code>{{ $order->mpesa_transaction_code }}</code></div>
                    @endif
                    @if($order->customer_notes)
                    <div class="col-12"><strong>Notes:</strong> {{ $order->customer_notes }}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card border-0 shadow-sm">
            <div class="card-header fw-bold">Order Items</div>
            <div class="card-body p-0">
                <table class="table align-middle mb-0 small">
                    <thead class="table-light"><tr><th>Product</th><th>Qty</th><th>Unit Price</th><th>Subtotal</th></tr></thead>
                    <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>KES {{ number_format($item->unit_price) }}</td>
                        <td class="fw-bold">KES {{ number_format($item->subtotal) }}</td>
                    </tr>
                    @endforeach
                    <tr class="table-light"><td colspan="3" class="text-end fw-bold">Total</td><td class="fw-bold text-primary fs-6">KES {{ number_format($order->total_amount) }}</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header fw-bold">Update Status</div>
            <div class="card-body">
                <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST">@csrf @method('PATCH')
                    <div class="mb-3"><label class="form-label fw-semibold small">Status</label>
                        <select name="status" class="form-select">
                            @foreach(['pending','confirmed','processing','completed','cancelled'] as $s)
                            <option value="{{ $s }}" {{ $order->status === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3"><label class="form-label fw-semibold small">Admin Notes</label>
                        <textarea name="admin_notes" class="form-control" rows="3">{{ $order->admin_notes }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 rounded-pill">Update Order</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
