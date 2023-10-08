<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DueFeeReportController extends Controller
{
    public function DueFeeReport()
    {
        return view('admin.pages.Due_Fee_Report');
    }
}
