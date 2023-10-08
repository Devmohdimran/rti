<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Session;
use App\Models\StuEnqModel;
// use App\Models\CandidateModel;

class EnquiryController extends Controller
{
    public function addNewEnquiry()
    {
        $last_row = StuEnqModel::latest()->first();
        $enq_no = ($last_row == '')?0:$last_row->id;
        $enq_no = $enq_no+1;
        return view('admin.enquiry_zone.add_new_enquiry')->with('enq_no', $enq_no);
    }
    
    public function storeNewEnquiry(request $request)
    {
        $data = $request->input();
        try{
            $last_row = StuEnqModel::latest()->first();
            $enq_no = ($last_row == '')?0:$last_row->id;
            $enq_no = $enq_no+1;

            $stuEnqData = new StuEnqModel();
            $stuEnqData->branch_id = Session::get('adminId');
            $stuEnqData->reg    = 'ENQ_NO_'.$enq_no;
            $stuEnqData->name   = $data['enq_stu_name'];
            $stuEnqData->gender = $data['enq_gender'];
            $stuEnqData->dob    = $data['enq_dob'];
            $stuEnqData->class  = $data['enq_board'];
            $stuEnqData->fee    = $data['enq_fee'];
            $stuEnqData->gardian = $data['enq_gua_mobile_no'];
            $stuEnqData->father  = $data['enq_father_name'];
            $stuEnqData->mob     = $data['enq_mobile_no'];
            $stuEnqData->address = $data['enq_address'];
            $stuEnqData->last_school = $data['enq_school_name'];
            $stuEnqData->last_board  = $data['enq_board'];
            $stuEnqData->city = $data['enq_city'];
            $stuEnqData->date = date('Y-m-d');
            $stuEnqData->time = date('H:i:s');
            $stuEnqData->by   = $data['enq_stu_name'];
            $stuEnqData->ssn  = $data['enq_session'];
            $stuEnqData->status     = 'Pending';
            $stuEnqData->updated_at = date('Y-m-d H:i:s');
            $stuEnqData->created_at = date('Y-m-d H:i:s');
            $stuEnqData->save();

            return redirect('admin/add-new-enquiry')->with('status',"Insert successfully");

        }
        catch(Exception $e){
            return redirect('insert')->with('failed',"operation failed");
        }
    }
    
    public function listEnquiry()
    {
        $stuEnqDatas = StuEnqModel::orderBy('id', 'DESC')->get();
        return view('admin.enquiry_zone.enquriy_list')->with('stuEnqDatas', $stuEnqDatas);
    }

    public function delEnquiry(request $request)
    {
        $data = $request->input();
        $delData = StuEnqModel::where('id', $data['stuEnqId'])->delete();
        if($delData){
            $msg = "Successfully deleted enquiry";
            $type = 1;
            $status = 200;
        }else{
            $msg = "There are some issue, please try some time";
            $type = 0;
            $status = 400;
        }
        return response()->json(array('type'=>$type, 'msg'=>$msg), $status);
    }



    // For branch enquiry
    public function branchNewEnquiry()
    {
        // $enq_no = StuEnqModel::latest()->first()->id+1;
        $last_row = StuEnqModel::latest()->first();
        $enq_no = ($last_row == '')?0:$last_row->id;
        $enq_no = $enq_no+1;
        return view('branch.enquiry_zone.add_new_enquiry')->with('enq_no', $enq_no);
    }
    
    public function addbranchNewEnquiry(request $request)
    {
    $data = $request->input();
    try{
        $last_row = StuEnqModel::latest()->first();
        $enq_no = ($last_row == '')?0:$last_row->id;
        $enq_no = $enq_no+1;

        $stuEnqData = new StuEnqModel();
        $stuEnqData->branch_id = Session::get('branchId');
        $stuEnqData->reg = 'ENQ_NO_'.$enq_no;
        $stuEnqData->name = $data['enq_stu_name'];
        $stuEnqData->gender = $data['enq_gender'];
        $stuEnqData->dob = $data['enq_dob'];
        $stuEnqData->class = $data['enq_board'];
        $stuEnqData->fee = $data['enq_fee'];
        $stuEnqData->gardian = $data['enq_gua_mobile_no'];
        $stuEnqData->father = $data['enq_father_name'];
        $stuEnqData->mob = $data['enq_mobile_no'];
        $stuEnqData->address = $data['enq_address'];
        $stuEnqData->last_school = $data['enq_school_name'];
        $stuEnqData->last_board = $data['enq_board'];
        $stuEnqData->city = $data['enq_city'];
        $stuEnqData->date = date('Y-m-d');
        $stuEnqData->time = date('H:i:s');
        $stuEnqData->by = $data['enq_stu_name'];
        $stuEnqData->ssn = $data['enq_session'];
        $stuEnqData->status = 'Pending';
        $stuEnqData->updated_at = date('Y-m-d H:i:s');
        $stuEnqData->created_at = date('Y-m-d H:i:s');
        $stuEnqData->save();
        return redirect('branch/branch-new-enquiry')->with('status', "Insert successfully");
    
    }catch(Exception $e){
            return redirect('insert')->with('failed', "operation failed");
        }
    }
    
    public function branchlistEnquiry()
    {

        // if(Session::get('type') == 'admin'){
        //     $loggedinId = Session::get('adminId');
        // }

        if(Session::get('type') == 'branch'){
            $loggedinId = Session::get('branchId');
        }

        $stuEnqDatas = StuEnqModel::where('branch_id', $loggedinId)->orderBy('id', 'DESC')->get();
        return view('branch.enquiry_zone.enquriy_list')->with('stuEnqDatas', $stuEnqDatas);
    }

}
