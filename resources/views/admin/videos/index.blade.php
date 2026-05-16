@extends('admin.layouts.app')
@section('title','Videos | Admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold text-primary mb-0">Videos</h4>
        <nav><ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-primary">Dashboard</a></li>
            
            <li class="breadcrumb-item active">Videos</li>
        </ol></nav>
    </div>
    <a href="{{ route('admin.videos.create') }}" class="btn btn-primary btn-sm px-4 rounded-pill">+ Add Video</a>
</div>
@if(session('success'))<div class="alert alert-success alert-dismissible fade show"><i class="fas fa-check-circle me-2"></i>{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>@endif
@if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
<div class="card border-0 shadow-sm"><div class="card-body p-0">
<table class="table table-hover align-middle mb-0 small">
    <thead class="table-light"><tr><th>Thumbnail</th><th>Title</th><th>YouTube ID</th><th>Status</th><th>Actions</th></tr></thead>
    <tbody>
    @forelse($videos as $video)
    <tr>
        <td><img src="{{ $video->thumbnail_url }}" width="100" height="60" style="object-fit:cover;border-radius:6px;" alt=""></td>
        <td><strong>{{ $video->title }}</strong></td>
        <td><a href="{{ $video->youtube_url }}" target="_blank" class="text-primary small">{{ $video->youtube_id }}</a></td>
        <td><span class="badge bg-{{ $video->status ? 'success' : 'secondary' }}">{{ $video->status ? 'Active' : 'Hidden' }}</span></td>
        <td class="d-flex gap-2">
            <a href="{{ route('admin.videos.edit', $video->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('admin.videos.destroy', $video->id) }}" method="POST" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button></form>
        </td>
    </tr>
    @empty
    <tr><td colspan="5" class="text-center py-4 text-muted">No videos yet.</td></tr>
    @endforelse
    </tbody>
</table></div></div>
<div class="mt-3">{{ $videos->links() }}</div>
@endsection
