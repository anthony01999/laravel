<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return Student::with('courses')->get();
    }
    public function store()
    {
        $students = new Student([
            'firstName' => request()->get('firstName'),
            'lastName' => request()->get('lastName'),
            'age' => request()->get('age'),
        ]);
        $students->save();
        return response()->json([
            'success' => true,
            'Student' => $students
        ]);
    }
}
