@extends('admin.layouts.app')

@section('content')
    {{-- -------------------
PAGE WRAPPER
------------------- --}}
    <div class="container-fluid py-3" style="background-color: #ffffff; min-height: 100vh;">

        {{-- -------------------
    PAGE TITLE + ACTION
    ------------------- --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary mb-0">
                Services
            </h2>

            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                + Add Service
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
    SERVICES TABLE
    ------------------- --}}
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">

                <table class="table table-hover mb-0 align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Icon</th>
                            <th>Status</th>
                            <th width="180">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($services as $service)
                            <tr>

                                {{-- ID --}}
                                <td>{{ $service->id }}</td>

                                {{-- IMAGE --}}
                                <td>
                                    @if ($service->image)
                                        <img src="{{ url('public/uploads/services/' . $service->image) }}" width="60"
                                            height="40" style="object-fit: cover; border-radius: 5px;">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>

                                {{-- TITLE --}}
                                <td>
                                    <strong>{{ $service->title }}</strong>
                                    <div class="small text-muted">
                                        {{ \Illuminate\Support\Str::limit($service->description, 60) }}
                                    </div>
                                </td>

                                {{-- ICON --}}
                                <td>
                                    @if ($service->icon)
                                        <i class="fas {{ $service->icon }} fa-lg text-primary"></i>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>

                                {{-- STATUS --}}
                                <td>
                                    @if ($service->status)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>

                                {{-- ACTIONS --}}
                                <td class="d-flex gap-2">

                                    <a href="{{ route('admin.services.edit', $service->id) }}"
                                        class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST"
                                        onsubmit="return confirm('Delete this service?')">

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
                                <td colspan="6" class="text-center py-4 text-muted">
                                    No services found
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>
        </div>

    </div>
@endsection
