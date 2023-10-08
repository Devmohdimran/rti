<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentModel;
use App\Models\StuEnqModel;
use App\Models\FeesMangModel;
use App\Models\StudentIcard;
use Session;

class StudentController extends Controller
{
    public function newStudent()
    {
        if(isset($_GET['id'])){
            $students = StuEnqModel::find($_GET['id']);
        }else{
            $students = '';
        }

        $last_row = StudentModel::latest()->first();
        $reg_no = ($last_row == '')?0:$last_row->id;
        $reg_no = $reg_no+1;

        $data['students'] = $students;
        $data['reg_no'] = $reg_no;
        
        return view('admin.students.new_student')->with('data', $data);
    }

    public function storeNewStudent(request $request)
    {
        $data = $request->input();
        try{

            $last_row = StudentModel::latest()->first();
            $reg_no = ($last_row == '')?0:$last_row->id;
            $reg_no = $reg_no+1;

            $fileName = time() . '.' . $request->file->extension();
            $moveFile = $request->file->move(public_path('assets/images/studentImgs'), $fileName);

            $stuAdData = new StudentModel();
            $stuAdData->reg    = 'REG_NO_'.$reg_no;
            $stuAdData->admission_date   = $data['ad_date'];
            $stuAdData->regular = $data['ad_regular'];
            $stuAdData->branch_id = Session::get('adminId');
            $stuAdData->name  = $data['enq_stu_name'];
            $stuAdData->gender    = $data['enq_gender'];
            $stuAdData->dob = $data['enq_dob'];
            $stuAdData->class  = $data['enq_course'];
            $stuAdData->gardian     = $data['enq_gua_mobile_no'];
            $stuAdData->father = $data['enq_father_name'];
            $stuAdData->city = $data['enq_city'];
            $stuAdData->mob  = $data['enq_mobile_no'];
            $stuAdData->address = $data['enq_address'];
            $stuAdData->last_school = $data['enq_school_name'];
            $stuAdData->board = $data['enq_board'];
            $stuAdData->img = $fileName;
            $stuAdData->board = $data['enq_board'];
            $stuAdData->date = date('Y-m-d');
            $stuAdData->time = date('H:i:s');
            $stuAdData->by   = $data['enq_stu_name'];
            $stuAdData->session  = $data['ad_session'];
            $stuAdData->fee  = $data['enq_fee'];
            $stuAdData->course_id  = 10;
            $stuAdData->updated_at = date('Y-m-d H:i:s');
            $stuAdData->created_at = date('Y-m-d H:i:s');
            $stuAdData->save();

            $stuAdSavedId = $stuAdData->id;

            if(isset($_GET['id']) && $_GET['id'] != '' && $stuAdSavedId){
                $comfirm_id = $_GET['id'];
                StuEnqModel::where('id', $comfirm_id)->update(['status' => 'Confirm']);
            }

            if($stuAdSavedId){
                // fees update
                $stu_fee_data = new FeesMangModel();
                $stu_fee_data->reg = $data['ad_reg_no'];
                $stu_fee_data->fee = $data['enq_fee'];
                $stu_fee_data->updated_at = date('Y-m-d H:i:s');
                $stu_fee_data->created_at = date('Y-m-d H:i:s');
                $stu_fee_data->save();

                return redirect('admin/new-student')->with('status',"Insert successfully");
            }else{
                return redirect('admin/new-student')->with('failed',"There are someting error, please try some time.");
            }
        }catch(Exception $e){
            return redirect('admin/new-student')->with('failed',"operation failed");
        }
        
    }

    public function studentList()
    {
        $stuDatas = StudentModel::orderBy('id', 'DESC')->get();
        return view('admin.students.list_student')->with('stuDatas', $stuDatas);
    }

    public function studentEdit($userId=null)
    {
        $student = StudentModel::find($userId);
        return view('admin.students.student_edit')->with('students', $student);
    }

    public function saveStudentEdit(request $request, $userId=null)
    {
        $data = $request->input();
        try{

            if(!empty($request->file) && $request->file != ''){
                $fileName = time() . '.' . $request->file->extension();
                $moveFile = $request->file->move(public_path('assets/images/studentImgs'), $fileName);
                $_data['img']  = $fileName;
            }
            
            $_data['reg']    = $data['ad_reg_no'];
            $_data['admission_date']   = $data['ad_date'];
            $_data['regular']  = $data['ad_regular'];
            // $_data['select_branch']  = $data['ad_branch'];
            $_data['name']  = $data['enq_stu_name'];
            $_data['gender']  = $data['enq_gender'];
            $_data['dob']  = $data['enq_dob'];
            $_data['class']  = $data['enq_course'];
            $_data['gardian']  = $data['enq_gua_mobile_no'];
            $_data['father']  = $data['enq_father_name'];
            $_data['city'] = $data['enq_city'];
            $_data['mob'] = $data['enq_mobile_no'];
            $_data['address']  = $data['enq_address'];
            $_data['last_school']  = $data['enq_school_name'];
            $_data['board']  = $data['enq_board'];
            $_data['board']  = $data['enq_board'];
            $_data['date']  = date('Y-m-d');
            $_data['time']  = date('H:i:s');
            $_data['by']  = $data['enq_stu_name'];
            $_data['session']  = $data['ad_session'];
            $_data['fee']  = $data['enq_fee'];
            // 'course_id '  => 10,
            $_data['updated_at']  = date('Y-m-d H:i:s');

            StudentModel::where('id', $userId)->update($_data);

            return redirect('admin/student-edit/'.$userId)->with('status',"Update successfully");

        }catch(Exception $e){
            return redirect('insert')->with('failed',"operation failed");
        }
    }

    public function studentProfile($id)
    {
        $student = StudentModel::find($id);
        return view('admin.students.student_profile')->with('student', $student);
    }

    public function delStudent(request $request)
    {
     $data = $request->input();
        $delData = StudentModel::where('id', $data['stuId'])->delete();
        if($delData){
            $msg = "Successfully deleted student";
            $type = 1;
            $status = 200;
        }else{
            $msg = "There are some issue, please try some time";
            $type = 0;
            $status = 400;
        }
        return response()->json(array('type'=>$type, 'msg'=>$msg), $status);
    }

    public function studentDay()
    {
        $sevendaysafter = date('Y-m-d', strtotime('+7 days') );
        $sevendaysbefore = date('Y-m-d', strtotime('-7 days') );
        $stubdayDatas = StudentModel::whereBetween('dob', [$sevendaysbefore, $sevendaysafter])->get();
        return view('admin.students.student_bday')->with('stubdayDatas', $stubdayDatas);
    }

    public function studentListprint(){
        $studlists = StudentModel::all();
        return view('admin.students.student_list_print')->with('studlists', $studlists);
    }


    public function studentIdcard()
    {
        $studlists = StudentModel::all()->take(5);
        return view('admin.i_card.stud_id_card')->with('studlists', $studlists);
    }

    public function dispStudIdCard(request $request)
    {
        $data = $request->input();
        $checkbox_ids = $request['student_icard'];
        $studs_icard_regno = StudentIcard::all()->toArray();
        $stud_regno = array();

         foreach( $studs_icard_regno as $stud_icard_regno ){
            $stud_regno[] = $stud_icard_regno['stud_reg_no'];
        } 

        foreach($checkbox_ids as $checkbox_id){
            if(! in_array($checkbox_id, $stud_regno) ) {
                $icard = new StudentIcard();
                $icard->stud_reg_no = $checkbox_id;
                $icard->save();
            }
        }
        $students_data = StudentIcard::with('stuicardwithadmission')->whereIn('stud_reg_no', $checkbox_ids)->get()->toArray();
        return view('admin.i_card.disp_stud_id_card')->with('students_data', $students_data);
    }

    public function viewICard($reg)
    {
        $students_data = StudentIcard::with('stuicardwithadmission')->where('stud_reg_no', $reg)->get()->toArray();
        return view('admin.i_card.disp_stud_id_card')->with('students_data', $students_data);
    }

    public function branchnewStudent()
    {
    
        if(isset($_GET['id'])){
            $students = StuEnqModel::find($_GET['id']);
        }else{
            $students = '';
        }

        $last_row = StudentModel::latest()->first();
        $reg_no = ($last_row == '')?0:$last_row->id;
        $reg_no = $reg_no+1;

        $data['students'] = $students;
        $data['reg_no'] = $reg_no;
        return view('branch.students.new_student')->with('data', $data);
    }
    
    public function branchstoreNewStudent(request $request)
    {
    
        $data = $request->input();
        try{

            $last_row = StudentModel::latest()->first();
            $reg_no = ($last_row == '')?0:$last_row->id;
            $reg_no = $reg_no+1;

            $fileName = time() . '.' . $request->file->extension();
            $moveFile = $request->file->move(public_path('assets/images/studentImgs'), $fileName);

            $stuAdData = new StudentModel();
            $stuAdData->reg = 'REG_NO_'.$reg_no;
            $stuAdData->admission_date = $data['ad_date'];
            $stuAdData->regular = $data['ad_regular'];
            $stuAdData->branch_id = Session::get('branchId');
            $stuAdData->name = $data['enq_stu_name'];
            $stuAdData->gender = $data['enq_gender'];
            $stuAdData->dob = $data['enq_dob'];
            $stuAdData->class = $data['enq_course'];
            $stuAdData->gardian = $data['enq_gua_mobile_no'];
            $stuAdData->father = $data['enq_father_name'];
            $stuAdData->city = $data['enq_city'];
            $stuAdData->mob = $data['enq_mobile_no'];
            $stuAdData->address = $data['enq_address'];
            $stuAdData->last_school = $data['enq_school_name'];
            $stuAdData->board = $data['enq_board'];
            $stuAdData->img = $fileName;
            $stuAdData->board = $data['enq_board'];
            $stuAdData->date = date('Y-m-d');
            $stuAdData->time = date('H:i:s');
            $stuAdData->by = $data['enq_stu_name'];
            $stuAdData->session = $data['ad_session'];
            $stuAdData->fee = $data['enq_fee'];
            $stuAdData->course_id = 10;
            $stuAdData->updated_at = date('Y-m-d H:i:s');
            $stuAdData->created_at = date('Y-m-d H:i:s');
            $stuAdData->save();

            $stuAdSavedId = $stuAdData->id;

            if(isset($_GET['id']) && $_GET['id'] != '' && $stuAdSavedId){
                $comfirm_id = $_GET['id'];
                StuEnqModel::where('id', $comfirm_id)->update(['status' => 'Confirm']);
            }

            if($stuAdSavedId){

                $stu_fee_data = new FeesMangModel();
                $stu_fee_data->reg = $data['ad_reg_no'];
                $stu_fee_data->fee = $data['enq_fee'];
                $stu_fee_data->updated_at = date('Y-m-d H:i:s');
                $stu_fee_data->created_at = date('Y-m-d H:i:s');
                $stu_fee_data->save();

                return redirect('branch/branch-new-student')->with('status',"Insert successfully");
            }else{
                return redirect('branch/branch-new-student')->with('failed',"There are someting error, please try some time.");
            }
        }catch(Exception $e){
            return redirect('branch/branch-new-student')->with('failed',"operation failed");
        }
    }

    public function branchstudentList()
    {
        if(Session::get('type') == 'branch'){
            $loggedinId = Session::get('branchId');
        }

        $stuDatas = StudentModel::where('branch_id', $loggedinId)->orderBy('id', 'DESC')->get();
        return view('branch.students.list_student')->with('stuDatas', $stuDatas);
    }

    public function branchstudentDay()
    {
        $sevendaysafter = date('Y-m-d', strtotime('+7 days') );
        $sevendaysbefore = date('Y-m-d', strtotime('-7 days') );

        if(Session::get('type') == 'branch'){
            $loggedinId = Session::get('branchId');
        }

        $stubdayDatas = StudentModel::whereBetween('dob', [$sevendaysbefore, $sevendaysafter])->where('branch_id', $loggedinId)->get();
        return view('branch.students.student_bday')->with('stubdayDatas', $stubdayDatas);
    }

    public function branchstudentListprint(){

        if(Session::get('type') == 'branch'){
            $loggedinId = Session::get('branchId');
        }

        $studlists = StudentModel::where('branch_id', $loggedinId)->get();
        return view('branch.students.student_list_print')->with('studlists', $studlists);
    }

    public function branchstudentIdcard()
    {
        if(Session::get('type') == 'branch'){
            $loggedinId = Session::get('branchId');
        }

        $studlists = StudentModel::where('branch_id', $loggedinId)->get()->take(5);
        return view('branch.i_card.stud_id_card')->with('studlists', $studlists);
    }

    public function branchdispStudIdCard(request $request)
    {
        $data = $request->input();
        $checkbox_ids = $request['student_icard'];
        $studs_icard_regno = StudentIcard::all()->toArray();
        $stud_regno = array();

        foreach( $studs_icard_regno as $stud_icard_regno ){
            $stud_regno[] = $stud_icard_regno['stud_reg_no'];
        } 

        foreach($checkbox_ids as $checkbox_id){
            if(! in_array($checkbox_id, $stud_regno) ) {
                $icard = new StudentIcard();
                $icard->stud_reg_no = $checkbox_id;
                $icard->save();
            }
        }
        
        $students_data = StudentIcard::with('stuicardwithadmission')->whereIn('stud_reg_no', $checkbox_ids)->get()->toArray();
        return view('branch.i_card.disp_stud_id_card')->with('students_data', $students_data);
    }

    
}
