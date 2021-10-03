<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        /*  $users = User::all();
        return response()->json($users); */
        return User::with('roles')->get();
    }

    public function store()
    {
        $user = new User([
            'name' => request()->get('name'),
            'email' => request()->get('email'),
            'password' => request()->get('password'),
        ]);
        $user->save();
        return response()->json([
            'success' => true,
            'User' => $user
        ]);
    }
}
