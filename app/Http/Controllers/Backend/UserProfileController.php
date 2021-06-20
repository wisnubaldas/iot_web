<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\UserTrait;
use App\Models\Blog\Profile;
use Illuminate\Support\Str;

class UserProfileController extends Controller
{
    use UserTrait;
    public function index($id)
    {
        $user = $this->get_profile($id);
        return view('back.user-profile',compact('user'));
    }
    public function update(Request $request)
    {
        return $this->update_profile($request);
    }
    public function edit($id)
    {
        $user = $this->get_profile($id);
        return view('back.user-profile-edit',compact('user'));
    }
}
