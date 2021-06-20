<?php

namespace App\Traits;
use Illuminate\Support\Facades\Validator;
use DataTables;
use App\Models\User;
use App\Models\Blog\Profile;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

trait UserTrait
{
    public function asyn_user_roles($data)
    {
        $user = User::find($data['id_user']);
        if($data['mehong'] == 'asyn'){
            $user->assignRole($data['role']);
            return ['sukses asyn'];
        }
        if($data['mehong'] == 'remove'){
            $user->removeRole($data['role']);
            return ['sukses remove'];
        }
    }
    public function user_grid()
    {
        $model = User::with('roles')->select('users.*');
        $role = Role::all();
        return DataTables::of($model)
        ->editColumn('email_verified_at',function($user){
            return $user->created_at->format('Y/m/d H:i:s');
        })
        ->addColumn('roles',function($user) use ($role) {
            $tpl = '<select data-user="'.$user->id.'" name="select_access" class="multiple-select2" style="width:100%" multiple="multiple">';
                    foreach ($role as $v) {
                        $selected = '';
                        foreach ($user->roles as $r) {
                                if($v->name == $r->name)
                                {
                                    $selected = 'selected';
                                }
                        }
                        $tpl .= '<option '.$selected.' value="'.$user->id.'/'.$v->name.'">'.$v->name.'</option>';
                    }
            $tpl .= '</select>';
            return $tpl;
        })
        ->addColumn('action', function ($user) {
            return '<div class="btn-group ">
                        <a class="btn btn-xs btn-pink delete-data" href="javascript:;" data-destroy="/user/delete/'.$user->id.'">Delete</a>
                        <a class="btn btn-xs btn-purple edit" href="/user/edit/'.$user->id.'">Edit</a>
                        <a class="btn btn-xs btn-green edit" href="/user-profile/'.$user->id.'">Profile</a>
                    </div>';
        })
        ->rawColumns(['action','roles'])
        ->make(true);
    }
    public function user_validate($request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        if ($validator->fails()) {
            return redirect('/user/create')
                        ->withErrors($validator)
                        ->withInput();
        }

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            $profile = new Profile;
            $profile->user_id = $user->id;
            $profile->save();
    }
    public function get_profile($id_user)
    {
        return User::with('profile')->find($id_user);
        // return Profile::with('user')->where('user_id',$id_user)->first();
    }
    public function update_profile($request)
    {
        if(in_array($request->name,['phone_home','phone_office','phone_mobile']) && preg_match('~[A-Z|a-z]+~', $request->value))
        {
            return response('Nomer telepon tidak boleh mengandung huruf', 500)
                  ->header('Content-Type', 'text/plain');
        }
        $profile = Profile::where('user_id',$request->pk)->first();
        if(!$profile)
        {
            return response('Hello World', 500)
                  ->header('Content-Type', 'text/plain');
        }

        $profile[$request->name] = $request->value;
        $profile->save();
        return $profile->updated_at->format('l, d F Y H:i:s');
    }
}
