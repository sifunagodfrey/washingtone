@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4" style="background:#f8f9fa; min-height:100vh;">

        {{-- -------------------
        HEADER
        ------------------- --}}
        <div class="mb-4">
            <h2 class="fw-bold text-primary">Add User</h2>
            <small class="text-muted">Create a new system user</small>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control"
                                value="{{ old('first_name') }}" placeholder="First name">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control"
                                value="{{ old('last_name') }}" placeholder="Last name">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email') }}" placeholder="email@example.com">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control"
                                value="{{ old('phone') }}" placeholder="e.g. 0712 345 678">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Role</label>
                            <select name="role_id" class="form-select">
                                <option value="">Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="suspended" {{ old('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Why Join</label>
                            <textarea name="why_join" class="form-control" rows="3"
                                placeholder="Reason for joining">{{ old('why_join') }}</textarea>
                        </div>

                    </div>

                    <div class="mt-4 d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button class="btn btn-primary">Save User</button>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection