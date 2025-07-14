<?php

namespace App\Http\Controllers\HR\Holiday;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function index()
    {
        return view('hr.holiday.all-holiday'); // Adjust the view path as necessary
    }
    public function add()
    {
        return view('hr.holiday.add-holiday'); // Adjust the view path as necessary
    }
    public function edit()
    {
        return view('hr.holiday.edit-holiday'); // Adjust the view path as necesholiday}
    }
}