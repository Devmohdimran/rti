<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnquiryDetailsController extends Controller
{
    public function EnquiryDetails()
    {
        return view('admin.pages.Enquiry_Details');
    }
}
