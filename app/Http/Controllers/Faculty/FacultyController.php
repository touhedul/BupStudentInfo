<?php

namespace App\Http\Controllers\Faculty;

use App\Model\Course;
use App\Model\CourseFaculty;
use App\Model\CourseStudentFaculty;
use App\Model\Exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FacultyController extends Controller
{
    public $id = 1;
    public function index()
    {
        $courseFacultys = CourseFaculty::where('faculty_id',$this->id)->get();
        return view('faculty.index',compact('courseFacultys'));
    }

    public function submitMark(Request $request)
    {
       $exam = Exam::where('student_id',$request->student_id)
                    ->where('course_id',$request->course_id)->first();


       if($exam)
       {
           $exam->ct = $request->ct;
           $exam->mid = $request->mid;
           $exam->final = $request->final;
           $exam->gpa = $request->gpa;
           $exam->save();
       }else{
           $exam = new Exam();
           $exam->course_id = $request->course_id;
           $exam->student_id = $request->student_id;
           $exam->ct = $request->ct;
           $exam->mid = $request->mid;
           $exam->final = $request->final;
           $exam->gpa = $request->gpa;
           $exam->save();
       }


       return back();

    }

    public function coursesStudent(Request $request)
    {
        $courseStudentFaculty = CourseStudentFaculty::where('course_faculty_id',$request->id)->get();
        return view('faculty.student_info',compact('courseStudentFaculty'));
    }
}
