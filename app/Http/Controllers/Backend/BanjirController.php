<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banjir;
use App\Models\Status;
use Illuminate\Support\Facades\Log;
class BanjirController extends Controller
{
    public function index()
    {
        return view('back.banjir');
    }
    public function get_data(Request $request)
    {
        // Log::debug($request->all());
        $banjir = new Banjir;
        $banjir->station_id = 1;
        $banjir->level = $request->level_banjir;
        $banjir->ip = $request->getClientIp();
        $banjir->save();
        return [
            'date'=>date('Y-m-d H:i:s',strtotime('now')),
            'station'=>$request->id_alat,
            'level'=>$request->level_banjir,
            'ip'=>$request->getClientIp()
        ];
    }
    public function set_status($id = '')
    {
        // $id -- id alat --
        $s = Status::first();
        // $s->void = 1;
        // $s->save();
       Log::debug($s->void);
       echo $s->void;
    //    return response()->json($s->void);
    }
    public function send_status()
    {
        $s = Status::first();
        $s->void = 1;
        $s->save();
        // Log::debug($s->void);
        return $s->void;
    }
}
