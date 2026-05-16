@extends('admin.layouts.auth')
@section('title', 'Admin Login | Washingtone Oruko')
@section('content')
<div class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="card border-0 shadow-lg" style="width:400px; border-radius:16px;">
        <div class="card-body p-5">
            <div class="text-center mb-4">
                <img src="{{ asset('images/washingtone-oruko-logo.png') }}" height="55" alt="Washingtone Oruko" class="mb-3">
                <h5 class="fw-bold text-primary mb-1">Admin Panel</h5>
                <p class="text-muted small">Sign in to manage your portfolio</p>
            </div>
            @if($errors->any())
            <div class="alert alert-danger py-2 small">
                <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
            @endif
            <form method="POST" action="{{ route('admin.auth.login') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email Address</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label small" for="remember">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold rounded-pill">
                    <i class="fas fa-sign-in-alt me-2"></i>Sign In
                </button>
            </form>
            <div class="text-center mt-4">
                <a href="{{ route('home') }}" class="text-muted small" target="_blank">
                    <i class="fas fa-external-link-alt me-1"></i>View Website
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
