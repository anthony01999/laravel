<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return Course::with('students')->get();
    }

    public function store()
    {
        $courses = new Course([
            'name' => request()->get('name'),
            'code' => request()->get('code'),
        ]);
        $courses->save();
        return response()->json([
            'success' => true,
            'Course' => $courses
        ]);
    }
}
