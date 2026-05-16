@extends('admin.layouts.app')
@section('title', 'Edit Image | Admin')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-primary mb-0">Edit Gallery Image</h4>
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
            <div class="mb-3">
                <img src="{{ asset('uploads/gallery/' . $image->image) }}" class="img-thumbnail rounded"
                    style="max-height:200px;">
            </div>
            <form action="{{ route('admin.gallery.update', $image->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="row g-3">

                    <div class="col-12">
                        <label class="form-label fw-semibold">Replace Image <small class="text-muted">(leave blank to keep
                                current)</small></label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $image->title) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Category</label>

                        @php
                            $cats = [
                                'MC & Stage',
                                'Team Building',
                                'Talks & Conferences',
                                'Awards',
                                'Dance',
                                'Portrait',
                            ];
                            $current = old('category', $image->category ?? '');
                            $isOther = $current !== '' && !in_array($current, $cats);
                        @endphp

                        <select id="categorySelect" class="form-select mb-2">
                            <option value="" disabled {{ $current === '' ? 'selected' : '' }}>— Select a category —
                            </option>
                            @foreach ($cats as $cat)
                                <option value="{{ $cat }}" {{ $current === $cat ? 'selected' : '' }}>
                                    {{ $cat }}</option>
                            @endforeach
                            <option value="Other" {{ $isOther ? 'selected' : '' }}>Other</option>
                        </select>

                        {{-- Shown only when "Other" is selected --}}
                        <input type="text" id="customCategory" class="form-control {{ $isOther ? '' : 'd-none' }}"
                            placeholder="Type a custom category..." value="{{ $isOther ? $current : '' }}">

                        {{-- Actual submitted field --}}
                        <input type="hidden" name="category" id="categoryValue" value="{{ $current }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control"
                            value="{{ old('sort_order', $image->sort_order) }}">
                    </div>

                    <div class="col-md-6 d-flex align-items-end pb-1">
                        <div class="form-check">
                            <input type="hidden" name="status" value="0">
                            <input class="form-check-input" type="checkbox" name="status" value="1" id="status"
                                {{ old('status', $image->status) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="status">Visible on Gallery</label>
                        </div>
                    </div>

                    <div class="col-12 d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4 rounded-pill">Save Changes</button>
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
            const hidden = document.getElementById('categoryValue');

            function sync() {
                if (select.value === 'Other') {
                    customInput.classList.remove('d-none');
                    hidden.value = customInput.value.trim();
                } else {
                    customInput.classList.add('d-none');
                    hidden.value = select.value;
                }
            }

            select.addEventListener('change', function() {
                if (this.value !== 'Other') customInput.value = '';
                sync();
            });

            customInput.addEventListener('input', function() {
                hidden.value = this.value.trim();
            });

            // Run on load — handles existing value and old() after validation failure
            sync();
        })();
    </script>
@endsection
