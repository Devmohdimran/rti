<?php

namespace App\Http\Controllers\branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Session;
use App\Models\StuEnqModel;

class BranchController extends Controller
{
    public function branchDashboard()
    {
        return view('branch.dashboard');
    }
}
