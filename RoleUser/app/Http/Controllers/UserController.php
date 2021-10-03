<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(Request $request)
    {
        // $data = User::orderBy('id', 'DESC')->paginate(1);
        $data = User::all();
        return response()->json([
            'data' => $data
        ]);
    }


    public function create()
    {
        // $roles = Role::pluck('name', 'name')->all();
        // return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $request->input('roles');

        // return redirect()->route('users.index')
        //     ->with('success', 'User created successfully');
        return response()->json([
            "message" => "User Added Successfully",
            "User" => $user
        ]);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
