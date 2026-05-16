@extends('frontend.layouts.app')

@section('title', 'Verify Email | Neptunes Movers')

@section('content')

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-md-6 col-lg-5">

                <div class="card shadow-sm border-0">

                    <div class="card-body p-4 text-center">

                        <img src="{{ asset('images/elite-hub-bootcamp-black-logo.png') }}" height="45" class="mb-3">

                        <h4 class="fw-bold mb-3">Verify Your Email</h4>

                        <p class="text-muted small">
                            Please check your email and click the verification link.
                        </p>

                        {{-- Show Email --}}
                        <p class="small text-muted">
                            Sent to <strong>{{ $user->email }}</strong>
                        </p>

                        {{-- Success --}}
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- Actions --}}
                        <div class="mt-4">

                            {{-- Resend --}}
                            <form method="POST" action="{{ route('verification.resend') }}" class="mb-2">
                                @csrf
                                <input type="hidden" name="email" value="{{ $user->email }}">

                                <button class="btn btn-primary w-100">
                                    Resend Verification Email
                                </button>
                            </form>

                            {{-- Back --}}
                            <a href="{{ route('login') }}" class="btn btn-outline-secondary w-100">
                                Back to Login
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection