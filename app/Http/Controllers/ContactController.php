<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('contact');
    }

    public function submitContactForm(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'cname' => 'required',
            'cemail' => 'required|email',
            'message' => 'required',
        ]);

        // Send the email
        Mail::to('toufikshima98@gmail.com')->send(new ContactFormMail($validatedData));

        // Optionally, you can flash a success message or redirect the user to a thank you page
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
