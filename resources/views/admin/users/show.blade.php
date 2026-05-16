@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4" style="background:#f8f9fa; min-height:100vh;">

        {{-- -------------------
        HEADER
        ------------------- --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-primary mb-0">{{ $user->first_name }} {{ $user->last_name }}</h2>
                <small class="text-muted">User Profile</small>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">
                    Edit User
                </a>
                <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
                    Back to Users
                </a>
            </div>
        </div>

        <div class="row g-4">

            {{-- -------------------
            LEFT: PROFILE CARD
            ------------------- --}}
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center py-5">

                        {{-- -------------------
                        AVATAR
                        ------------------- --}}
                        @if($user->avatar)
                            <img src="{{ asset('uploads/' . $user->avatar) }}"
                                class="rounded-circle mb-3"
                                style="width:90px;height:90px;object-fit:cover;">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->first_name . ' ' . $user->last_name) }}&background=0d6efd&color=fff&size=90"
                                class="rounded-circle mb-3"
                                style="width:90px;height:90px;object-fit:cover;">
                        @endif

                        <h5 class="fw-bold mb-1">{{ $user->first_name }} {{ $user->last_name }}</h5>
                        <p class="text-muted small mb-2">{{ $user->email }}</p>

                        {{-- -------------------
                        ROLE BADGE
                        ------------------- --}}
                        <span class="badge bg-primary mb-2">{{ $user->role->name ?? 'No Role' }}</span>

                        {{-- -------------------
                        STATUS BADGE
                        ------------------- --}}
                        @php
                            $statusColors = [
                                'active'    => 'success',
                                'suspended' => 'danger',
                                'pending'   => 'warning',
                            ];
                            $color = $statusColors[$user->status] ?? 'secondary';
                        @endphp
                        <br>
                        <span class="badge bg-{{ $color }}">{{ ucfirst($user->status) }}</span>

                    </div>
                </div>
            </div>

            {{-- -------------------
            RIGHT: DETAILS CARD
            ------------------- --}}
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">

                        <h6 class="fw-bold text-primary mb-4">User Details</h6>

                        <div class="row g-3">

                            <div class="col-md-6">
                                <p class="text-muted small mb-1">First Name</p>
                                <p class="fw-semibold mb-0">{{ $user->first_name }}</p>
                            </div>

                            <div class="col-md-6">
                                <p class="text-muted small mb-1">Last Name</p>
                                <p class="fw-semibold mb-0">{{ $user->last_name ?? '-' }}</p>
                            </div>

                            <div class="col-md-6">
                                <p class="text-muted small mb-1">Email</p>
                                <p class="fw-semibold mb-0">{{ $user->email }}</p>
                            </div>

                            <div class="col-md-6">
                                <p class="text-muted small mb-1">Phone</p>
                                <p class="fw-semibold mb-0">{{ $user->phone ?? '-' }}</p>
                            </div>

                            <div class="col-md-6">
                                <p class="text-muted small mb-1">Role</p>
                                <p class="fw-semibold mb-0">{{ $user->role->name ?? '-' }}</p>
                            </div>

                            <div class="col-md-6">
                                <p class="text-muted small mb-1">Status</p>
                                <p class="fw-semibold mb-0">{{ ucfirst($user->status) }}</p>
                            </div>

                            <div class="col-md-6">
                                <p class="text-muted small mb-1">Email Verified</p>
                                <p class="fw-semibold mb-0">
                                    @if($user->email_verified_at)
                                        <span class="text-success">Verified</span>
                                        <small class="text-muted">— {{ \Carbon\Carbon::parse($user->email_verified_at)->format('d M Y') }}</small>
                                    @else
                                        <span class="text-danger">Not Verified</span>
                                    @endif
                                </p>
                            </div>

                            <div class="col-md-6">
                                <p class="text-muted small mb-1">Last Login</p>
                                <p class="fw-semibold mb-0">
                                    @if($user->lastLoginLog)
                                        {{ \Carbon\Carbon::parse($user->lastLoginLog->created_at)->format('d M Y, h:i A') }}
                                        <br>
                                    @else
                                        <span class="text-muted">Never logged in</span>
                                    @endif
                                </p>
                            </div>

                            <div class="col-md-6">
                                <p class="text-muted small mb-1">Joined</p>
                                <p class="fw-semibold mb-0">
                                    {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}
                                </p>
                            </div>

                            <div class="col-md-6">
                                <p class="text-muted small mb-1">Active Subscription</p>
                                <p class="fw-semibold mb-0">
                                    @if($user->has_active_subscription)
                                        <span class="text-success">Yes</span>
                                    @else
                                        <span class="text-muted">No</span>
                                    @endif
                                </p>
                            </div>

                            @if($user->why_join)
                                <div class="col-12">
                                    <p class="text-muted small mb-1">Why Join</p>
                                    <p class="fw-semibold mb-0">{{ $user->why_join }}</p>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>

        </div>

        {{-- -------------------
        DELETE SECTION
        ------------------- --}}
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fw-bold text-danger mb-1">Delete User</h6>
                    <small class="text-muted">This action is permanent and cannot be undone.</small>
                </div>
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this user?')">
                        Delete User
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection