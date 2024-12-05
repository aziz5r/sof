<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
   
    public function showForm()
    {
        return view('contact');
    }

 
    public function submitForm(Request $request)
    {
       
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

     
        return redirect()->route('contact.form')->with('success', 'Your message has been sent successfully!');
    }
}
