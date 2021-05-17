<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('back.user',compact('users'));
    }
    public function roles()
    {
        $roles = Role::all();
        $access = Permission::all();
        return view('back.roles',compact('roles','access'));
    }
    public function create_roles(Request $request)
    {
        if($request->roles)
        {
           Role::create(['name' => $request->roles]);
        }
        if($request->access)
        {
            Permission::create(['name' => $request->access]);
        }
        return back();
    }
    public function delete_roles($apa,$id)
    {
        if($apa == "access-tbl")
        {
            Permission::find($id)->delete();
        }
        if($apa == "role-tbl")
        {
            Role::find($id)->delete();
        }
        return back();
    }
}
