<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CourseMangModel;
use App\Models\CourseSubjectModel;
use Session;

class CourseMangController extends Controller
{
    public function courseManage()
    {
        return view('admin.course_manage.course_management');
    }

    public function storeCourseManage(request $request)
    {
        $data = $request->input();

        $CourseData = new CourseMangModel();

        $CourseData->branch_id = Session::get('adminId');
        $CourseData->course_name = $data['course_name'];
        $CourseData->course_fee = $data['course_fee'];
        $CourseData->course_duration = $data['course_duration'];
        $CourseData->course_exam = $data['course_exam'];
        $CourseData->updated_at = date('Y-m-d H:i:s');
        $CourseData->created_at = date('Y-m-d H:i:s');
        $CourseData->save();
        $CourseData_id = $CourseData->id;

        if($CourseData_id){
            $subject = $data['subject'];
            $max_mark = $data['max_mark'];

            $subject_marks = array_combine($subject, $max_mark);

            foreach($subject_marks as $subject_name => $subject_mark){
                $CourseSubData = new CourseSubjectModel();
                $CourseSubData->course_id = $CourseData_id;
                $CourseSubData->subject = $subject_name;
                $CourseSubData->max_mark = $subject_mark;
                $CourseSubData->updated_at = date('Y-m-d H:i:s');
                $CourseSubData->created_at = date('Y-m-d H:i:s');
                $CourseSubData->save();

                $CourseSubData_id[] = $CourseSubData->id;
            }
        }
        if(!empty($CourseSubData_id)){
            return redirect('admin/course-management')->with('status',"Insert successfully");
        }
    }

    public function courseSubjectList()
    {
        $courseSubjects = CourseMangModel::with('courseSubjects')->get()->toArray();
        return view('admin.pages.course_subject_list')->with('courseSubjects', $courseSubjects);
    }

    public function branchcourseManage()
    {
        return view('branch.course_manage.course_management');
    }

    public function storebranchCourseManage(request $request)
    {
        $data = $request->input();

        $CourseData = new CourseMangModel();

        $CourseData->branch_id = Session::get('branchId');
        $CourseData->course_name = $data['course_name'];
        $CourseData->course_fee = $data['course_fee'];
        $CourseData->course_duration = $data['course_duration'];
        $CourseData->course_exam = $data['course_exam'];
        $CourseData->updated_at = date('Y-m-d H:i:s');
        $CourseData->created_at = date('Y-m-d H:i:s');
        $CourseData->save();
        $CourseData_id = $CourseData->id;

        if($CourseData_id){
            $subject = $data['subject'];
            $max_mark = $data['max_mark'];

            $subject_marks = array_combine($subject, $max_mark);

            foreach($subject_marks as $subject_name => $subject_mark){
                $CourseSubData = new CourseSubjectModel();
                $CourseSubData->course_id = $CourseData_id;
                $CourseSubData->subject = $subject_name;
                $CourseSubData->max_mark = $subject_mark;
                $CourseSubData->updated_at = date('Y-m-d H:i:s');
                $CourseSubData->created_at = date('Y-m-d H:i:s');
                $CourseSubData->save();

                $CourseSubData_id[] = $CourseSubData->id;
            }
        }
        if(!empty($CourseSubData_id)){
            return redirect(route('branchcourseManage'))->with('status',"Insert successfully");
        }
    }

}
