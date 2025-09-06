<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name'    => ['required','min:3'],
            'email'   => ['required','email'],
            'message' => ['required','max:500'],
        ]);


        return back()->with('success', 'Your message has been sent successfully!');
    }
}
