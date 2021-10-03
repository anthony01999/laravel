<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('contacts')->get();
        return response()->json($students);
    }

    public function store()
    {
        $students = new Student([
            'firstName' => request()->get('firstName'),
            'lastName' => request()->get('lastName'),
            'age' => request()->get('age'),
        ]);
        $contacts = new Contact([
            'city' => request()->get('city'),
            'phone' => request()->get('phone'),
        ]);
        $students->save();
        $students->contacts()->save($contacts);
        return response()->json([
            'success' => true,
            'Student' => $students
        ]);
    }

    public function update(Request $request,  $id)
    {
        $data = $request->all();
        $students = Student::where('id', $id)->with('contacts')->first();
        $contacts = Contact::where('id', $id)->with('students')->first();
        $students->update($data);
        $contacts->update($data);
        $students->push();
        $contacts->push();

        $students = Student::where('id', $id)->with('contacts')->first();

        return response()->json([
            "message" => "Student Updated Successfully",
            "Student" => $students
        ]);
    }

    public function show($id)
    {
        $students = Student::where('id', $id)->with('contacts')->first();
        return response()->json($students);
    }

    public function destroy($id)
    {
        $students = Student::find($id);

        $students->delete();

        return response()->json('Student Deleted Successfully');
    }
}
