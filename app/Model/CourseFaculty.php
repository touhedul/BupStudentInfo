<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseFaculty extends Model
{
    protected $fillable = [
        'course_id','faculty_id','lecture_time',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function courseFacultyStudent()
    {
        return $this->hasMany(CourseStudentFaculty::class);
    }


}
