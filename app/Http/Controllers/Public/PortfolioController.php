<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Response;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('public.portfolio.portfolio', compact('portfolios'));
    }

    public function portfolioDetails($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('public.portfolio.portfolio_details', compact('portfolio'));
    }

    public function showAdminAllPortfolio()
    {
        $portfolios = Portfolio::all();
        return view('public.portfolio.admin.all-portfolio', compact('portfolios'));
    }

    public function addAdminPortfolio()
    {
        return view('public.portfolio.admin.add-portfolio');
    }

    public function editAdminPortfolio($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('public.portfolio.admin.edit-portfolio', compact('portfolio'));
    }

    // Store the portfolio
    public function store(Request $request)
    {
        $request->validate([
            'project_title' => 'required|string|max:255',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'inner_image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'inner_image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'required|date',
            'domain' => 'required|string|max:255',
            'main_description' => 'nullable|string',
            'inner_description_1' => 'nullable|string',
            'inner_description_2' => 'nullable|string',
        ]);

        $portfolio = new Portfolio();
        $portfolio->project_title = $request->input('project_title');
        $portfolio->date = $request->input('date');
        $portfolio->domain = $request->input('domain');
        $portfolio->main_description = $request->input('main_description');
        $portfolio->inner_description_1 = $request->input('inner_description_1');
        $portfolio->inner_description_2 = $request->input('inner_description_2');

        // Handle file uploads
        if ($request->hasFile('main_image')) {
            $portfolio->main_image = $request->file('main_image')->store('portfolios', 'public');
        }

        if ($request->hasFile('inner_image_1')) {
            $portfolio->inner_image_1 = $request->file('inner_image_1')->store('portfolios', 'public');
        }

        if ($request->hasFile('inner_image_2')) {
            $portfolio->inner_image_2 = $request->file('inner_image_2')->store('portfolios', 'public');
        }

        $portfolio->save();

        return redirect()->route('portfolio.all-portfolio')->with('success', 'Portfolio added successfully.');
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'project_title' => 'required|string|max:255',
            'date' => 'required|date',
            'domain' => 'required|string|max:255',
            'main_description' => 'nullable|string',
            'inner_description_1' => 'nullable|string',
            'inner_description_2' => 'nullable|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'inner_image_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'inner_image_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Find the portfolio by ID
        $portfolio = Portfolio::findOrFail($id);

        // Update portfolio attributes
        $portfolio->project_title = $request->input('project_title');
        $portfolio->date = $request->input('date');
        $portfolio->domain = $request->input('domain');
        $portfolio->main_description = $request->input('main_description');
        $portfolio->inner_description_1 = $request->input('inner_description_1');
        $portfolio->inner_description_2 = $request->input('inner_description_2');

        // Handle file uploads
        if ($request->hasFile('main_image')) {
            // Delete old image if exists
            if ($portfolio->main_image) {
                Storage::delete($portfolio->main_image);
            }
            $portfolio->main_image = $request->file('main_image')->store('portfolios', 'public');
        }
        if ($request->hasFile('inner_image_1')) {
            // Delete old image if exists
            if ($portfolio->inner_image_1) {
                Storage::delete($portfolio->inner_image_1);
            }
            $portfolio->inner_image_1 = $request->file('inner_image_1')->store('portfolios', 'public');
        }
        if ($request->hasFile('inner_image_2')) {
            // Delete old image if exists
            if ($portfolio->inner_image_2) {
                Storage::delete($portfolio->inner_image_2);
            }
            $portfolio->inner_image_2 = $request->file('inner_image_2')->store('portfolios', 'public');
        }

        // Save the updated portfolio
        $portfolio->save();

        // Redirect with success message
        return redirect()->route('portfolio.all-portfolio')->with('success', 'Portfolio updated successfully');
    }

    public function destroy($id)
    {
        // Find the portfolio by ID
        $portfolio = Portfolio::findOrFail($id);

        // Delete associated images if needed
        if ($portfolio->main_image && Storage::exists($portfolio->main_image)) {
            Storage::delete($portfolio->main_image);
        }
        if ($portfolio->inner_image_1 && Storage::exists($portfolio->inner_image_1)) {
            Storage::delete($portfolio->inner_image_1);
        }
        if ($portfolio->inner_image_2 && Storage::exists($portfolio->inner_image_2)) {
            Storage::delete($portfolio->inner_image_2);
        }

        // Delete the portfolio record
        $portfolio->delete();

        // Redirect or return a response
        return redirect()->route('portfolio.all-portfolio')->with('success', 'Portfolio deleted successfully.');
    }

    public function exportPdf()
    {
        $portfolios = Portfolio::all();

        $dompdf = new Dompdf();
        $html = view('public.portfolio.admin.pdf-portfolio', compact('portfolios'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream('portfolio-report.pdf', ['Attachment' => true]);
    }

    // Export Portfolio to Excel (CSV)
    public function exportExcel()
    {
        $portfolios = Portfolio::all();
        $fileName = 'portfolio-report.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        $callback = function () use ($portfolios) {
            $file = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($file, ['Project Title', 'Date', 'Domain', 'Main Description', 'Inner Description 1', 'Inner Description 2']);

            // Add data rows
            foreach ($portfolios as $portfolio) {
                fputcsv($file, [
                    $portfolio->project_title,
                    Carbon::parse($portfolio->date)->format('d M Y'),
                    $portfolio->domain,
                    $portfolio->main_description,
                    $portfolio->inner_description_1,
                    $portfolio->inner_description_2,
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}