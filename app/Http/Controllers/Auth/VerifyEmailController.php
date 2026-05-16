<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Models\User;
use App\Services\EmailService;

// -------------------
// Email Verification Controller
// -------------------

class VerifyEmailController extends Controller
{

    // -------------------
    // Verification Notice Page
    // -------------------

    public function notice()
    {
        $userId = session('verification:user:id');

        if (!$userId) {
            return redirect()->route('login');
        }

        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('login');
        }

        return view('auth.verify-email', compact('user'));
    }


    // -------------------
    // Verify Email (CLICK LINK)
    // -------------------

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        $user = $request->user();

        // -------------------
        // Log Verification
        // -------------------

        user_log(
            'verification',
            'Email Verified',
            'User verified email',
            ['email' => $user->email]
        );

        // -------------------
        // Auto Login
        // -------------------

        Auth::login($user);

        // -------------------
        // Clear Pending Session
        // -------------------

        session()->forget('verification:user:id');

        return redirect()->route('verification.success');
    }


    // -------------------
// Resend Verification Email
// -------------------

public function resend(Request $request, EmailService $emailService)
{
    // -------------------
    // Get email from request OR session
    // -------------------

    $email = $request->email ?? session('verification:user:email');

    if (!$email) {
        return back()->withErrors(['email' => 'Email not found.']);
    }

    $user = User::where('email', $email)->first();

    if (!$user) {
        return back()->withErrors(['email' => 'User not found.']);
    }

    if ($user->hasVerifiedEmail()) {
        return back()->with('success', 'Email already verified.');
    }

    // -------------------
    // Cooldown (60s)
    // -------------------

    $lastSent = session('verification_last_sent');

    if ($lastSent && now()->diffInSeconds($lastSent) < 60) {

        $seconds = 60 - now()->diffInSeconds($lastSent);

        return back()->withErrors([
            'email' => "Please wait {$seconds}s before requesting again."
        ]);
    }

    // -------------------
    // Send Email
    // -------------------

    $emailService->sendVerification($user);

    session([
        'verification_last_sent' => now()
    ]);

    user_log(
        'verification',
        'Verification Email Resent',
        'Verification email resent',
        ['email' => $user->email]
    );

    return back()->with('success', 'Verification email sent.');
}
}