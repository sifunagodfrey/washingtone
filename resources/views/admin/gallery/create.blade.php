@extends('admin.layouts.app')
@section('title','Upload Image | Admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-primary mb-0">Upload Gallery Image</h4>
    <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill">← Back</a>
</div>
@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
<div class="card border-0 shadow-sm"><div class="card-body p-4">
<form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">@csrf
    <div class="row g-3">
        <div class="col-12"><label class="form-label fw-semibold">Image * <small class="text-muted">(JPG, PNG, WEBP — max 4MB)</small></label>
            <input type="file" name="image" class="form-control" required accept="image/*"></div>
        <div class="col-md-6"><label class="form-label fw-semibold">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Optional title" value="{{ old('title') }}"></div>
        <div class="col-md-6"><label class="form-label fw-semibold">Category</label>
            <input type="text" name="category" class="form-control" value="{{ old('category') }}"
                list="cats" placeholder="e.g. MC & Stage, Team Building">
            <datalist id="cats">
                <option value="MC & Stage">
                <option value="Team Building">
                <option value="Talks & Conferences">
                <option value="Awards">
                <option value="Dance">
                <option value="Portrait">
            </datalist></div>
        <div class="col-md-6"><label class="form-label fw-semibold">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}"></div>
        <div class="col-md-6 d-flex align-items-end pb-1">
            <div class="form-check">
                <input type="hidden" name="status" value="0">
                <input class="form-check-input" type="checkbox" name="status" value="1" id="status" checked>
                <label class="form-check-label fw-semibold" for="status">Visible on Gallery</label>
            </div>
        </div>
        <div class="col-12 d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4 rounded-pill">Upload</button>
            <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary px-4 rounded-pill">Cancel</a>
        </div>
    </div>
</form>
</div></div>
@endsection
