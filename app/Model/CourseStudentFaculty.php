<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseStudentFaculty extends Model
{
    protected $fillable = [
        'user_id','course_faculty_id',
    ];

    public function courseFaculty()
    {
        return $this->belongsTo(CourseFaculty::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function examMark($studentId,$courseId)
    {
        return Exam::where('student_id',$studentId)
                ->where('course_id',$courseId)->first();
    }
}
