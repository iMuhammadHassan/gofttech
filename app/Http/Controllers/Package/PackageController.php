<?php
namespace App\Http\Controllers\Package;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class PackageController extends Controller
{

    public function publicIndex()
    {
        $packages = Package::all(); // Fetch all packages from the database
        return view('public.packages.packages', compact('packages'));
    }


    public function packagesDetails()
    {
        return view('public.packages.packages_details');
    }

    public function index()
    {
        $packages = Package::all();
        return view('package.all-package', compact('packages'));
    }

    public function add()
    {
        return view('package.add-package');
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('package.edit-package', compact('package'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Package::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $imagePath,
        ]);

        return redirect()->route('package.all-package')->with('success', 'Package created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $package = Package::findOrFail($id);

        $imagePath = $package->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $package->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $imagePath,
        ]);

        return redirect()->route('package.all-package')->with('success', 'Package updated successfully.');
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return redirect()->route('package.all-package')->with('success', 'Package deleted successfully.');
    }

    public function exportCsv()
    {
        $packages = Package::all();
        $filename = "packages.csv";

        $handle = fopen($filename, 'w');
        fputcsv($handle, ['Name', 'Price', 'Description', 'Image']);

        foreach ($packages as $package) {
            fputcsv($handle, [
                $package->name,
                $package->price,
                Str::limit($package->description, 50),
                $package->image ? asset('storage/' . $package->image) : 'No Image'
            ]);
        }

        fclose($handle);

        return Response::download($filename)->deleteFileAfterSend(true);
    }

    // Export packages as PDF
    public function exportPdf()
    {
        $packages = Package::all();

        // Load view for the PDF
        $html = view('package.package-pdf', compact('packages'))->render();

        // Initialize Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream('packages.pdf', ['Attachment' => true]);
    }
    public function apiIndex()
    {
        $packages = Package::all();
        return response()->json($packages);
    }

}