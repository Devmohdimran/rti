<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeeReminderController extends Controller
{
    public function FeeReminder()
    {
        return view('admin.pages.Fee_Reminder');
    }

    public function branchFeeReminder()
    {
        return view('branch.fees_manage.Fee_Reminder');
    }
}
