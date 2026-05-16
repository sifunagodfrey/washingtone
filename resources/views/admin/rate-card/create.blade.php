@extends('admin.layouts.app')
@section('title','Add Package | Admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-primary mb-0">Add Rate Card Package</h4>
    <a href="{{ route('admin.rate-card.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill">← Back</a>
</div>
@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
<div class="card border-0 shadow-sm"><div class="card-body p-4">
<form action="{{ route('admin.rate-card.store') }}" method="POST">@csrf
    <div class="row g-3">
        <div class="col-md-6"><label class="form-label fw-semibold">Category *</label>
            <input type="text" name="category" class="form-control" value="{{ old('category', 'MC Services') }}" list="cats" required>
            <datalist id="cats">
                <option value="MC Services">
                <option value="Team Building">
                <option value="Dance Classes">
                <option value="Coaching & Wellness">
                <option value="School & Youth Events">
            </datalist></div>
        <div class="col-md-6"><label class="form-label fw-semibold">Title *</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required placeholder="Package name"></div>
        <div class="col-md-5"><label class="form-label fw-semibold">Price (KES) *</label>
            <input type="number" name="price" class="form-control" value="{{ old('price') }}" required step="0.01" min="0"></div>
        <div class="col-md-4"><label class="form-label fw-semibold">Price Suffix</label>
            <input type="text" name="price_suffix" class="form-control" value="{{ old('price_suffix') }}" placeholder="e.g. per person"></div>
        <div class="col-md-3"><label class="form-label fw-semibold">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}"></div>
        <div class="col-12"><label class="form-label fw-semibold">Description</label>
            <textarea name="description" class="form-control" rows="2" placeholder="Short package description">{{ old('description') }}</textarea></div>
        <div class="col-12">
            <label class="form-label fw-semibold">Package Features <small class="text-muted">(one per line)</small></label>
            <div id="featuresContainer">
                <div class="input-group mb-2 feature-row">
                    <input type="text" name="features[]" class="form-control" placeholder="e.g. Full event coordination">
                    <button type="button" class="btn btn-outline-danger" onclick="this.closest('.feature-row').remove()"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <button type="button" class="btn btn-outline-primary btn-sm rounded-pill mt-1" onclick="addFeature()">
                <i class="fas fa-plus me-1"></i>Add Feature
            </button>
        </div>
        <div class="col-md-6">
            <div class="form-check">
                <input type="hidden" name="is_featured" value="0">
                <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured">
                <label class="form-check-label fw-semibold" for="is_featured">⭐ Featured Package</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-check">
                <input type="hidden" name="status" value="0">
                <input class="form-check-input" type="checkbox" name="status" value="1" id="status" checked>
                <label class="form-check-label fw-semibold" for="status">Active (visible)</label>
            </div>
        </div>
        <div class="col-12 d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4 rounded-pill">Add Package</button>
            <a href="{{ route('admin.rate-card.index') }}" class="btn btn-outline-secondary px-4 rounded-pill">Cancel</a>
        </div>
    </div>
</form>
</div></div>
@endsection
@section('scripts')
<script>
function addFeature() {
    document.getElementById('featuresContainer').insertAdjacentHTML('beforeend',
        `<div class="input-group mb-2 feature-row"><input type="text" name="features[]" class="form-control" placeholder="Feature..."><button type="button" class="btn btn-outline-danger" onclick="this.closest('.feature-row').remove()"><i class="fas fa-times"></i></button></div>`
    );
}
</script>
@endsection
