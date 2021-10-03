<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Phone;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('phone')->get();
        return response()->json($users);
    }

    public function store()
    {
        $user = new User([
            'name' => request()->get('name'),
            'email' => request()->get('email'),
            'password' => request()->get('password'),
        ]);
        $phone = new Phone([
            'phone' => request()->get('phone'),
        ]);
        $user->save();
        $user->phone()->save($phone);
        return response()->json([
            'success' => true,
            'User' => $user
        ]);
    }

    public function show($id)
    {
        $user = User::where('id', $id)->with('phone')->first();
        return response()->json($user);
    }


    public function update(Request $request,  $id)
    {
        $data = $request->all();
        $user = User::where('id', $id)->with('phone')->first();
        // $phone = Phone::where('id', $pid)->first();
        $user->update($data);
        // $phone->update($data);

        return response()->json([
            "message" => "User Updated Successfully",
            "User" => $user
        ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return response()->json('User Deleted Successfully');
    }
}
