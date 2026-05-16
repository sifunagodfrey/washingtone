<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// -------------------
// 2FA (currently disabled but preserved for future use)
// -------------------
// use App\Models\AdminTwoFactor;
// use App\Services\EmailService;

// -------------------
// Admin Login Controller (2FA Enabled - Currently Disabled)
// -------------------

class AdminLoginController extends Controller
{

    // -------------------
    // Show Login Form
    // -------------------

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }


    // -------------------
    // Login Attempt (STEP 1)
    // -------------------

    public function login(Request $request /*, EmailService $emailService */)
    {

        // -------------------
        // Validate Request
        // -------------------

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        // -------------------
        // Attempt Login
        // -------------------

        if (!Auth::attempt($credentials)) {

            user_log(
                'admin_login',
                'Admin Login Failed',
                'Invalid credentials',
                ['email' => $request->email],
                'failed'
            );

            return back()->withErrors([
                'email' => 'Invalid credentials.'
            ]);
        }


        /** @var \App\Models\User $user */
        $user = Auth::user();


        // -------------------
        // Check Admin Role (NO HARDCODE)
        // -------------------

        if (!$user->role || $user->role->slug !== 'admin') {

            Auth::logout();

            user_log(
                'admin_login',
                'Unauthorized Admin Access',
                'User attempted admin login',
                ['email' => $user->email],
                'failed'
            );

            return back()->withErrors([
                'email' => 'You are not authorized to access admin.'
            ]);
        }


        /*
        // -------------------
        // Generate OTP (2FA DISABLED)
        // -------------------

        $code = rand(100000, 999999);

        AdminTwoFactor::updateOrCreate(
            ['user_id' => $user->id],
            [
                'code' => $code,
                'expires_at' => now()->addMinutes(5)
            ]
        );


        // -------------------
        // Send 2FA Email
        // -------------------

        $emailService->send2FA($user, $code);


        // -------------------
        // Store Session (TEMP)
        // -------------------

        session([
            '2fa:user:id' => $user->id
        ]);


        // -------------------
        // Logout (wait for 2FA)
        // -------------------

        Auth::logout();

        user_log(
            'admin_login',
            '2FA Code Sent',
            'Admin login requires OTP',
            ['email' => $user->email]
        );

        return redirect()->route('admin.2fa.form');
        */


        // -------------------
        // Direct Login (2FA DISABLED)
        // -------------------

        user_log(
            'admin_login',
            'Admin Login Success',
            'Admin logged in successfully',
            ['user_id' => $user->id]
        );

        return redirect('/' . config('admin.prefix'));
    }


    /*
    // -------------------
    // Show 2FA Form
    // -------------------

    public function show2FAForm()
    {
        return view('admin.auth.2fa');
    }


    // -------------------
    // Verify 2FA (STEP 2)
    // -------------------

    public function verify2FA(Request $request)
    {

        $request->validate([
            'code' => 'required'
        ]);


        $userId = session('2fa:user:id');

        if (!$userId) {
            return redirect()->route('admin.login');
        }


        $record = AdminTwoFactor::where('user_id', $userId)->first();

        if (
            !$record ||
            $record->code != $request->code ||
            now()->greaterThan($record->expires_at)
        ) {

            user_log(
                'admin_login',
                '2FA Failed',
                'Invalid or expired OTP',
                ['user_id' => $userId],
                'failed'
            );

            return back()->withErrors([
                'code' => 'Invalid or expired code.'
            ]);
        }


        // -------------------
        // Login User
        // -------------------

        Auth::loginUsingId($userId);

        session()->forget('2fa:user:id');

        // -------------------
        // Cleanup Token
        // -------------------

        $record->delete();


        user_log(
            'admin_login',
            'Admin Login Success',
            'Admin logged in with 2FA',
            ['user_id' => $userId]
        );


        return redirect('/' . config('admin.prefix'));
    }
    */


    // -------------------
    // Logout
    // -------------------

    public function logout(Request $request)
    {

        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user) {
            user_log(
                'admin_logout',
                'Admin Logged Out',
                'Admin logout',
                ['email' => $user->email]
            );
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}