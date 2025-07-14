<?php

namespace App\Http\Controllers\Report\FinanceReport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FinanceReportController extends Controller
{
    public function index()
    {
        return view('report.finance-report.all-finance-report');
    }
}
