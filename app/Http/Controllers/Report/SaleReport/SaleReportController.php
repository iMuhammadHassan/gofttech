<?php

namespace App\Http\Controllers\Report\SaleReport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleReportController extends Controller
{
    public function index()
    {
        return view('report.sale-report.all-sale-report');
    }
}
