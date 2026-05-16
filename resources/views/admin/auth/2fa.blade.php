@extends('admin.layouts.auth')
@section('title', '2FA Verification | Admin')
@section('content')
<div class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="card border-0 shadow-lg text-center" style="width:400px; border-radius:16px;">
        <div class="card-body p-5">
            <img src="{{ asset('images/washingtone-oruko-logo.png') }}" height="50" class="mb-3" alt="Logo">
            <h5 class="fw-bold text-primary mb-1">Two-Factor Verification</h5>
            <p class="text-muted small mb-4">Enter the 6-digit code sent to your email.</p>
            @if($errors->any())
            <div class="alert alert-danger text-start small"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
            @endif
            @if(session('success'))<div class="alert alert-success small">{{ session('success') }}</div>@endif
            <form method="POST" action="{{ route('admin.auth.2fa.verify') }}">
                @csrf
                <div class="mb-4">
                    <label class="form-label fw-semibold">Verification Code</label>
                    <input type="text" name="code" class="form-control form-control-lg text-center fw-bold" maxlength="6" required autofocus placeholder="000000">
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold rounded-pill">
                    <i class="fas fa-shield-alt me-2"></i>Verify & Login
                </button>
            </form>
            <form method="POST" action="{{ route('admin.auth.2fa.resend') }}" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-link text-muted small">Resend Code</button>
            </form>
        </div>
    </div>
</div>
@endsection
