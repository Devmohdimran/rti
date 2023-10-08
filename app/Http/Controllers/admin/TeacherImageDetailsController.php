<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherImageDetailsController extends Controller
{
    public function TeacherImageDetails()
    {
        return view('admin.pages.Teacher_Image_Details');
    }
}
