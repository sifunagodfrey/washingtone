@extends('frontend.layouts.app')

@section('title', 'Forgot Password | Neptunes Movers')

@section('content')

    <section class="py-5 bg-dark">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-md-6 col-lg-5">

                    <div class="card bg-black text-white shadow-sm">

                        <div class="card-body p-4">

                            <div class="text-center mb-4">
                                <h4 class="fw-bold text-white">Forgot Password</h4>

                                <p class="text-light small">
                                    Enter your email to receive a reset link.
                                </p>
                            </div>

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">

                                @csrf

                                <div class="mb-3">

                                    <label class="form-label text-light">Email Address</label>

                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control bg-dark text-white border-0 @error('email') is-invalid @enderror"
                                        required>

                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>

                                <button class="btn btn-primary w-100 fw-semibold">
                                    Send Reset Link
                                </button>

                            </form>

                            <div class="text-center mt-3">

                                <a href="{{ route('login') }}" class="small text-light text-decoration-none">
                                    Back to Login
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection