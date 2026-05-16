@extends('frontend.layouts.app')

@section('title', 'Confirm Password | Neptunes Movers')

@section('content')

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-md-6 col-lg-5">

                <div class="card shadow-sm border-0">

                    <div class="card-body p-4">

                        <div class="text-center mb-4">

                            <img src="{{ asset('images/elite-hub-bootcamp-black-logo.png') }}" height="45" class="mb-3">

                            <h4 class="fw-bold">Confirm Password</h4>

                            <p class="text-muted small">
                                Please confirm your password before continuing.
                            </p>

                        </div>

                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Password</label>

                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" required>

                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>

                            <button class="btn btn-primary w-100">
                                Confirm Password
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection