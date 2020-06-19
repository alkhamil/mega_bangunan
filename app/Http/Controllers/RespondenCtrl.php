<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pelanggan;

class RespondenCtrl extends Controller
{
    public function index()
    {
        $respondens = Pelanggan::whereBetween(DB::raw('DATE(created_at)'), array(date('Y-m-d'), date('Y-m-d')))->get();
        return view('responden.index', compact('respondens'));
    }

    public function cari(Request $request)
    {
        $dari = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));
        
        $respondens = Pelanggan::whereBetween(DB::raw('DATE(created_at)'), array($dari, $sampai))->get();
        $qDari = $request->dari;
        $qSampai = $request->sampai;
        return view('responden.index', compact('respondens', 'qDari', 'qSampai'));
    }
}
