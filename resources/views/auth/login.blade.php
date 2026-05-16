@extends('frontend.layouts.app')

@section('title', 'Login | Neptunes Movers')

@section('content')

    <section class="py-5 bg-dark">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-md-6 col-lg-5">

                    <div class="card bg-black text-white shadow-sm">

                        <div class="card-body p-4">

                            <div class="text-center mb-4">
                                <h4 class="fw-bold text-white">Welcome Back</h4>

                                <p class="text-light small">
                                    Login to access your dashboard and live bootcamps.
                                </p>
                            </div>

                            @if(session('status'))

                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>

                            @endif

                            <form method="POST" action="{{ route('login.attempt') }}">

                                @csrf

                                <div class="mb-3">

                                    <label class="form-label text-light">Email</label>

                                    <input type="email" name="email"
                                        class="form-control bg-dark text-white border-0 @error('email') is-invalid @enderror"
                                        required>

                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="mb-3">

                                    <label class="form-label text-light">Password</label>

                                    <input type="password" name="password"
                                        class="form-control bg-dark text-white border-0 @error('password') is-invalid @enderror"
                                        required>

                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>

                                <button class="btn btn-primary w-100">
                                    Login
                                </button>

                            </form>

                            <div class="text-center mt-3">

                                <a href="{{ route('password.request') }}" class="small text-light text-decoration-none">
                                    Forgot Password?
                                </a>

                            </div>

                            <div class="text-center mt-2">

                                <a href="{{ route('register') }}" class="small text-light text-decoration-none">
                                    Register
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection