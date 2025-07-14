<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgetController extends Controller
{
    public function index()
    {
        return view('auth.forget'); // Adjust the view path as necessary
    }
}
