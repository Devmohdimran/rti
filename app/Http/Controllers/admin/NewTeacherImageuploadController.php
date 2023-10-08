<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewTeacherImageuploadController extends Controller
{
    public function NewTeacherImageupload()
    {
        return view('admin.pages.New_Teacher_Image_upload');
    }
}
