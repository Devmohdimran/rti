<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExpenseModel;

class ExpeneseDetailsController extends Controller
{

    public function ExtraExpenese()
    {
        return view('admin.expenese.Extra_Expenese');
    }
    public function storeExtraExpenese(Request $expensedata)
    {
        $data = new ExpenseModel();
        $data->expense_date = $expensedata['expense_date'];
        $data->expense_purpose = $expensedata['expense_purpose'];
        $data->expense_amount = $expensedata['expense_amount'];
        $data->expense_by = $expensedata['expense_by'];
        $data->save();
        if($data){
            return redirect('admin/Extra_Expenese')->with('status',"Insert successfully");
        }else{
            return redirect('admin/Extra_Expenese')->with('failed',"There are someting error, please try some time.");
        }
    }

    public function ExpeneseDetails()
    {
        $expenselists = ExpenseModel::all();
        return view('admin.expenese.Expenese_Details')->with('expenselists', $expenselists);
    }

    public function delExpeneseDetails(request $request){
        $data = $request->input();
        $delData = ExpenseModel::where('expense_id', $data['expenseId'])->delete();
        if($delData){
        $msg = "Successfully deleted student";
        $type = 1;
        $status = 200;
        }else{
        $msg = "There are some issue, please try some time";
        $type = 0;
        $status = 400;
        }
        return response()->json(array('type'=>$type, 'msg'=>$msg));
    }
}
