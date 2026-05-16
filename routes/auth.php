<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;


// ----------------------------------------------------
// Guest Routes
// ----------------------------------------------------

Route::middleware('guest')->group(function () {

    // -------------------
    // Login
    // -------------------

    Route::controller(LoginController::class)->group(function () {

        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login')->name('login.attempt');

    });


    // -------------------
    // Register
    // -------------------

    Route::controller(RegisterController::class)->group(function () {

        Route::get('/register', 'showRegisterForm')->name('register');
        Route::post('/register', 'register')->name('register.store');

    });


    // -------------------
    // Forgot Password
    // -------------------

    Route::controller(ForgotPasswordController::class)->group(function () {

        Route::get('/forgot-password', 'showLinkRequestForm')->name('password.request');
        Route::post('/forgot-password', 'sendResetLink')->name('password.email');

    });


    // -------------------
    // Reset Password
    // -------------------

    Route::controller(ResetPasswordController::class)->group(function () {

        Route::get('/reset-password/{token}', 'showResetForm')
            ->name('password.reset');

        Route::post('/reset-password', 'reset')
            ->name('password.store');

    });


    // -------------------
    // Verification Notice (FIXED POSITION)
    // -------------------

    Route::get('/email/verify', [VerifyEmailController::class, 'notice'])
        ->name('verification.notice');


    // -------------------
    // Resend Verification
    // -------------------

    Route::post('/email/resend', [VerifyEmailController::class, 'resend'])
        ->name('verification.resend');

});


// ----------------------------------------------------
// Authenticated Routes
// ----------------------------------------------------

Route::middleware('auth')->group(function () {

    // -------------------
    // Confirm Password
    // -------------------

    Route::controller(ConfirmPasswordController::class)->group(function () {

        Route::get('/confirm-password', 'showConfirmForm')
            ->name('password.confirm');

        Route::post('/confirm-password', 'confirm');

    });


    // -------------------
    // Email Verification (SIGNED LINK)
    // -------------------

    Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'verify'])
        ->middleware(['signed'])
        ->name('verification.verify');


    // -------------------
    // Verification Success Page
    // -------------------

    Route::get('/email/verified-success', function () {
        return view('auth.verification-success');
    })->name('verification.success');


    // -------------------
    // Logout
    // -------------------

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');

});