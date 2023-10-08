<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BranchAdmitCardController extends Controller
{
    public function BranchAdmitCard()
    {
        return view('admin.pages.Branch_Admit_Card');
    }

    public function branchhAdmitCard()
    {
      return view('branch.pages.Branch_Admit_Card');
    }
}
