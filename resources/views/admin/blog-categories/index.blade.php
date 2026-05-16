@extends('admin.layouts.app')

@section('content')
    {{-- -------------------
PAGE WRAPPER
------------------- --}}
    <div class="container-fluid py-3" style="background-color: #ffffff; min-height: 100vh;">

        {{-- -------------------
    HEADER
    ------------------- --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary mb-0">
                Blog Categories
            </h2>

            <a href="{{ route('admin.blog-categories.create') }}" class="btn btn-primary">
                + Add Category
            </a>
        </div>

        {{-- -------------------
    SUCCESS MESSAGE
    ------------------- --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- -------------------
    TABLE CARD
    ------------------- --}}
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">

                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th width="180">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>

                                <td>
                                    <strong>{{ $category->name }}</strong>
                                </td>

                                <td>
                                    <span class="text-muted">{{ $category->slug }}</span>
                                </td>

                                <td>
                                    {{ \Illuminate\Support\Str::limit($category->description, 60) }}
                                </td>

                                <td class="d-flex gap-2">

                                    <a href="{{ route('admin.blog-categories.edit', $category->id) }}"
                                        class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.blog-categories.destroy', $category->id) }}"
                                        method="POST" onsubmit="return confirm('Delete this category?')">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-sm btn-danger">
                                            Delete
                                        </button>

                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    No categories found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>

    </div>
@endsection
