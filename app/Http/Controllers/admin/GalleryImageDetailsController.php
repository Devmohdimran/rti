<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryImageDetailsController extends Controller
{
    public function GalleryImageDetails()
    {
        return view('admin.pages.Gallery_Image_Details');
    }
}
