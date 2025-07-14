<?php

namespace App\Http\Controllers\Report\IncomeReport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    {
        return view('report.income-report.all-income-report');
    }
}
