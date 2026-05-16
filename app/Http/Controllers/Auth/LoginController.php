<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// -------------------
// Login Controller
// -------------------

class LoginController extends Controller
{

    // -------------------
    // Show Login Form
    // -------------------

    public function showLoginForm()
    {
        return view('auth.login');
    }

    // -------------------
    // Login Attempt
    // -------------------

    public function login(Request $request)
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

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            /** @var \App\Models\User $user */
            $user = Auth::user();


            // -------------------
            // Log Successful Login
            // -------------------

            user_log(
                'login',
                'User Logged In',
                'User logged in successfully',
                ['email' => $user->email]
            );


            // -------------------
            // Redirect
            // -------------------

            return redirect()->intended('/dashboard');
        }


        // -------------------
        // Log Failed Login
        // -------------------

        user_log(
            'login',
            'Login Failed',
            'Invalid credentials',
            ['email' => $request->email],
            'failed'
        );


        return back()->withErrors([
            'email' => 'Invalid credentials.'
        ]);
    }

    // -------------------
    // Logout
    // -------------------

    public function logout(Request $request)
    {

        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        if ($user) {
            user_log(
                'logout',
                'User Logged Out',
                'User logged out',
                ['email' => $user->email]
            );
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}