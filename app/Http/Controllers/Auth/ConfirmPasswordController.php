<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// -------------------
// Confirm Password Controller
// -------------------

class ConfirmPasswordController extends Controller
{

    // -------------------
    // Show Confirm Form
    // -------------------

    public function showConfirmForm()
    {
        return view('auth.confirm-password');
    }

    // -------------------
    // Confirm Password
    // -------------------

    public function confirm(Request $request)
    {

        $request->validate([
            'password' => 'required'
        ]);

        if (!Hash::check($request->password, Auth::user()->password)) {

            return back()->withErrors([
                'password' => 'Password does not match.'
            ]);

        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended();

    }

}