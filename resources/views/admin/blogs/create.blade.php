@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4" style="background-color:#f8f9fa; min-height:100vh;">

        <!-- Header -->
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h2 class="fw-bold mb-0 text-dark">Create Blog</h2>
                <small class="text-muted">Write and publish a new article</small>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data" id="blogForm">
            @csrf

            <div class="row g-4">

                <!-- LEFT COLUMN -->
                <div class="col-lg-8">

                    <!-- Title -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <label class="form-label fw-semibold">Title</label>
                            <input type="text" name="title" class="form-control form-control-lg" required>
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <label class="form-label fw-semibold">Category</label>
                            <select name="category_id" class="form-select">
                                <option value="">Select Category</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Content (Rich Editor) -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">

                            <label class="form-label fw-semibold">Content</label>

                            <!-- Quill Editor -->
                            <div id="editor" style="height: 350px; background:#fff;"></div>

                            <!-- Hidden field sent to backend -->
                            <input type="hidden" name="content" id="content">

                        </div>
                    </div>

                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-4">

                    <!-- Image Upload (NOW TOP) -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">

                            <label class="form-label fw-semibold">Featured Image</label>

                            <input type="file" name="featured_image" class="form-control mb-3">

                            <div class="border rounded bg-light text-center p-4">
                                <small class="text-muted">Image preview area</small>
                            </div>

                        </div>
                    </div>

                    <!-- Publish Box -->
                    <div class="card border-0 shadow-sm sticky-top" style="top: 20px;">
                        <div class="card-body">

                            <h6 class="fw-bold mb-3">Publish</h6>

                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="draft">Draft</option>
                                    <option value="published">Published</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Save Blog
                            </button>

                            <div class="text-muted small mt-3">
                                You can save as draft or publish immediately.
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </form>

    </div>

    <!-- -------------------
    QUILL EDITOR CDN (FREE)
    -------------------- -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <script>
        // -------------------
        // Initialize Quill Editor
        // -------------------
        const quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Write your blog content here...',
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, 3, false]
                    }],
                    ['bold', 'italic', 'underline'],
                    [{
                        list: 'ordered'
                    }, {
                        list: 'bullet'
                    }],
                    ['link'],
                    ['clean']
                ]
            }
        });

        // -------------------
        // Submit editor content into hidden input
        // -------------------
        document.getElementById('blogForm').addEventListener('submit', function() {
            document.getElementById('content').value = quill.root.innerHTML;
        });
    </script>
@endsection
