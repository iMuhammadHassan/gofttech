<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ClientDashController extends Controller
{
    //
    public function index()
    {
        // $clientId = auth()->user()->id; // Assuming the client is logged in
        $projectCount = Project::count();

        return view('client-dash.dashboard', compact('projectCount'));
    }

}
