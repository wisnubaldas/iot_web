<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuhuController extends Controller
{
    public function index()
    {
        return view('back.suhu');
    }
}
