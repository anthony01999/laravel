<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('persons')->get();
        return response()->json($cars);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'person_id' => 'required',
            'plateNumber' => 'required|unique:cars',
            'registrationNumber' => 'required|min:3',
            'registrationArea' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $cars = new Car([
            'person_id' => request()->get('person_id'),
            'plateNumber' => request()->get('plateNumber'),
            'registrationNumber' => request()->get('registrationNumber'),
            'registrationArea' => request()->get('registrationArea'),
        ]);
        $cars->save();
        return response()->json([
            'success' => true,
            'Car' => $cars
        ]);
    }

    public function update(Request $request, $id)
    {
        $cars = Car::where('id', $id)->with('persons')->first();
        $validator = Validator::make($request->all(), [
            'person_id' => 'required',
            'plateNumber' => 'required|unique:cars',
            'registrationNumber' => 'required|min:3',
            'registrationArea' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $cars->update($request->all());


        return response()->json([
            'success' => true,
            'Cars' => $cars
        ]);
    }
}
