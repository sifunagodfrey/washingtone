@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4" style="background:#f8f9fa; min-height:100vh;">

        {{-- -------------------
    HEADER
    ------------------- --}}
        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <h2 class="fw-bold text-dark mb-1">
                    {{ $blog->title }}
                </h2>

                <div class="text-muted small">
                    Blog Details View
                </div>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-light border">
                    Back
                </a>

                <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-warning">
                    Edit
                </a>
            </div>
        </div>

        <div class="row g-4">

            {{-- -------------------
        LEFT COLUMN (CONTENT)
        ------------------- --}}
            <div class="col-lg-8">

                <div class="card border-0 shadow-sm">
                    <div class="card-body">

                        {{-- FEATURED IMAGE --}}
                        @if ($blog->featured_image)
                            <div class="mb-4">
                                <img src="{{ url('public/uploads/blogs/' . $blog->featured_image) }}"
                                    class="img-fluid rounded" style="max-height: 420px; width: 100%; object-fit: cover;">
                            </div>
                        @endif

                        {{-- CONTENT --}}
                        <div class="blog-content" style="line-height: 1.9; font-size: 15px; color:#212529;">

                            {!! $blog->content !!}

                        </div>

                    </div>
                </div>

            </div>

            {{-- -------------------
        RIGHT COLUMN (META SIDEBAR)
        ------------------- --}}
            <div class="col-lg-4">

                {{-- META CARD --}}
                <div class="card border-0 shadow-sm mb-4 sticky-top" style="top: 20px;">
                    <div class="card-body">

                        <h6 class="fw-bold mb-3">Blog Info</h6>

                        {{-- CATEGORY --}}
                        <div class="mb-3 p-3 bg-light rounded">
                            <div class="text-muted small">Category</div>
                            <div class="fw-semibold">
                                {{ $blog->category->name ?? '-' }}
                            </div>
                        </div>

                        {{-- STATUS --}}
                        <div class="mb-3 p-3 bg-light rounded">
                            <div class="text-muted small">Status</div>
                            <span class="badge bg-{{ $blog->status === 'published' ? 'success' : 'secondary' }}">
                                {{ ucfirst($blog->status) }}
                            </span>
                        </div>

                        {{-- PUBLISHED DATE --}}
                        <div class="mb-3 p-3 bg-light rounded">
                            <div class="text-muted small">Published At</div>
                            <div class="fw-semibold">
                                {{ $blog->published_at ?? 'Not published' }}
                            </div>
                        </div>

                    </div>
                </div>

                {{-- QUICK ACTIONS --}}
                <div class="card border-0 shadow-sm">
                    <div class="card-body">

                        <h6 class="fw-bold mb-3">Actions</h6>

                        <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-warning w-100 mb-2">
                            Edit Blog
                        </a>

                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-light border w-100">
                            Back to List
                        </a>

                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
