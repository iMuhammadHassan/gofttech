<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead; // Import the Lead model

class ContactController extends Controller
{
    public function index()
    {
        return view('public.contact');
    }

    public function showContact()
    {
        
        return view('public.contact');
    }

    // Store the contact form data into leads table
    public function store(Request $request)
    {
        // Validate the contact form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        // Store the data in the leads table
        Lead::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'lead_source' => 'website',  // Fixed value "website"
            'status' => 'new',           // Fixed value "new"
            'lead_note' => $request->input('message'),  // Message goes to lead_note
        ]);

        // Redirect with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }





}
