<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

// -------------------
// Reset Password Controller
// -------------------

class ResetPasswordController extends Controller
{

    // -------------------
    // Show Reset Form
    // -------------------

    public function showResetForm(Request $request, $token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->email
        ]);
    }


    // -------------------
    // Reset Password
    // -------------------

    public function reset(Request $request)
    {

        // -------------------
        // Validate Request
        // -------------------

        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);


        // -------------------
        // Get Token Record
        // -------------------

        $record = DB::table('su_password_reset_tokens')
            ->where('email', $request->email)
            ->first();


        // -------------------
        // Validate Token + Expiry (60 mins)
        // -------------------

        if (
            !$record ||
            !Hash::check($request->token, $record->token) ||
            now()->diffInMinutes($record->created_at) > 60
        ) {

            user_log(
                'password',
                'Password Reset Failed',
                'Invalid or expired token',
                ['email' => $request->email],
                'failed'
            );

            return back()->withErrors([
                'email' => 'Invalid or expired reset link.'
            ]);
        }


        // -------------------
        // Update Password
        // -------------------

        $user = User::where('email', $request->email)->first();

        $user->update([
            'password' => Hash::make($request->password)
        ]);


        // -------------------
        // Delete Token
        // -------------------

        DB::table('su_password_reset_tokens')
            ->where('email', $request->email)
            ->delete();


        // -------------------
        // Log Success
        // -------------------

        user_log(
            'password',
            'Password Reset Successful',
            'User reset password',
            ['email' => $user->email]
        );


        return redirect()->route('login')
            ->with('success', 'Password reset successful. You can now login.');
    }
}