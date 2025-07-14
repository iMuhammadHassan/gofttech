<?php

namespace App\Http\Controllers\HR\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        return view('hr.attendance.all-attendance'); // Adjust the view path as necessary
    }
    public function add()
    {
        return view('hr.attendance.add-attendance'); // Adjust the view path as necessary
    }
    public function edit()
    {
        return view('hr.attendance.edit-attendance'); // Adjust the view path as necessary
    }
}
