<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class AboutController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('back.blog.about',compact('users'));
    }
    public function crot()
    {
        dd('croooot');
    }
}
