<?php

namespace App\Http\Controllers;

use App\Models\RoleUser;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    public function index()
    {
        $roleuser = RoleUser::with('roles', 'users')->get();
        return response()->json($roleuser);
    }

    public function store()
    {
        $roleuser = new RoleUser([
            'user_id' => request()->get('user_id'),
            'role_id' => request()->get('role_id'),
        ]);
        $roleuser->save();
        return response()->json([
            'success' => true,
            'User' => $roleuser
        ]);
    }

    public function destroy($id)
    {
        RoleUser::where('id', $id)->delete();
        return response()->json([
            'success' => true,
            'message' => "Role User Deleted !   "
        ]);
    }
}
