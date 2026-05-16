<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use App\Models\User;

// -------------------
// Email Service
// Handles all outgoing emails
// -------------------

class EmailService
{

    // -------------------
    // Send Welcome Email
    // -------------------

    public function sendWelcome(User $user)
    {
        try {

            Mail::send('emails.welcome', [
                'user' => $user
            ], function ($message) use ($user) {

                $message->to($user->email)
                        ->subject('Welcome to Elite Hub Bootcamp');

            });

            user_log('email','Welcome Email Sent','Welcome email sent',['email'=>$user->email]);

        } catch (\Throwable $e) {

            user_log('email','Welcome Email Failed',$e->getMessage(),['email'=>$user->email],'failed');
        }
    }


    // -------------------
    // Send Email Verification
    // -------------------

    public function sendVerification(User $user)
    {
        try {

            $verificationUrl = URL::temporarySignedRoute(
                'verification.verify',
                now()->addMinutes(60),
                [
                    'id' => $user->id,
                    'hash' => sha1($user->email),
                ]
            );

            Mail::send('emails.verify', [
                'user' => $user,
                'url' => $verificationUrl
            ], function ($message) use ($user) {

                $message->to($user->email)
                        ->subject('Verify Your Email Address');

            });

            user_log('email','Verification Email Sent','Verification email sent',['email'=>$user->email]);

        } catch (\Throwable $e) {

            user_log('email','Verification Email Failed',$e->getMessage(),['email'=>$user->email],'failed');
        }
    }


    // -------------------
    // Send 2FA Code
    // -------------------

    public function send2FA(User $user, string $code)
    {
        try {

            Mail::send('emails.2fa', [
                'user' => $user,
                'code' => $code
            ], function ($message) use ($user) {

                $message->to($user->email)
                        ->subject('Your Login Verification Code');

            });

            user_log('email','2FA Code Sent','2FA code sent',[
                'email'=>$user->email,
                'code'=>$code
            ]);

        } catch (\Throwable $e) {

            user_log('email','2FA Email Failed',$e->getMessage(),['email'=>$user->email],'failed');
        }
    }


    // -------------------
    // Send Subscription Email
    // -------------------

    public function sendSubscription(User $user, $stream)
    {
        try {

            Mail::send('emails.subscription', [
                'user' => $user,
                'stream' => $stream
            ], function ($message) use ($user) {

                $message->to($user->email)
                        ->subject('Bootcamp Registration Confirmed');

            });

            user_log('email','Subscription Email Sent','User registered',[
                'email'=>$user->email,
                'stream_id'=>$stream->id
            ]);

        } catch (\Throwable $e) {

            user_log('email','Subscription Email Failed',$e->getMessage(),['email'=>$user->email],'failed');
        }
    }


    // -------------------
    // Send Password Reset Email (FIXED)
    // -------------------

    public function sendPasswordReset(User $user, string $token)
    {
        try {

            // -------------------
            // CORRECT URL
            // -------------------

            $resetUrl = url('/reset-password/' . $token . '?email=' . urlencode($user->email));

            Mail::send('emails.password-reset', [
                'user' => $user,
                'url' => $resetUrl
            ], function ($message) use ($user) {

                $message->to($user->email)
                        ->subject('Reset Your Password');

            });

            user_log('email','Password Reset Email Sent','Password reset sent',['email'=>$user->email]);

        } catch (\Throwable $e) {

            user_log('email','Password Reset Email Failed',$e->getMessage(),['email'=>$user->email],'failed');
        }
    }

}