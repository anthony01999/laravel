<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        /*  $roles = Role::all();
        return response()->json($roles); */
        return Role::with('users')->get();
    }

    public function store()
    {
        $role = new Role([
            'name' => request()->get('name'),
        ]);
        $role->save();
        return response()->json([
            'success' => true,
            'User' => $role
        ]);
    }
}
