<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentImageDetailsController extends Controller
{
    public function StudentImageDetails()
    {
        return view('admin.pages.Student_Image_Details');
    }
}
