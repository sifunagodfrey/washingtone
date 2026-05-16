@extends('admin.layouts.app')
@section('title', 'Upload Image | Admin')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-primary mb-0">Upload Gallery Image</h4>
        <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill">← Back</a>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">@csrf
                <div class="row g-3">

                    <div class="col-12">
                        <label class="form-label fw-semibold">Image * <small class="text-muted">(JPG, PNG, WEBP — max
                                4MB)</small></label>
                        <input type="file" name="image" class="form-control" required accept="image/*">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Optional title"
                            value="{{ old('title') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Category</label>

                        {{-- Dropdown — submits into a hidden input so "Other" can be overridden --}}
                        <select id="categorySelect" class="form-select mb-2">
                            @php
                                $cats = [
                                    'MC & Stage',
                                    'Team Building',
                                    'Talks & Conferences',
                                    'Awards',
                                    'Dance',
                                    'Portrait',
                                ];
                                $oldCat = old('category', '');
                                $isOther = $oldCat !== '' && !in_array($oldCat, $cats);
                            @endphp
                            <option value="" disabled {{ $oldCat === '' ? 'selected' : '' }}>— Select a category —
                            </option>
                            @foreach ($cats as $cat)
                                <option value="{{ $cat }}" {{ $oldCat === $cat ? 'selected' : '' }}>
                                    {{ $cat }}</option>
                            @endforeach
                            <option value="Other" {{ $isOther ? 'selected' : '' }}>Other</option>
                        </select>

                        {{-- Shown only when "Other" is selected --}}
                        <input type="text" id="customCategory" class="form-control {{ $isOther ? '' : 'd-none' }}"
                            placeholder="Type a custom category..." value="{{ $isOther ? $oldCat : '' }}">

                        {{-- This is what actually gets submitted --}}
                        <input type="hidden" name="category" id="categoryValue" value="{{ $oldCat }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
                    </div>

                    <div class="col-md-6 d-flex align-items-end pb-1">
                        <div class="form-check">
                            <input type="hidden" name="status" value="0">
                            <input class="form-check-input" type="checkbox" name="status" value="1" id="status"
                                checked>
                            <label class="form-check-label fw-semibold" for="status">Visible on Gallery</label>
                        </div>
                    </div>

                    <div class="col-12 d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4 rounded-pill">Upload</button>
                        <a href="{{ route('admin.gallery.index') }}"
                            class="btn btn-outline-secondary px-4 rounded-pill">Cancel</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        (function() {
            const select = document.getElementById('categorySelect');
            const customInput = document.getElementById('customCategory');
            const hiddenValue = document.getElementById('categoryValue');

            function sync() {
                if (select.value === 'Other') {
                    customInput.classList.remove('d-none');
                    hiddenValue.value = customInput.value.trim();
                } else {
                    customInput.classList.add('d-none');
                    hiddenValue.value = select.value;
                }
            }

            // When the dropdown changes
            select.addEventListener('change', function() {
                if (this.value !== 'Other') {
                    customInput.value = ''; // clear old custom text
                }
                sync();
            });

            // When the custom text input changes
            customInput.addEventListener('input', function() {
                hiddenValue.value = this.value.trim();
            });

            // Run once on load to handle old() values after validation failure
            sync();
        })();
    </script>
@endsection
