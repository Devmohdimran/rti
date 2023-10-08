<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BranchDetailsController extends Controller
{
    public function BranchDetails()
    {
        return view('admin.pages.Branch_Details');
    }
}
