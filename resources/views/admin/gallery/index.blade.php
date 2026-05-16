@extends('admin.layouts.app')
@section('title','Gallery | Admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold text-primary mb-0">Gallery</h4>
        <nav><ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-primary">Dashboard</a></li>
            
            <li class="breadcrumb-item active">Gallery</li>
        </ol></nav>
    </div>
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary btn-sm px-4 rounded-pill">+ Upload Image</a>
</div>
@if(session('success'))<div class="alert alert-success alert-dismissible fade show"><i class="fas fa-check-circle me-2"></i>{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>@endif
@if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
<div class="row g-3">
@forelse($images as $img)
<div class="col-6 col-md-3 col-lg-2">
    <div class="card border-0 shadow-sm">
        <img src="{{ asset('uploads/gallery/' . $img->image) }}" class="card-img-top" style="height:130px;object-fit:cover;">
        <div class="card-body p-2 text-center">
            <small class="d-block text-muted text-truncate">{{ $img->title ?? 'Untitled' }}</small>
            <small class="badge bg-{{ $img->status ? 'success' : 'secondary' }}">{{ $img->status ? 'Visible' : 'Hidden' }}</small>
            <div class="d-flex gap-1 mt-2 justify-content-center">
                <a href="{{ route('admin.gallery.edit', $img->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.gallery.destroy', $img->id) }}" method="POST" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Del</button></form>
            </div>
        </div>
    </div>
</div>
@empty
<div class="col-12 text-center py-5 text-muted"><i class="fas fa-images fa-3x mb-2 d-block"></i>No images yet.</div>
@endforelse
</div>
<div class="mt-4">{{ $images->links() }}</div>
@endsection
