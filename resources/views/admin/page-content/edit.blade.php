@extends('admin.layouts.app')
@section('title','Edit ' . ucwords($page->title ?? $slug) . ' | Admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-primary mb-0">Edit: {{ $page->title ?? ucwords(str_replace('-', ' ', $slug)) }}</h4>
    <a href="{{ route('admin.page-content.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill">← Back</a>
</div>
@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
<div class="card border-0 shadow-sm"><div class="card-body p-4">
<form action="{{ route('admin.page-content.update', $slug) }}" method="POST">@csrf @method('PUT')
    <div class="row g-3">
        <div class="col-md-6"><label class="form-label fw-semibold">Page Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $page->title) }}"></div>
        <div class="col-md-6"><label class="form-label fw-semibold">Meta Title</label>
            <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $page->meta_title) }}" placeholder="SEO page title"></div>
        <div class="col-12"><label class="form-label fw-semibold">Meta Description</label>
            <textarea name="meta_description" class="form-control" rows="2" placeholder="SEO description (150-160 chars)">{{ old('meta_description', $page->meta_description) }}</textarea></div>
        <div class="col-12"><label class="form-label fw-semibold">Content (HTML)</label>
            <textarea name="content" id="pageContent" class="form-control" rows="20" style="font-family:monospace;font-size:.85rem;">{{ old('content', $page->content) }}</textarea>
            <small class="text-muted">You can use HTML tags for formatting.</small>
        </div>
        <div class="col-12 d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4 rounded-pill">Save Changes</button>
            <a href="{{ route('admin.page-content.index') }}" class="btn btn-outline-secondary px-4 rounded-pill">Cancel</a>
        </div>
    </div>
</form>
</div></div>
@endsection
