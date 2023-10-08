<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountBalanceController extends Controller
{
    public function AccountBalance()
    {
        return view('admin.pages.Account_Balance');
    }
}
