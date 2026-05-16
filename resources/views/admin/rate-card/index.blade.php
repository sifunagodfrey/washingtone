@extends('admin.layouts.app')
@section('title','Rate Card | Admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-primary mb-0">Rate Card Packages</h4>
    <a href="{{ route('admin.rate-card.create') }}" class="btn btn-primary btn-sm px-4 rounded-pill">+ Add Package</a>
</div>
@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<div class="card border-0 shadow-sm"><div class="card-body p-0">
<table class="table table-hover align-middle mb-0 small">
    <thead class="table-light"><tr><th>#</th><th>Category</th><th>Package</th><th>Price</th><th>Per</th><th>Featured</th><th>Status</th><th>Actions</th></tr></thead>
    <tbody>
    @forelse($packages as $pkg)
    <tr>
        <td>{{ $pkg->id }}</td>
        <td><span class="badge bg-light text-dark">{{ $pkg->category }}</span></td>
        <td><strong>{{ $pkg->title }}</strong></td>
        <td class="fw-bold text-primary">KES {{ number_format($pkg->price) }}</td>
        <td class="text-muted">{{ $pkg->price_suffix ?? '—' }}</td>
        <td>@if($pkg->is_featured)<span class="badge bg-warning text-dark">⭐ Featured</span>@else<span class="text-muted">—</span>@endif</td>
        <td><span class="badge bg-{{ $pkg->status ? 'success' : 'secondary' }}">{{ $pkg->status ? 'Active' : 'Hidden' }}</span></td>
        <td class="d-flex gap-2">
            <a href="{{ route('admin.rate-card.edit', $pkg->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('admin.rate-card.destroy', $pkg->id) }}" method="POST" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">Del</button></form>
        </td>
    </tr>
    @empty
    <tr><td colspan="8" class="text-center py-4 text-muted">No packages yet.</td></tr>
    @endforelse
    </tbody>
</table></div></div>
@endsection
