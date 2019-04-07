<?php

namespace App\Http\Controllers\Student;

use App\Model\CourseFaculty;
use App\Model\CourseStudentFaculty;
use App\Model\Exam;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('student.home');
    }

    public function registerCourse()
    {
        $courseFacultys = CourseFaculty::all();
        return view('student.register_course',compact('courseFacultys'));
    }

 public function registerCoursePerform(Request $request)
    {
       $couseStudentFaculty = new CourseStudentFaculty();
       $couseStudentFaculty->user_id = Auth::id();
       $couseStudentFaculty->course_faculty_id = $request->id;
       $couseStudentFaculty->save();

        return back()->with('success','Registration added.');
    }


    public function currentCourse()
    {
        $currentCourses = CourseStudentFaculty::where('user_id',Auth::id())->get();
        return view('student.current_course',compact('currentCourses'));
    }
    public function courseHistory()
    {
        $courseStudentFacultys = CourseStudentFaculty::where('user_id',Auth::id())->get();
        return view('student.course_history',compact('courseStudentFacultys'));
    }
    public function profile()
    {
        $student = User::where('id',Auth::id())->first();
        return view('student.profile',compact('student'));
    }

    public function examMark(Request $request)
    {

        $examMark = Exam::where('course_id',$request->id)
                        ->where('student_id',Auth::id())->first();

        return view('student.exam_mark',compact('examMark'));
    }

    public function routine()
    {
        return view('student.routine');
    }


}
