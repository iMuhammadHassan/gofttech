<?php

namespace App\Http\Controllers\Report\AttendenceReport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendenceReportController extends Controller
{
    public function index()
    {
        return view('report.attendance-report.all-attendance-report');
    }
}
