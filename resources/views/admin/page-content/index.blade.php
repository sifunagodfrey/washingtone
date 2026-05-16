@extends('admin.layouts.app')
@section('title','Page Content | Admin')
@section('content')
<div class="mb-4"><h4 class="fw-bold text-primary mb-0">Page Content</h4><p class="text-muted small">Edit static page content — Biography, Privacy Policy, Terms & Conditions.</p></div>
@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<div class="row g-3">
@foreach($pages as $page)
<div class="col-md-6 col-lg-3">
    <div class="card border-0 shadow-sm h-100">
        <div class="card-body text-center p-4">
            <i class="fas fa-file-alt fa-3x text-primary mb-3 d-block"></i>
            <h6 class="fw-bold">{{ $page->title }}</h6>
            <p class="small text-muted mb-3">{{ $page->page_slug }}</p>
            <a href="{{ route('admin.page-content.edit', $page->page_slug) }}" class="btn btn-primary btn-sm rounded-pill px-4">Edit Content</a>
        </div>
    </div>
</div>
@endforeach
</div>
@endsection
