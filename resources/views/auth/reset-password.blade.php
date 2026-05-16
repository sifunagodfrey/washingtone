@extends('frontend.layouts.app')

@section('title', 'Reset Password | Neptunes Movers')

@section('content')

    <section class="py-5 bg-dark">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-md-6 col-lg-5">

                    <div class="card bg-black text-white shadow-sm">

                        <div class="card-body p-4">

                            <div class="text-center mb-4">

                                <img src="{{ asset('images/elite-hub-bootcamp-black-logo.png') }}" height="45" class="mb-3">

                                <h4 class="fw-bold text-white">Reset Password</h4>

                            </div>

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.store') }}">

                                @csrf

                                {{-- FIXED TOKEN --}}
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="mb-3">

                                    <label class="form-label text-light">Email</label>

                                    <input type="email" name="email" value="{{ old('email', $email) }}"
                                        class="form-control bg-dark text-white border-0" required>

                                </div>

                                <div class="mb-3">

                                    <label class="form-label text-light">New Password</label>

                                    <input type="password" name="password" class="form-control bg-dark text-white border-0"
                                        required>

                                </div>

                                <div class="mb-3">

                                    <label class="form-label text-light">Confirm Password</label>

                                    <input type="password" name="password_confirmation"
                                        class="form-control bg-dark text-white border-0" required>

                                </div>

                                <button class="btn btn-primary w-100 fw-semibold">
                                    Reset Password
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection