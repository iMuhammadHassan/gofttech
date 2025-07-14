<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User; // Ensure User model is included
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Dompdf\Dompdf;

class ClientController extends Controller
{
    // Display all clients
    public function index()
    {
        $clients = Client::all();
        return view('client.all-client', compact('clients'));
    }

    public function showContact()
    {
        $clients = Client::all();
        return view('client.contact.all-contact', compact('clients'));
    }

    // Show form to add a new client
    public function add()
    {
        return view('client.add-client');
    }

    // Store a new client
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'salutation' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients,email|unique:users,email',
            'phone_no' => 'required|string|max:20',
            'password' => 'required|string|min:6',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'country' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        // Create a new Client
        $client = new Client();
        $client->salutation = $request->salutation;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone_no = $request->phone_no;
        $client->password = bcrypt($request->password); // Client password
        $client->country = $request->country;
        $client->note = $request->note;

        if ($request->hasFile('profile')) {
            $path = $request->file('profile')->store('profiles', 'public');
            $client->profile = $path;
        }

        $client->save();

        // Create a corresponding User
        $user = new User();
        $user->name = $client->name;
        $user->email = $client->email;
        $user->password = Hash::make($request->password); // Same password as client
        $user->role = 3; // Client role
        $user->save();

        return redirect()->route('client.all-client')->with('success', 'Client and User added successfully.');
    }

    // Show form to edit an existing client
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('client.edit-client', compact('client'));
    }

    // Update an existing client
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        // dd($request->all());
        $validatedData = $request->validate([
            'salutation' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'phone_no' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'profile' => 'nullable|image|max:2048',
            'note' => 'nullable|string',
        ]);

        // Update Client
        $client->salutation = $request->salutation;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone_no = $request->phone_no;
        $client->country = $request->country;
        $client->note = $request->note;

        if ($request->hasFile('profile')) {
            $filePath = $request->file('profile')->store('profiles', 'public');
            $client->profile = $filePath;
        }

        $client->save();

        // Find and update the corresponding User
        $user = User::where('email', $client->email)->first();
        if ($user) {
            $user->name = $client->name;
            $user->email = $client->email;

            // If a new password is provided, update it
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();
        }

        return redirect()->route('client.all-client')->with('success', 'Client and User updated successfully.');
    }

    // Delete an existing client
    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        // Delete the associated User account
        User::where('email', $client->email)->delete();

        // Delete the client
        $client->delete();

        return redirect()->route('client.all-client')->with('success', 'Client and User deleted successfully.');
    }

    public function exportCsv()
    {
        $clients = Client::all();
        $filename = "clients.csv";

        $handle = fopen($filename, 'w');
        fputcsv($handle, ['Salutation', 'Name', 'Email', 'Phone No', 'Country', 'Profile', 'Note']);

        foreach ($clients as $client) {
            fputcsv($handle, [
                $client->salutation,
                $client->name,
                $client->email,
                $client->phone_no,
                $client->country,
                $client->profile ? asset('storage/' . $client->profile) : 'No Profile',
                Str::limit($client->note, 50),
            ]);
        }

        fclose($handle);

        return Response::download($filename)->deleteFileAfterSend(true);
    }

    // Export clients as PDF
    public function exportPdf()
    {
        $clients = Client::all();

        // Load view for the PDF
        $html = view('client.client-pdf', compact('clients'))->render();

        // Initialize Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream('clients.pdf', ['Attachment' => true]);
    }

}
