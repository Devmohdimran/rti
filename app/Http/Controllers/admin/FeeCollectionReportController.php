<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeeCollectionReportController extends Controller
{
    public function FeeCollectionReport()
    {
        return view('admin.pages.Fee_Collection_Report');
    }
}
