<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QuoteFormController extends Controller
{
    public function send(Request $request)
    {
        // Validate form data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Send email directly without a view
        Mail::raw(
            "Name: {$data['name']}\n".
            "Phone: {$data['phone']}\n".
            "Email: {$data['email']}\n".
            "Subject: {$data['subject']}\n".
            "Message:\n{$data['message']}",
            function ($message) use ($data) {
                $message->to('sabina20103171@gmail.com')
                        ->subject('New Quote Request: ' . $data['subject']);
            }
        );

        return back()->with('success', 'Your message has been successfully sent!');
    }
}
