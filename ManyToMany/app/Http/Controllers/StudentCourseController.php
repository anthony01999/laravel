<?php

namespace App\Http\Controllers;

use App\Models\StudentCourse;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    public function index()
    {
        $studentcourse = StudentCourse::with('students', 'courses')->get();
        return response()->json($studentcourse);
    }

    public function store()
    {
        $studentcourse = new StudentCourse([
            'student_id' => request()->get('student_id'),
            'course_id' => request()->get('course_id'),
        ]);
        $studentcourse->save();
        return response()->json([
            'success' => true,
            'Student Course' => $studentcourse
        ]);
    }
    public function destroy($id)
    {
        StudentCourse::where('id', $id)->delete();
        return response()->json([
            'success' => true,
            'message' => "Assign Deleted!"
        ]);
    }
}
