<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarksheetDetailsController extends Controller
{
    public function MarksheetDetails()
    {
        return view('admin.pages.Marksheet_Details');
    }
}
