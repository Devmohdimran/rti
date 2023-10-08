<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateAdmitCardController extends Controller
{
    public function CreateAdmitCard()
    {
        return view('admin.pages.Create_Admit_Card');
    }
}
