<?php

namespace App\Http\Controllers;

use App\Models\Showroom;
use Illuminate\Http\Request;

class ShowroomController extends Controller
{
    public function index()
    {
        $showrooms = Showroom::with('cars')->get();
        return response()->json($showrooms);
    }

    public function store()
    {
        $showrooms = new Showroom([
            'title' => request()->get('title'),
            'location' => request()->get('location'),
        ]);
        $showrooms->save();
        return response()->json([
            "message" => "Showroom Added Successfully",
            "Post" => $showrooms
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $showrooms = Showroom::where('id', $id)->first();
        $showrooms->update($data);


        return response()->json([
            "message" => "ShowRoom Updated Successfully",
            "ShowRoom" => $showrooms
        ]);
    }

    public function show($id)
    {
        $showrooms = Showroom::where('id', $id)->with('cars')->first();
        return response()->json($showrooms);
    }

    public function destroy($id)
    {
        $showrooms = Showroom::find($id);

        $showrooms->delete();

        return response()->json('Showroom Deleted Successfully');
    }
}
