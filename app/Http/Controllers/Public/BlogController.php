<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('public.blog.blog');
    }

    public function blogDetails()
    {
        return view('public.blog.blog_details');
    }
}
