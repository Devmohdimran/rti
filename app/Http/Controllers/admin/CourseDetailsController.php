<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentModel;

class CourseDetailsController extends Controller
{
    public function CourseDetails()
    {
        return view('admin.pages.Course_Details');
    }

}
