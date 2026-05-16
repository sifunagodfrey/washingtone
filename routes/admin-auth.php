<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;


// ----------------------------------------------------
// Admin Authentication Routes
// ----------------------------------------------------

Route::prefix(config('admin.prefix'))->group(function () {

    // ----------------------------------------------------
    // Guest (Not Authenticated)
    // ----------------------------------------------------

    Route::middleware('guest')->group(function () {

        // -------------------
        // Login
        // -------------------

        Route::get('/login', [AdminLoginController::class, 'showLoginForm'])
            ->name('admin.login');

        Route::post('/login', [AdminLoginController::class, 'login'])
            ->name('admin.login.attempt');


        // -------------------
        // 2FA Form
        // -------------------

        Route::get('/2fa', [AdminLoginController::class, 'show2FAForm'])
            ->name('admin.2fa.form');

        Route::post('/2fa', [AdminLoginController::class, 'verify2FA'])
            ->name('admin.2fa.verify');

    });


    // ----------------------------------------------------
    // Authenticated Admin
    // ----------------------------------------------------

    Route::middleware('auth')->group(function () {

        // -------------------
        // Logout
        // -------------------

        Route::post('/logout', [AdminLoginController::class, 'logout'])
            ->name('admin.logout');

    });

});