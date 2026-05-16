<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Services\EmailService;

// -------------------
// Register Controller
// -------------------

class RegisterController extends Controller
{

    // -------------------
    // Show Register Form
    // -------------------

    public function showRegisterForm()
    {
        return view('auth.register');
    }


    // -------------------
    // Register User
    // -------------------

    public function register(Request $request, EmailService $emailService)
    {

        // -------------------
        // Validate Request
        // -------------------

        $data = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'nullable|string|max:100',
            'email'      => 'required|email|unique:su_users,email',
            'password'   => 'required|string|min:6',
            'why_join'   => 'required|string|min:100|max:1000',
        ]);


        // -------------------
        // Create User
        // -------------------

        $user = User::create([
            'role_id'    => 2,
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'] ?? null,
            'email'      => $data['email'],
            'why_join'   => $data['why_join'],
            'password'   => Hash::make($data['password']),
            'status'     => 'active',
        ]);


        // -------------------
        // Send Emails (Safe Execution)
        // -------------------

        try {

            $emailService->sendVerification($user);
            $emailService->sendWelcome($user);

        } catch (\Throwable $e) {

            user_log(
                'email',
                'Registration Email Error',
                $e->getMessage(),
                ['email' => $user->email],
                'failed'
            );

        }


        // -------------------
        // Log Registration
        // -------------------

        user_log(
            'registration',
            'User Registered',
            'New user account created',
            ['email' => $user->email]
        );


        // -------------------
        // Auto Login User
        // -------------------

        Auth::login($user);

        // IMPORTANT: Prevent session fixation
        $request->session()->regenerate();


        // -------------------
        // Redirect to Payment Page
        // -------------------

        return redirect()
            ->route('client.payments.index')
            ->with('success', 'Account created successfully. Please complete your subscription payment.');

    }

}