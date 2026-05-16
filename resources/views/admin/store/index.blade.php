@extends('admin.layouts.app')
@section('title','Store | Admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-primary mb-0">Store / My Book</h4>
    <a href="{{ route('admin.store.create') }}" class="btn btn-primary btn-sm px-4 rounded-pill">+ Add Product</a>
</div>
@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<div class="card border-0 shadow-sm"><div class="card-body p-0">
<table class="table table-hover align-middle mb-0 small">
    <thead class="table-light"><tr><th>Image</th><th>Title</th><th>Price</th><th>Featured</th><th>Status</th><th>Actions</th></tr></thead>
    <tbody>
    @forelse($products as $product)
    <tr>
        <td>@if($product->image)<img src="{{ asset('uploads/store/' . $product->image) }}" width="60" height="40" style="object-fit:cover;border-radius:5px;">@else<span class="text-muted">—</span>@endif</td>
        <td><strong>{{ $product->title }}</strong><br><small class="text-muted">{{ Str::limit($product->short_description, 50) }}</small></td>
        <td class="fw-bold text-primary">{{ $product->formatted_price }}</td>
        <td>@if($product->is_featured)<span class="badge bg-warning text-dark">⭐ Yes</span>@else<span class="text-muted">—</span>@endif</td>
        <td><span class="badge bg-{{ $product->status === 'active' ? 'success' : 'secondary' }}">{{ ucfirst($product->status) }}</span></td>
        <td class="d-flex gap-2">
            <a href="{{ route('admin.store.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('admin.store.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">Del</button></form>
        </td>
    </tr>
    @empty
    <tr><td colspan="6" class="text-center py-4 text-muted">No products yet.</td></tr>
    @endforelse
    </tbody>
</table></div></div>
@endsection
