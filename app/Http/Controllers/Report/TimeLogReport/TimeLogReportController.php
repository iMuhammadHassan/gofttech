<?php

namespace App\Http\Controllers\Report\TimeLogReport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimeLogReportController extends Controller
{
    public function index()
    {
        return view('report.time-log-report.all-time-log-report');
    }
}
