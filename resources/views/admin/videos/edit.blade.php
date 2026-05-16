@extends('admin.layouts.app')
@section('title','Edit Video | Admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-primary mb-0">Edit Video</h4>
    <a href="{{ route('admin.videos.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill">← Back</a>
</div>
@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
<div class="card border-0 shadow-sm"><div class="card-body p-4">
<form action="{{ route('admin.videos.update', $video->id) }}" method="POST">@csrf @method('PUT')
    <div class="row g-3">
        <div class="col-12"><label class="form-label fw-semibold">YouTube URL *</label>
            <input type="url" name="youtube_url" class="form-control"
                value="{{ old('youtube_url', $video->youtube_url) }}" required
                placeholder="https://www.youtube.com/watch?v=XXXXX">
            <small class="text-muted">Current video ID: <code>{{ $video->youtube_id }}</code></small></div>
        <div class="col-md-8"><label class="form-label fw-semibold">Title *</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $video->title) }}" required></div>
        <div class="col-md-4"><label class="form-label fw-semibold">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $video->sort_order) }}"></div>
        <div class="col-12"><label class="form-label fw-semibold">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $video->description) }}</textarea></div>
        <div class="col-12">
            <div class="form-check">
                <input type="hidden" name="status" value="0">
                <input class="form-check-input" type="checkbox" name="status" value="1" id="status"
                    {{ old('status', $video->status) ? 'checked' : '' }}>
                <label class="form-check-label fw-semibold" for="status">Active (visible on site)</label>
            </div>
        </div>
        <div class="col-12 d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4 rounded-pill">Save Changes</button>
            <a href="{{ route('admin.videos.index') }}" class="btn btn-outline-secondary px-4 rounded-pill">Cancel</a>
        </div>
    </div>
</form>
</div></div>
@endsection
