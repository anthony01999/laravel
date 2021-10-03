<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'firstName',
        'lastName',
        'age',
    ];
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'students_course', 'course_id', 'student_id');
    }
}
