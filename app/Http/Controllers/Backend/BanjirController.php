<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BanjirController extends Controller
{
    public function index()
    {
        return view('back.banjir');
    }
}
