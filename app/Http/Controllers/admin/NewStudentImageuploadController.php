<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewStudentImageuploadController extends Controller
{
    public function NewStudentImageupload()
    {
        return view('admin.pages.New_Student_Image_upload');
    }
}
