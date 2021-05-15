<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Models\Gate;
use DataTables;
class GateController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = Gate::query();
            return DataTables::of($users)
                ->orderColumn('status', '-status $1')
                ->make(true);
        }
       return view('back.gate');
    }
    public function logging($station, Request $request)
    {
        // First we fetch the Request instance
        // $request = Request::instance();
        // Now we can get the content from it
        // $content = $request->getContent();
        // $data = explode('=',$content);
        // Log::debug($data[1]);
        Log::debug($station);

        // dump($station);
        return response('ok', 200)
                  ->header('Content-Type', 'text/plain');
    }
}
