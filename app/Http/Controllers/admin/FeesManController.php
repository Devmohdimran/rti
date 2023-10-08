<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentModel;
use App\Models\FeesMangModel;
use App\Models\FeesSubmissonModel;
use DB;
use Session;

class FeesManController extends Controller
{
    public function feeSubmission()
    {
        $stuDatas = StudentModel::orderBy('id', 'DESC')->get();
        return view('admin.fees_manage.fee_submission')->with('stuDatas', $stuDatas);
    }

    public function feePayment($reg_no)
    {
        $student = StudentModel::where('reg', '=', $reg_no)->get()->toArray();
        $feesStudent = FeesMangModel::with('stuFeesManage')->where('reg', '=', $reg_no)->get()->toArray();
        return view('admin.fees_manage.fees_payment')->with('student',  $student)->with('feesStudent', $feesStudent);
    }

    public function storeFeePayment(request $request)
    {
        $data = $request->input();
        try{

            $stu_fee_data = new FeesSubmissonModel();
            $stu_fee_data->reg = $data['reg_no'];
            $stu_fee_data->receive_fee = $data['receive_fee'];
            $stu_fee_data->left_due = $data['left_due'];
            $stu_fee_data->payment_mode = $data['payment_mode'];
            $stu_fee_data->updated_at = date('Y-m-d H:i:s');
            $stu_fee_data->created_at = date('Y-m-d H:i:s');
            $stu_fee_data->save();

            $stuAdSavedId = $stu_fee_data->id;
            if($stuAdSavedId){
                return redirect('admin/fee-payment-print/'.$data['reg_no'].'/'.$stuAdSavedId)->with('status',"Insert successfully");
            }else{
                return redirect('admin/fee-payment/'.$data['reg_no'])->with('failed',"There are someting error, please try some time.");
            }

        }catch(Exception $e){
            return redirect('admin/new-student')->with('failed',"operation failed");
        }
    }

    public function feePaymentPrint($reg_no, $id)
    {
        $data['student'] = StudentModel::where('reg', '=', $reg_no)->get()->toArray();
        $data['fee'] = FeesSubmissonModel::where('id', '=', $id)->get()->toArray();
        return view('admin.fees_manage.fee_payment_print')->with('data', $data);
    }


    public function FeeDetails()
    {
        $feesStudent = StudentModel::with('stuFeesManageWithStudent')->get()->toArray();
        return view('admin.fees_manage.Fee_Details')->with('stuDatas', $feesStudent);
    }

    public function viewPayment($reg_no)
    {
        $data['student'] = StudentModel::where('reg', '=', $reg_no)->get()->toArray();
        $data['fee_total'] = FeesMangModel::where('reg', '=', $reg_no)->get()->toArray();
        $data['fee'] = FeesSubmissonModel::where('reg', '=', $reg_no)->get()->toArray();

        return view('admin.fees_manage.fee_payment_view')->with('data', $data);
    }

    public function todayFeeCollection()
    {
        $feesStudent = StudentModel::with('stuFeesManageWithStudent')->get()->toArray();
        return view('admin.fees_manage.Today_Fee_Collection')->with('stuDatas', $feesStudent);
    }

    public function dueFeeReport()
    {
        $feesStudent = StudentModel::with('stuFeesManageWithStudent')->get()->toArray();
        return view('admin.fees_manage.Due_Fee_Report')->with('stuDatas', $feesStudent);
    }


    public function branchfeeSubmission()
    { 
        if(Session::get('type') == 'branch'){
            $loggedinId = Session::get('branchId');
        }

        $stuDatas = StudentModel::where('branch_id', $loggedinId)->orderBy('id', 'DESC')->get();
        return view('branch.fees_manage.fee_submission')->with('stuDatas', $stuDatas);
    }
    
    public function branchfeePayment($reg_no)
    {
        $student = StudentModel::where('reg', '=', $reg_no)->get()->toArray();
        $feesStudent = FeesMangModel::with('stuFeesManage')->where('reg', '=', $reg_no)->get()->toArray();
        return view('branch.fees_manage.fees_payment')->with('student', $student)->with('feesStudent', $feesStudent);
    }

    public function branchFeeDetails()
    {
        if(Session::get('type') == 'branch'){
            $loggedinId = Session::get('branchId');
        }

        $feesStudent = StudentModel::with('stuFeesManageWithStudent')->where('branch_id', $loggedinId)->get()->toArray();
        return view('branch.fees_manage.Fee_Details')->with('stuDatas', $feesStudent);
    }

    public function branchviewPayment($reg_no)
    {
        $data['student'] = StudentModel::where('reg', '=', $reg_no)->get()->toArray();
        $data['fee_total'] = FeesMangModel::where('reg', '=', $reg_no)->get()->toArray();
        $data['fee'] = FeesSubmissonModel::where('reg', '=', $reg_no)->get()->toArray();

        return view('branch.fees_manage.fee_payment_view')->with('data', $data);
    }

    public function branchtodayFeeCollection()
    {
        $feesStudent = StudentModel::with('stuFeesManageWithStudent')->get()->toArray();
        return view('branch.fees_manage.Today_Fee_Collection')->with('stuDatas', $feesStudent);
    }

    public function branchdueFeeReport()
    {
        $feesStudent = StudentModel::with('stuFeesManageWithStudent')->get()->toArray();
        return view('branch.fees_manage.Due_Fee_Report')->with('stuDatas', $feesStudent);
    }

    public function branchfeePaymentPrint($reg_no, $id)
    {
        $data['student'] = StudentModel::where('reg', '=', $reg_no)->get()->toArray();
        $data['fee'] = FeesSubmissonModel::where('id', '=', $id)->get()->toArray();
        return view('branch.fees_manage.fee_payment_print')->with('data', $data);
    }


}
