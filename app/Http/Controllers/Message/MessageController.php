<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Admin side: List all clients who have sent messages to the admin.
     */
    public function adminClients()
    {
        // Get all clients who have sent messages
        $clients = User::whereHas('messages')->get();

        return view('admin.messages.index', compact('clients'));
    }

    public function adminShowChat(User $client)
    {
        // Fetch all messages from the specific client or admin messages sent to the client
        $messages = Message::where('client_id', $client->id)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('admin.messages.chat', compact('messages', 'client'));
    }

    public function adminStoreMessage(Request $request, User $client)
    {
        // Validate the message content
        $request->validate([
            'message' => 'required|string',
        ]);

        // Create a new message from the admin to the specific client
        Message::create([
            'message' => $request->message,
            'from_role' => 'admin', // The admin is sending the message
            'client_id' => $client->id, // Associate this message with the client
        ]);

        return back()->with('success', 'Message sent successfully.');
    }


    /**
     * Client side: Show the chat between the logged-in client and the admin.
     */
    public function clientChat(User $user)
    {
        // Comment this out for testing
        // if ($user->role !== 'admin') {
        //     abort(403, 'Unauthorized action.');
        // }

        // Fetch messages between the logged-in client and the admin
        $messages = Message::where('client_id', Auth::id())
            ->orderBy('created_at', 'asc')
            ->get();

        return view('client-dash.message.chat', compact('messages', 'user'));
    }


    public function clientStoreMessage(Request $request)
    {
        // Validate the message content
        $request->validate([
            'message' => 'required|string',
        ]);

        // Get the first admin (assuming there's only one admin)
        $admin = User::where('role', 'admin')->first();

        // Create a new message from the client to the admin
        Message::create([
            'message' => $request->message,
            'from_role' => 'client', // The client is sending the message
            'client_id' => Auth::id(), // Associate this message with the client
        ]);

        return back()->with('success', 'Message sent successfully.');
    }

}
