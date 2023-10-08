<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DepartmentModel;

class AddDepartmentController extends Controller
{
    public function AddDepartment()
    {
        $deptlists = DepartmentModel::all();
        return view('admin.department.Add_Department')->with('deptlists', $deptlists);;
    }

    public function storeDept( Request $deptdata )
    {
        $data = new DepartmentModel();
        $data->dept_name = $deptdata['dept_name'];
        $data->save();
        if($data){
            return redirect('admin/Add_Department')->with('status',"Insert successfully");
        }else{
            return redirect('admin/Add_Department')->with('failed',"There are someting error, please try some time.");
        }
    }

    public function delDept(request $request)
    {
        $data = $request->input();
        $delData = DepartmentModel::where('dept_id', $data['deptId'])->delete();
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
