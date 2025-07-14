<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Package;
use App\Models\Client;
use Dompdf\Dompdf;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Response;

class OrderController extends Controller
{
    // Show all orders
    public function index()
    {
        $orders = Order::with('package')->get(); // Ensure package relation is loaded
        return view('order.all-order', compact('orders'));
    }

    // Show the form for adding an order
    public function add()
    {
        return view('order.add-order'); // Adjust the view path as necessary
    }

    // Show the form for editing an order
    public function edit()
    {
        return view('order.edit-order'); // Adjust the view path as necessary
    }

    public function store(Request $request)
    {
        // Validate the request data

        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|string|max:20',
            'message' => 'required|string',
            'package_id' => 'required|exists:packages,id', // Ensure package exists
        ]);

        // Fetch the package
        $package = Package::findOrFail($validatedData['package_id']);

        // Create a new client
        $client = Client::create([
            'salutation' => '',
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone_no' => $validatedData['phone_number'],
            'password' => bcrypt('12345678'),
            'profile' => null,
            'country' => 'Unknown',
            'note' => 'Purchased package: ' . $package->name,
        ]);

        // Create a new order and link it to the package
        Order::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
            'message' => $validatedData['message'],
            'package_id' => $validatedData['package_id'],
        ]);

        // Redirect with success message
        return redirect()->route('packages')->with('success', 'Order placed and client created successfully!');
    }

    public function exportCsv()
    {
        $orders = Order::with('package')->get();
        $filename = "orders.csv";

        $handle = fopen($filename, 'w');
        fputcsv($handle, ['Customer Name', 'Email', 'Phone Number', 'Package Name', 'Message', 'Date']);

        foreach ($orders as $order) {
            fputcsv($handle, [
                $order->name,
                $order->email,
                $order->phone_number,
                $order->package->name,
                Str::limit($order->message, 50),
                $order->created_at->format('d M Y')
            ]);
        }

        fclose($handle);

        return Response::download($filename)->deleteFileAfterSend(true);
    }

    // Export orders as PDF
    public function exportPdf()
    {
        $orders = Order::with('package')->get();

        // Load view for the PDF
        $html = view('order.order-pdf', compact('orders'))->render();

        // Initialize Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream('orders.pdf', ['Attachment' => true]);
    }
    public function apiStore(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|string|max:20',
            'message' => 'required|string',
            'package_id' => 'required|exists:packages,id', // Ensure package exists
        ]);

        // Fetch the package
        $package = Package::findOrFail($validatedData['package_id']);

        // Create a new client (Optional: Only if client creation is required in API as well)
        $client = Client::create([
            'salutation' => '',
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone_no' => $validatedData['phone_number'],
            'password' => bcrypt('12345678'), // Default password, you can improve this
            'profile' => null,
            'country' => 'Unknown',
            'note' => 'Purchased package: ' . $package->name,
        ]);

        // Create a new order and link it to the package
        $order = Order::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
            'message' => $validatedData['message'],
            'package_id' => $validatedData['package_id'],
        ]);

        // Return the created order in the response
        return response()->json([
            'message' => 'Order placed successfully!',
            'order' => $order,
        ], 201);
    }



}
