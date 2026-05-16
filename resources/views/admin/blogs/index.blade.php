@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4" style="background-color:#f8f9fa; min-height:100vh;">

        {{-- -------------------
    HEADER
    ------------------- --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark mb-0">Blogs</h2>
                <small class="text-muted">Manage all published and draft articles</small>
            </div>

            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
                + Add Blog
            </a>
        </div>

        {{-- -------------------
    SUCCESS ALERT
    ------------------- --}}
        @if (session('success'))
            <div class="alert alert-success shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- -------------------
    TABLE CARD
    ------------------- --}}
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th class="text-end" style="width: 220px;">Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($blogs as $blog)
                                <tr>

                                    {{-- ID --}}
                                    <td class="text-muted">
                                        {{ $blog->id }}
                                    </td>

                                    {{-- IMAGE --}}
                                    <td>
                                        @if ($blog->featured_image)
                                            <img src="{{ url('public/uploads/blogs/' . $blog->featured_image) }}"
                                                width="70" height="45" class="rounded" style="object-fit:cover;">
                                        @else
                                            <span class="text-muted small">No Image</span>
                                        @endif
                                    </td>

                                    {{-- TITLE + EXCERPT --}}
                                    <td>
                                        <div class="fw-semibold">
                                            {{ $blog->title }}
                                        </div>

                                        <div class="text-muted small">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 70) }}
                                        </div>
                                    </td>

                                    {{-- CATEGORY --}}
                                    <td>
                                        <span class="text-dark">
                                            {{ $blog->category->name ?? '-' }}
                                        </span>
                                    </td>

                                    {{-- STATUS --}}
                                    <td>
                                        <span
                                            class="badge bg-{{ $blog->status === 'published' ? 'success' : 'secondary' }}">
                                            {{ ucfirst($blog->status) }}
                                        </span>
                                    </td>

                                    {{-- ACTIONS --}}
                                    <td class="text-end">

                                        <div class="btn-group" role="group">

                                            <a href="{{ route('admin.blogs.show', $blog->id) }}"
                                                class="btn btn-sm btn-outline-info">
                                                View
                                            </a>

                                            <a href="{{ route('admin.blogs.edit', $blog->id) }}"
                                                class="btn btn-sm btn-outline-warning">
                                                Edit
                                            </a>

                                            <form method="POST" action="{{ route('admin.blogs.destroy', $blog->id) }}"
                                                onsubmit="return confirm('Delete this blog?')">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-sm btn-outline-danger">
                                                    Delete
                                                </button>
                                            </form>

                                        </div>

                                    </td>

                                </tr>
                            @empty

                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        No blogs found
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>
        </div>

    </div>
@endsection
