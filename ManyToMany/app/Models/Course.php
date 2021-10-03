<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'name',
        'code',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'students_course', 'student_id', 'course_id');
    }
}
