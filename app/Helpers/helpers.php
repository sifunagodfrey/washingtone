<?php

// -------------------
// Global Helpers File
// -------------------

use App\Models\UserLog;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;


// ======================================================
// USER LOG HELPER
// ======================================================

if (!function_exists('user_log')) {

    // -------------------
    // Log User Activity
    // -------------------
    function user_log(
        string $type,
        string $title,
        ?string $message = null,
        array $meta = [],
        string $status = 'success'
    ): void {
        try {

            UserLog::create([
                'user_id'    => Auth::id(),
                'type'       => $type,
                'title'      => $title,
                'message'    => $message,
                'meta'       => $meta,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'status'     => $status,
            ]);

        } catch (\Throwable $e) {
            // Do not break application
        }
    }
}


// ======================================================
// AUTH USER HELPERS
// ======================================================

if (!function_exists('auth_user')) {

    function auth_user()
    {
        return Auth::user();
    }
}

if (!function_exists('user_id')) {

    function user_id()
    {
        return Auth::id();
    }
}


// ======================================================
// SETTINGS HELPER
// ======================================================

if (!function_exists('setting')) {

    function setting($key = null)
    {
        static $settings = null;

        if (!$settings) {
            $settings = Setting::first();
        }

        if (!$settings) {
            return null;
        }

        return $key ? ($settings->$key ?? null) : $settings;
    }
}


// ======================================================
// FORMAT HELPERS
// ======================================================

if (!function_exists('format_currency')) {

    function format_currency($amount, $currency = 'KES')
    {
        return $currency . ' ' . number_format((float)$amount, 2);
    }
}

if (!function_exists('format_date')) {

    function format_date($date, $format = 'M d, Y')
    {
        if (!$date) return null;

        return \Carbon\Carbon::parse($date)->format($format);
    }
}


// ======================================================
// USER HELPERS
// ======================================================

if (!function_exists('full_name')) {

    function full_name($user)
    {
        if (!$user) return null;

        return trim(($user->first_name ?? '') . ' ' . ($user->last_name ?? ''));
    }
}


// ======================================================
// ROLE HELPERS (NO HARD-CODED IDs)
// ======================================================

if (!function_exists('is_admin')) {

    function is_admin()
    {
        $user = Auth::user();

        return $user && $user->role && $user->role->slug === 'admin';
    }
}

if (!function_exists('is_user')) {

    function is_user()
    {
        $user = Auth::user();

        return $user && $user->role && $user->role->slug === 'user';
    }
}