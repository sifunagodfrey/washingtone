@extends('frontend.layouts.app')

@section('content')

    <div class="container py-5 text-center">

        <div class="card shadow-sm border-0 mx-auto" style="max-width:500px;">
            <div class="card-body p-5">

                <h3 class="fw-bold mb-3">
                    Email Verified
                </h3>

                <p class="text-muted mb-4">
                    Your account is now active. You can continue to your dashboard.
                </p>

                <a href="{{ route('client.dashboard') }}" class="btn btn-dark px-4">
                    Go to Dashboard
                </a>

            </div>
        </div>

    </div>

@endsection