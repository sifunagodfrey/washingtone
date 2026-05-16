@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-3" style="background-color: #ffffff; min-height: 100vh;">

        <div class="mb-4">
            <h2 class="fw-bold text-primary">
                Edit Blog Category
            </h2>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <form action="{{ route('admin.blog-categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ $category->description }}</textarea>
                    </div>

                    <button class="btn btn-primary">
                        Update Category
                    </button>

                </form>

            </div>
        </div>

    </div>
@endsection
