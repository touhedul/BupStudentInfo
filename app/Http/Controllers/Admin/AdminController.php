<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminHelper;
use App\Model\Course;
use App\Model\CourseFaculty;
use App\Model\Faculty;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        AdminHelper::constructorWork($this);
    }

    public function index()
    {
        return view('admin.index');
    }

    public function student()
    {
        $students = User::all();
        return view('admin.student', compact('students'));
    }

    public function addStudent(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'student_id' => ['required', 'string', 'max:8'],
            'phone' => ['required', 'digits:11', 'starts_with:01'],
            'department' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8',],
        ]);
        $student = new User();
        $student->name = $request->name;
        $student->student_id = $request->student_id;
        $student->phone = $request->phone;
        $student->department = $request->department;
        $student->password = Hash::make(12345678);
        $student->save();
        return back()->with('success', 'Student Add successful.');
    }

    public function faculty()
    {
        $facultys = Faculty::all();
        return view('admin.faculty', compact('facultys'));
    }

    public function addFaculty(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'teacher_id' => ['required', 'string', 'max:8', 'unique:faculties'],
            'phone' => ['required', 'digits:11', 'starts_with:01'],
            'password' => ['required', 'string', 'min:8',],
        ]);
        $faculty = new Faculty();
        $faculty->name = $request->name;
        $faculty->teacher_id = $request->teacher_id;
        $faculty->phone = $request->phone;
        $faculty->password = Hash::make(12345678);
        $faculty->save();
        return back()->with('success', 'Teacher Add successful.');
    }

    public function course()
    {
        $courses = Course::all();
        return view('admin.course', compact('courses'));
    }

    public function addCourse(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'credit' => ['required', 'integer'],
        ]);
        $course = new Course();
        $course->name = $request->name;
        $course->credit = $request->credit;
        $course->save();
        return back()->with('success', 'Course is added successful.');
    }

    public function deleteCourse(Request $request)
    {
        $course = Course::find($request->id);
        $course->delete();
        return back()->with('success', 'Course Delete successful.');
    }

    public function courseUpdate(Request $request)
    {
        $course = Course::find($request->id);
        $course->name = $request->name;
        $course->credit = $request->credit;
        $course->save();
        return redirect(route('admin.course'))->with('success','Update successful');
    }

    public function updateCourse(Request $request)
    {
        $course = Course::find($request->id);
        return view('admin.update_course',compact('course'));
    }


    public function assignCourse()
    {
        $courses = Course::all();
        $facultys = Faculty::all();
        $courseFacultys = CourseFaculty::all();
        return view('admin.assign_course', compact('courses', 'facultys', 'courseFacultys'));
    }

    public function addAssignCourse(Request $request)
    {
        $this->validate($request, [
            'faculty_id' => ['required', 'integer'],
            'course_id' => ['required', 'integer'],
            'lecture_time' => ['required'],
        ]);
        $courseFaculty = new CourseFaculty();
        $courseFaculty->course_id = $request->course_id;
        $courseFaculty->faculty_id = $request->faculty_id;
        $courseFaculty->lecture_time = $request->lecture_time;
        $courseFaculty->save();

        return back()->with('success', 'Course Assign to faculty');
    }

}
