@extends('frontend.layouts.app')

@section('title', 'Register | Neptunes Movers')

@section('content')

    <section class="py-5 bg-dark">

        <div class="container">

        <div class="text-center mb-5">

            <h1 class="fw-bold display-5">

                <span class="text-white">
                    Register for the
                </span> <br>

                <span class="text-primary">
                    Neptunes Movers
                </span>

            </h1>

        </div>


            <div class="row justify-content-center">

                {{-- ========================================
                Wider Registration Form
                ======================================== --}}
                <div class="col-lg-8 col-md-10">

                    <div class="card bg-black text-white shadow-sm">

                        <div class="card-body p-4 p-lg-5">

                            <form method="POST" action="{{ route('register.store') }}">

                                @csrf

                                <div class="row g-3">

                                    {{-- First Name --}}
                                    <div class="col-md-6">

                                        <label class="form-label text-light">
                                            First Name
                                        </label>

                                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                                            class="form-control bg-dark text-white border-0 @error('first_name') is-invalid @enderror"
                                            required>

                                        @error('first_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>


                                    {{-- Last Name --}}
                                    <div class="col-md-6">

                                        <label class="form-label text-light">
                                            Last Name
                                        </label>

                                        <input type="text" name="last_name" value="{{ old('last_name') }}"
                                            class="form-control bg-dark text-white border-0">

                                    </div>


                                    {{-- Email --}}
                                    <div class="col-12">

                                        <label class="form-label text-light">
                                            Email Address
                                        </label>

                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control bg-dark text-white border-0 @error('email') is-invalid @enderror"
                                            required>

                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>


                                    {{-- Password --}}
                                    <div class="col-12">

                                        <label class="form-label text-light">
                                            Password
                                        </label>

                                        <div class="input-group">

                                            <input type="password" id="password" name="password"
                                                class="form-control bg-dark text-white border-0 @error('password') is-invalid @enderror"
                                                required>

                                            <button type="button" class="input-group-text bg-dark text-white border-0"
                                                id="togglePassword">
                                                <i class="fa fa-eye"></i>
                                            </button>

                                        </div>

                                        @error('password')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror

                                    </div>


                                    {{-- Why Join --}}
                                    <div class="col-12">

                                        <label class="form-label text-light">
                                            Why do you want to join the bootcamp?
                                        </label>

                                        <textarea id="why_join" name="why_join" rows="4" minlength="100" maxlength="1000"
                                            class="form-control bg-dark text-white border-0 @error('why_join') is-invalid @enderror"
                                            placeholder="Explain why you want to join the Neptunes Movers..."
                                            required>{{ old('why_join') }}</textarea>

                                        <div class="small text-light mt-1">

                                            Minimum 100 characters • Remaining:
                                            <span id="charCount">1000</span>

                                        </div>

                                        @error('why_join')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>


                                    {{-- Submit --}}
                                    <div class="col-12 mt-3">

                                        <button class="btn btn-primary w-100 py-2">
                                            Create Account
                                        </button>

                                    </div>

                                </div>

                            </form>

                            <div class="text-center mt-4">

                                <a href="{{ route('login') }}" class="text-light text-decoration-none small">
                                    Already have an account? Login
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- ========================================
    Scripts
    ======================================== --}}
    <script>

        document.addEventListener('DOMContentLoaded', function () {

            // -------------------
            // Password Toggle
            // -------------------

            const passwordInput = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');

            togglePassword.addEventListener('click', function () {

                const type = passwordInput.getAttribute('type') === 'password'
                    ? 'text'
                    : 'password';

                passwordInput.setAttribute('type', type);

                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');

            });


            // -------------------
            // Character Counter
            // -------------------

            const textarea = document.getElementById('why_join');
            const charCount = document.getElementById('charCount');

            textarea.addEventListener('input', function () {

                const min = 100;
                const length = this.value.length;
                const remaining = min - length;

                if (remaining > 0) {

                    charCount.classList.remove('text-success');
                    charCount.classList.add('text-light');

                    charCount.textContent = remaining + " more characters needed";

                } else {

                    charCount.classList.remove('text-light');
                    charCount.classList.add('text-success');

                    charCount.textContent = "Done ✓";

                }

            });

        });

    </script>

@endsection