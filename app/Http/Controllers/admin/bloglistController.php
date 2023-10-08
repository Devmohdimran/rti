<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class bloglistController extends Controller
{
    public function bloglist()
    {
        return view('admin.pages.blog_list');
    }
}
