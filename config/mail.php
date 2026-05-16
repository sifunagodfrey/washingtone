<?php

return [

    // -------------------
    // Default Mailer
    // -------------------
    'default' => env('MAIL_MAILER', 'smtp'),

    // -------------------
    // Mailers
    // -------------------
    'mailers' => [

        'smtp' => [
            'transport' => 'smtp',

            'host' => env('MAIL_HOST', 'mail.elitehubcamp.com'),
            'port' => env('MAIL_PORT', 587),

            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),

            'encryption' => env('MAIL_ENCRYPTION', 'tls'),

            'timeout' => null,

            'local_domain' => env(
                'MAIL_EHLO_DOMAIN',
                parse_url((string) env('APP_URL', 'http://localhost'), PHP_URL_HOST)
            ),
        ],

        // -------------------
        // Fallback Logging
        // -------------------
        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        // -------------------
        // Failover (Recommended)
        // -------------------
        'failover' => [
            'transport' => 'failover',
            'mailers' => ['smtp', 'log'],
            'retry_after' => 60,
        ],
    ],

    // -------------------
    // Global From Address
    // -------------------
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'noreply@elitehubcamp.com'),
        'name' => env('MAIL_FROM_NAME', 'Elite Hub Bootcamp'),
    ],

];