<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::all();
        return response()->json($profile);
    }

    public function store(Request $request)
    {
        $profile = new Profile([
            'name' => request()->get('name'),
            'location' => request()->get('location'),
            'age' => request()->get('age'),
        ]);
        $profile->save();
        return response()->json([
            "message" => "Profile Added Successfully",
            "Profile" => $profile
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $profile = Profile::where('id', $id)->first();
        $profile->update($data);


        return response()->json([
            "message" => "Profile Updated Successfully",
            "Profile" => $profile
        ]);
    }

    public function show($id)
    {
        $profile = Profile::where('id', $id)->first();
        return response()->json($profile);
    }

    public function destroy($id)
    {
        $profile = Profile::find($id);

        $profile->delete();

        return response()->json('Profile Deleted Successfully');
    }
}
