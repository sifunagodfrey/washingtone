<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class ContactMessagesController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(20);
        return view('admin.contact-messages.index', compact('messages'));
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);

        // Auto-mark as read on open
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('admin.contact-messages.show', compact('message'));
    }

    public function markRead($id)
    {
        ContactMessage::findOrFail($id)->update(['is_read' => true]);
        return redirect()->back()->with('success', 'Marked as read.');
    }

    public function destroy($id)
    {
        ContactMessage::findOrFail($id)->delete();
        return redirect()->route('admin.contact-messages.index')->with('success', 'Message deleted.');
    }
}
