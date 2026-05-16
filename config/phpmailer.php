<?php

return [

    // -------------------
    // SMTP HOST
    // -------------------
    'host' => env('MAIL_HOST', 'smtp.gmail.com'),

    // -------------------
    // SMTP PORT
    // -------------------
    'port' => env('MAIL_PORT', 587),

    // -------------------
    // SMTP USERNAME
    // -------------------
    'username' => env('MAIL_USERNAME'),

    // -------------------
    // SMTP PASSWORD
    // -------------------
    'password' => env('MAIL_PASSWORD'),

    // -------------------
    // ENCRYPTION
    // -------------------
    'encryption' => env('MAIL_ENCRYPTION', 'tls'),

    // -------------------
    // FROM ADDRESSES
    // -------------------
    'from' => [

        // -------------------
        // NO REPLY — used for automated system emails
        // e.g. quotation confirmations, receipts
        // -------------------
        'noreply' => [
            'address' => env('MAIL_NOREPLY_ADDRESS', 'no-reply@neptunesmovers.com'),
            'name'    => env('MAIL_NOREPLY_NAME', 'Neptunes Movers'),
        ],

        // -------------------
        // SUPPORT — used for customer service emails
        // e.g. complaint responses, follow-ups
        // -------------------
        'support' => [
            'address' => env('MAIL_SUPPORT_ADDRESS', 'support@neptunesmovers.com'),
            'name'    => env('MAIL_SUPPORT_NAME', 'Neptunes Movers Support'),
        ],

        // -------------------
        // INFO — used for general enquiries
        // e.g. quote requests, contact form submissions
        // -------------------
        'info' => [
            'address' => env('MAIL_INFO_ADDRESS', 'info@neptunesmovers.com'),
            'name'    => env('MAIL_INFO_NAME', 'Neptunes Movers'),
        ],

    ],

];