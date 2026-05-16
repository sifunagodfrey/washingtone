<?php

return [

    // -------------------
    // Default Guard
    // -------------------

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    // -------------------
    // Authentication Guards
    // -------------------

    'guards' => [

        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

    ],

    // -------------------
    // User Providers
    // -------------------

    'providers' => [

        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

    ],

    // -------------------
    // Password Reset
    // -------------------

    'passwords' => [

        'users' => [
            'provider' => 'users',
            'table' => 'su_password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

    ],

    // -------------------
    // Password Timeout
    // -------------------

    'password_timeout' => 10800,

];