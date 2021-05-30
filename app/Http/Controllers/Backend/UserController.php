<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Traits\UserTrait;
class UserController extends Controller
{
    use UserTrait;
    public function index(Request $request)
    {
        if($request->ajax())
        {
           return $this->user_grid();
        }
        return view('back.user');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('back.user-create',compact('user'));
    }
    public function update($id, Request $request)
    {
        $this->user_validate($id,$request);
        return back();
    }
    public function delete($id)
    {
        return User::find($id)->delete();
    }
    public function user_roles($mehong,$id_user,Request $request)
    {
        return $this->asyn_user_roles([
            'mehong'=>$mehong,
            'id_user'=>$id_user,
            'role'=>$request->role,
        ]);
    }
    public function create(Request $request)
    {
        if($request->method() == 'POST')
        {
            $this->user_validate($request);
            return back();
            
        }
        return view('back.user-create');
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
    public function syn_permission(Request $request)
    {
        $role = explode(',',$request->id);
        Role::find($role[0])->givePermissionTo($role[1]);
    }
    public function revoke_permission(Request $request)
    {
        $role = explode(',',$request->id);
        Role::find($role[0])->revokePermissionTo($role[1]);
    }
}
