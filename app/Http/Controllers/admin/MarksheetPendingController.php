<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarksheetPendingController extends Controller
{
    public function MarksheetPending()
    {
        return view('admin.pages.Marksheet_Pending');
    }
}
