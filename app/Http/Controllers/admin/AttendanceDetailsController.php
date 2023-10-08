<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceDetailsController extends Controller
{
    public function AttendanceDetails()
    {
        return view('admin.pages.Attendance_Details');
    }
}
