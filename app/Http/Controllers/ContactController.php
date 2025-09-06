<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact.form');
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email',
            'subject'=>'required|string|max:255',
            'message'=>'required|string',
        ]);

        Mail::to(config('mail.from.address'))->send(new ContactMail($data));

        return redirect()->route('contact.form')->with('success','Your message has been sent.');
    }
}
