<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsUpdateController extends Controller
{
    public function NewsUpdate()
    {
        return view('admin.pages.News_Update');
    }
}
