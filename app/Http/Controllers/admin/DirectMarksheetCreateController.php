<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DirectMarksheetCreateController extends Controller
{
    public function DirectMarksheetCreate()
    {
        return view('admin.pages.Direct_Marksheet_Create');
    }
}
