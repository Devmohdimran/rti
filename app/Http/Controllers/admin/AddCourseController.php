<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddCourseController extends Controller
{
    public function AddCourse()
    {
        return view('admin.pages.Add_Course');
    }
}
