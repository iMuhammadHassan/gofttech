<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('public.services.services');
    }

    public function serviceDetails()
    {
        return view('public.services.service_details');
    }
}
