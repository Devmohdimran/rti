<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    public function LeaveType()
    {
        return view('admin.pages.LeaveType');
    }
}
