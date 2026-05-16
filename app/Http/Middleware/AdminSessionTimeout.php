<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// -------------------
// Admin Session Timeout Middleware
// -------------------

class AdminSessionTimeout
{

    public function handle(Request $request, Closure $next)
    {

        // -------------------
        // Only check for authenticated users
        // -------------------

        if (Auth::check()) {

            /** @var \App\Models\User $user */
            $user = Auth::user();

            // -------------------
            // Only apply to admin
            // -------------------

            if ($user->role && $user->role->slug === 'admin') {

                $lastActivity = session('admin_last_activity');

                $timeout = 60 * 60 * 6; // 6 hours


                if ($lastActivity && (time() - $lastActivity > $timeout)) {

                    Auth::logout();

                    $request->session()->invalidate();
                    $request->session()->regenerateToken();

                    return redirect()
                        ->route('admin.login')
                        ->withErrors([
                            'email' => 'Session expired. Please login again.'
                        ]);
                }

                // -------------------
                // Update activity time
                // -------------------

                session(['admin_last_activity' => time()]);
            }
        }

        return $next($request);
    }
}