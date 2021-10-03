<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentCourse extends Model
{
    protected $table = 'students_course';

    protected $fillable = [
        'student_id',
        'course_id',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'students_course', 'student_id', 'student_id');
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'students_course', 'course_id', 'course_id');
    }
}
