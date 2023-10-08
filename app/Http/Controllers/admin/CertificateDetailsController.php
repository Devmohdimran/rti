<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentModel;
use App\Models\MarksheetModel;
use App\Models\StudentAdminCard;
use Session;

class CertificateDetailsController extends Controller
{
    public function CertificateDetails()
    {
        return view('admin.pages.Certificate_Details');
    }

    public function createMarksheet($reg)
    {
        $data['student'] = StudentModel::where('reg', '=', $reg)->get()->toArray();
        return view('admin.admit_card_result.create_marksheet')->with('data', $data);
    }

    // public function storeMarksheet(request $request)
    // {
    //     echo '<pre>';
    //     print_r($request->all());
    // }

    public function storeMarksheet(request $request)
    {
        $data = new MarksheetModel();
        $data->reg_no = $request['reg_no'];
        $data->stud_name = $request['stud_name'];
        $data->exam_name = $request['exam_name'];
        $data->theory_mark = $request['theory_mark'];
        $data->theory_obt = $request['theory_obt'];
        $data->prac_mark = $request['practical_mark'];
        $data->prac_obt = $request['practical_obt'];
        $data->viba_mark = $request['viba_mark'];
        $data->viba_obt = $request['viba_obt'];
        $data->attend_mark = $request['attnd_mark'];
        $data->attend_obt = $request['attnd_obt'];
        $data->book_mark = $request['notebook_mark'];
        $data->book_obt = $request['notebook_obt'];
        $data->pro_mark = $request['project_mark'];
        $data->pro_obt = $request['project_obt'];
        $data->total_mark = $request['total_mark'];
        $data->total_obt = $request['total_obt'];
        $data->save();

        $created_marksheet = $data->id;

        if($created_marksheet) {

            StudentAdminCard::where('stu_reg_no', $request['reg_no'])->update(['marksheet_status' => 1]);

            return redirect('admin/Result')->with('status', "Insert successfully");
        }else{
         return redirect('admin/Result')->with('failed', "There are someting error, please try some time.");
        }
    }

    public function viewMarksheet()
    {
        $marksheetDatas = MarksheetModel::all();
        return view('admin.admit_card_result.result')->with('marksheetDatas', $marksheetDatas);
    }

    public function dispStudmarksheet(request $request)
    {
        $data = $request->input();
        $checkbox_ids = $request['admit_card'];
        $students_data = MarksheetModel::whereIn('reg_no', $checkbox_ids)->get()->toArray();
        return view('admin.admit_card_result.disp_stud_marksheet')->with('students_data', $students_data);
    }

    public function singleDispStudmarksheet($reg)
    {
        $students_data = MarksheetModel::where('reg_no', $reg)->get()->toArray();
        return view('admin.admit_card_result.disp_stud_marksheet')->with('students_data', $students_data);
    }

    public function editMarksheet($regno)
    {
        $marksheet_data = MarksheetModel::where('reg_no', '=', $regno)->get()->toArray();
        return view('admin.admit_card_result.edit_marksheet')->with('marksheet_data', $marksheet_data);
    }

    public function updateMarksheet(Request $request){
        $updatebranch['reg_no'] = $request['reg_no'];
        $updatebranch['stud_name'] = $request['stud_name'];
        $updatebranch['exam_name'] = $request['exam_name'];
        $updatebranch['theory_mark'] = $request['theory_mark'];
        $updatebranch['theory_obt'] = $request['theory_obt'];
        $updatebranch['prac_mark'] = $request['practical_mark'];
        $updatebranch['prac_obt'] = $request['practical_obt'];
        $updatebranch['viba_mark'] = $request['viba_mark'];
        $updatebranch['viba_obt'] = $request['viba_obt'];
        $updatebranch['attend_mark'] = $request['attnd_mark'];
        $updatebranch['attend_obt'] = $request['attnd_obt'];
        $updatebranch['book_mark'] = $request['notebook_mark'];
        $updatebranch['book_obt'] = $request['notebook_obt'];
        $updatebranch['pro_mark'] = $request['project_mark'];
        $updatebranch['pro_obt'] = $request['project_obt'];
        $updatebranch['total_mark'] = $request['total_mark'];
        $updatebranch['total_obt'] = $request['total_obt'];
        MarksheetModel::where('reg_no', $request['reg_no'])->update($updatebranch);
        if($updatebranch) {
            return redirect('admin/edit-marksheet/'.$request['reg_no'])->with('status', "Update successfully");
        }else{
            return redirect('admin/edit-marksheet/'.$request['reg_no'])->with('failed', "There are someting error, please try some time.");
        }
    }

    public function branchcreateMarksheet($reg)
    {
        $data['student'] = StudentModel::where('reg', '=', $reg)->get()->toArray();
        return view('branch.admit_card_result.create_marksheet')->with('data', $data);
    }

    public function branchviewMarksheet()
    {
        $marksheetDatas = MarksheetModel::all();
        return view('branch.admit_card_result.result')->with('marksheetDatas', $marksheetDatas);
    }

    public function branchstoreMarksheet(request $request)
    {
        if(empty(MarksheetModel::where('reg_no', $request['reg_no'])->first())){

            $data = new MarksheetModel();
            $data->reg_no = $request['reg_no'];
            $data->branch_id = Session::get('branchId');
            $data->stud_name = $request['stud_name'];
            $data->exam_name = $request['exam_name'];
            $data->theory_mark = $request['theory_mark'];
            $data->theory_obt = $request['theory_obt'];
            $data->prac_mark = $request['practical_mark'];
            $data->prac_obt = $request['practical_obt'];
            $data->viba_mark = $request['viba_mark'];
            $data->viba_obt = $request['viba_obt'];
            $data->attend_mark = $request['attnd_mark'];
            $data->attend_obt = $request['attnd_obt'];
            $data->book_mark = $request['notebook_mark'];
            $data->book_obt = $request['notebook_obt'];
            $data->pro_mark = $request['project_mark'];
            $data->pro_obt = $request['project_obt'];
            $data->total_mark = $request['total_mark'];
            $data->total_obt = $request['total_obt'];
            $data->save();

            $created_marksheet = $data->id;

            if($created_marksheet) {

                StudentAdminCard::where('stu_reg_no', $request['reg_no'])->update(['marksheet_status' => 1]);

                $students_data = MarksheetModel::where('reg_no', $request['reg_no'])->get()->toArray();
                return view('branch.admit_card_result.disp_stud_marksheet')->with('students_data', $students_data);

                // return redirect('branch/Result')->with('status', "Insert successfully");
            }else{
                return redirect('branch/Result')->with('failed', "There are someting error, please try some time.");
            }
        }

    }

    public function branchdispStudmarksheet(request $request)
    {
        $checkbox_ids = $request['admit_card'];
        $students_data = MarksheetModel::whereIn('reg_no', $checkbox_ids)->get()->toArray();
        return view('branch.admit_card_result.disp_stud_marksheet')->with('students_data', $students_data);
    }

    public function brancheditMarksheet($regno)
    {
        $marksheet_data = MarksheetModel::where('reg_no', '=', $regno)->get()->toArray();
        return view('branch.admit_card_result.edit_marksheet')->with('marksheet_data', $marksheet_data);
    }
    public function branchupdateMarksheet(Request $request){
        $updatebranch['reg_no'] = $request['reg_no'];
        $updatebranch['stud_name'] = $request['stud_name'];
        $updatebranch['exam_name'] = $request['exam_name'];
        $updatebranch['theory_mark'] = $request['theory_mark'];
        $updatebranch['theory_obt'] = $request['theory_obt'];
        $updatebranch['prac_mark'] = $request['practical_mark'];
        $updatebranch['prac_obt'] = $request['practical_obt'];
        $updatebranch['viba_mark'] = $request['viba_mark'];
        $updatebranch['viba_obt'] = $request['viba_obt'];
        $updatebranch['attend_mark'] = $request['attnd_mark'];
        $updatebranch['attend_obt'] = $request['attnd_obt'];
        $updatebranch['book_mark'] = $request['notebook_mark'];
        $updatebranch['book_obt'] = $request['notebook_obt'];
        $updatebranch['pro_mark'] = $request['project_mark'];
        $updatebranch['pro_obt'] = $request['project_obt'];
        $updatebranch['total_mark'] = $request['total_mark'];
        $updatebranch['total_obt'] = $request['total_obt'];
        MarksheetModel::where('reg_no', $request['reg_no'])->update($updatebranch);
        if($updatebranch) {
            return redirect('branch/edit-marksheet/'.$request['reg_no'])->with('status', "Update successfully");
        }else{
            return redirect('branch/edit-marksheet/'.$request['reg_no'])->with('failed', "There are someting error, please try some time.");
        }
    }

}
