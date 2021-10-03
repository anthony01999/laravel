<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable = [
        'student_id',
        'city',
        'phone',
    ];

    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
