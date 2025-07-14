<?php

namespace App\Http\Controllers\Finance\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        return view('finance.sale.all-sale'); // Adjust the view path as necessary
    }
    public function add()
    {
        return view('finance.sale.add-sale'); // Adjust the view path as necessary
    }
    public function edit()
    {
        return view('finance.sale.edit-sale'); // Adjust the view path as necessary
    }
}
