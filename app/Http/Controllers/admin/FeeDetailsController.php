<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeeDetailsController extends Controller
{
    public function FeeDetails()
    {
        return view('admin.pages.Fee_Details');
    }
}
