<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Models\Setting;

class ContactController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        return view('frontend.pages.contact', compact('settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:150',
            'email'   => 'required|email|max:150',
            'phone'   => 'nullable|string|max:30',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        ContactMessage::create($request->only('name', 'email', 'phone', 'subject', 'message'));

        return redirect()->back()->with('success', 'Your message has been sent. Washingtone will get back to you soon!');
    }
}
