<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('showrooms')->get();
        return response()->json($cars);
    }

    public function store()
    {
        $cars = new Car([
            'showroom_id' => request()->get('showroom_id'),
            'name' => request()->get('name'),
            'plateNumber' => request()->get('plateNumber'),
        ]);
        $cars->save();
        return response()->json([
            "message" => "Car Added Successfully",
            "Car" => $cars
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $cars = Car::where('id', $id)->first();
        $cars->update($data);


        return response()->json([
            "message" => "Car Updated Successfully",
            "Car" => $cars
        ]);
    }

    public function show($id)
    {
        $cars = Car::where('id', $id)->with('showrooms')->first();
        return response()->json($cars);
    }

    public function destroy($id)
    {
        $cars = Car::find($id);
        $cars->delete();
        return response()->json('Car Deleted Successfully');
    }
}
