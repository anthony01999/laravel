<?php

namespace App\Http\Controllers;

use App\Models\PanCard;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PersonController extends Controller
{

    //index
    public function index()
    {
        $persons = Person::with('pancards', 'addresses', 'cars')->get();
        return response()->json($persons);
    }

    //Store
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'age' => 'required',
            'email' => 'required|email|unique:users',
            'number' => 'required|min:4',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $persons = new Person([
            'firstName' => request()->get('firstName'),
            'lastName' => request()->get('lastName'),
            'age' => request()->get('age'),
            'email' => request()->get('email'),
        ]);
        $pancards = new PanCard([
            'number' => request()->get('number'),
        ]);
        $persons->save();
        $persons->pancards()->save($pancards);
        return response()->json([
            'success' => true,
            'Person' => $persons,
            "Pan Card" => $pancards
        ]);
    }

    public function update(Request $request, $id)
    {
        $person = Person::where('id', $id)->with('pancards')->first();
        $pancard = PanCard::where('id', $id)->with('persons')->first();
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'age' => 'required',
            'email' => 'required|email|unique:users',
            'number' => 'required|min:4',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $person->update($request->all());


        return response()->json([
            'success' => true,
            'Person' => $person
        ]);
    }
}
