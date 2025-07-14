<?php

namespace App\Http\Controllers\Report\LeaveReport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeaveReportController extends Controller
{
    public function index()
    {
        return view('report.leave-report.all-leave-report');
    }
}
