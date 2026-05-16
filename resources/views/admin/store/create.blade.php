@extends('admin.layouts.app')
@section('title','Add Product | Admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-primary mb-0">Add Store Product</h4>
    <a href="{{ route('admin.store.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill">← Back</a>
</div>
@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
<div class="card border-0 shadow-sm"><div class="card-body p-4">
<form action="{{ route('admin.store.store') }}" method="POST" enctype="multipart/form-data">@csrf
    <div class="row g-3">
        <div class="col-md-8"><label class="form-label fw-semibold">Product Title *</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required placeholder="e.g. Realign Your Compass"></div>
        <div class="col-md-4"><label class="form-label fw-semibold">Slug <small class="text-muted">(auto-generated)</small></label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="realign-your-compass"></div>
        <div class="col-md-6"><label class="form-label fw-semibold">Price (KES) *</label>
            <input type="number" name="price" class="form-control" value="{{ old('price') }}" required step="0.01" min="0"></div>
        <div class="col-md-6"><label class="form-label fw-semibold">Product Image</label>
            <input type="file" name="image" class="form-control" accept="image/*"></div>
        <div class="col-12"><label class="form-label fw-semibold">Short Description</label>
            <input type="text" name="short_description" class="form-control" value="{{ old('short_description') }}" placeholder="One-line summary of the product"></div>
        <div class="col-12"><label class="form-label fw-semibold">Full Description</label>
            <textarea name="description" class="form-control" rows="8" placeholder="Full product description (HTML allowed)">{{ old('description') }}</textarea></div>
        <div class="col-md-4"><label class="form-label fw-semibold">Stock Quantity</label>
            <input type="number" name="stock_quantity" class="form-control" value="{{ old('stock_quantity', 0) }}" min="0"></div>
        <div class="col-md-4"><label class="form-label fw-semibold">Status</label>
            <select name="status" class="form-select">
                <option value="active" selected>Active</option>
                <option value="inactive">Inactive</option>
                <option value="out_of_stock">Out of Stock</option>
            </select>
        </div>
        <div class="col-md-4 d-flex align-items-end pb-1">
            <div class="form-check">
                <input type="hidden" name="is_featured" value="0">
                <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured">
                <label class="form-check-label fw-semibold" for="is_featured">⭐ Featured Product</label>
            </div>
        </div>
        <div class="col-12 d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4 rounded-pill">Add Product</button>
            <a href="{{ route('admin.store.index') }}" class="btn btn-outline-secondary px-4 rounded-pill">Cancel</a>
        </div>
    </div>
</form>
</div></div>
@endsection
