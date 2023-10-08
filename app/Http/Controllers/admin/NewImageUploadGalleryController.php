<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewImageUploadGalleryController extends Controller
{
    public function NewImageUploadGallery()
    {
        return view('admin.pages.New_Image_Upload_Gallery');
    }
}
