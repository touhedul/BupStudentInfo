<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'ct','mid','final','course_id','student_id','gpa',
    ];
}
