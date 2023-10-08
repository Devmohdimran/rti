<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeModel;
use App\Models\DepartmentModel;

class AddEmployeeController extends Controller
{
    public function EmployeeDetails()
    {
        $employeelists = EmployeeModel::all();
        return view('admin.employee.Employee_Details')->with('employeelists', $employeelists);
    }

    public function deleteEmp(request $request)
    {
        $data = $request->input();
        $delData = EmployeeModel::where('emp_id', $data['employeeId'])->delete();
        if($delData) {
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
    
    public function AddEmployee()
    {
        $deptsdata = DepartmentModel::all();
        return view('admin.employee.Add_Employee')->with( 'deptsdata', $deptsdata);
    }

    public function storeEmployee(Request $empdata){
        $emp_photo = time() . '.' . $empdata->emp_photo->extension();
        $moveFile = $empdata->emp_photo->move(public_path('assets/images/employee'), $emp_photo);
        $emp_resume = time() . '.' . $empdata->emp_resume->extension();
        $moveFile = $empdata->emp_resume->move(public_path('assets/images/employee'), $emp_resume);
        $emp_doc = time() . '.' . $empdata->emp_doc->extension();
        $moveFile = $empdata->emp_doc->move(public_path('assets/images/employee'), $emp_doc);
        $data = new EmployeeModel();
        $data->emp_join_date = $empdata['emp_join_date'];
        $data->emp_post = $empdata['emp_post'];
        $data->emp_name = $empdata['emp_name'];
        $data->emp_gender = $empdata['emp_gender'];
        $data->emp_dob = $empdata['emp_dob'];
        $data->emp_qualification = $empdata['emp_qualification'];
        $data->emp_passing_year = $empdata['emp_passing_year'];
        $data->emp_experience = $empdata['emp_experience'];
        $data->emp_contact_no = $empdata['emp_contact_no'];
        $data->emp_department = $empdata['emp_department'];
        $data->emp_email = $empdata['emp_email'];
        $data->emp_address = $empdata['emp_address'];
        $data->emp_photo = $emp_photo;
        $data->emp_resume = $emp_resume;
        $data->emp_document = $emp_doc;
        $data->emp_salary = $empdata['emp_salary'];
        $data->save();
        if($data){
            return redirect('admin/Add_Employee')->with('status',"Insert successfully");
        }else{
            return redirect('admin/Add_Employee')->with('failed',"There are someting error, please try some time.");
        }
    }
}
