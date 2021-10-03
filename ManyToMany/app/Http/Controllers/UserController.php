<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required|min:5',
            'email' => 'required|email|unique:users',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $users = new User([
            'name' => request()->get('name'),
            'password' => request()->get('password'),
            'email' => request()->get('email'),
        ]);
        $users->save();
        return response()->json([
            'success' => true,
            'Users' => $users
        ]);
    }
}
