<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Services\PHPMailerService;

// -------------------
// Forgot Password Controller
// -------------------

class ForgotPasswordController extends Controller
{
    // -------------------
    // SHOW FORM
    // -------------------
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    // -------------------
    // SEND RESET LINK
    // -------------------
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:su_users,email'
        ]);

        $user = User::where('email', $request->email)->first();

        // -------------------
        // GENERATE TOKEN
        // -------------------
        $token = Str::random(64);

        // -------------------
        // STORE TOKEN
        // -------------------
        DB::table('su_password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            [
                'token'      => Hash::make($token),
                'created_at' => now(),
            ]
        );

        // -------------------
        // BUILD RESET URL
        // -------------------
        $resetUrl = url('/reset-password/' . $token . '?email=' . urlencode($user->email));

        // -------------------
        // SEND EMAIL VIA PHPMAILER
        // Sent from no-reply since it's automated
        // Reply-to is support in case client responds
        // -------------------
        $mailer = new PHPMailerService();

        $mailer->from('noreply')
            ->to($user->email, $user->first_name)
            ->replyTo(
                config('phpmailer.from.support.address'),
                config('phpmailer.from.support.name')
            )
            ->subject('Reset Your Password — Neptunes Movers')
            ->body("
                <div style='font-family: Arial, sans-serif; max-width: 600px; margin: auto;'>

                    <h2 style='color: #0d6efd;'>Neptunes Movers & Relocators</h2>

                    <p>Hi {$user->first_name},</p>

                    <p>We received a request to reset the password for your account.</p>

                    <p>Click the button below to reset your password. This link will expire in
                    <strong>60 minutes</strong>.</p>

                    <div style='text-align: center; margin: 30px 0;'>
                        <a href='{$resetUrl}'
                            style='background-color: #0d6efd; color: white; padding: 12px 30px;
                            text-decoration: none; border-radius: 6px; font-weight: bold;'>
                            Reset My Password
                        </a>
                    </div>

                    <p>If you did not request a password reset, you can safely ignore this email.
                    Your password will not be changed.</p>

                    <p>If you need further assistance, contact us at
                    <a href='mailto:support@neptunesmovers.com'>support@neptunesmovers.com</a>.</p>

                    <hr style='border: none; border-top: 1px solid #eee; margin: 30px 0;'>

                    <p style='color: #999; font-size: 12px;'>
                        This is an automated message. Please do not reply directly to this email.<br>
                        &copy; ' . date('Y') . ' Neptunes Movers & Relocators. All rights reserved.
                    </p>

                </div>
            ")
            ->send();

        // -------------------
        // LOG
        // -------------------
        user_log(
            'password',
            'Password Reset Requested',
            'Reset email sent',
            ['email' => $user->email]
        );

        return back()->with('success', 'Password reset link sent to your email.');
    }
}