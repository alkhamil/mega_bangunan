<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Criteria;
use App\Kuisioner;
use App\Dimension;

class ServqualCtrl extends Controller
{
    public function index()
    {
        $kuisioner = new Kuisioner;
        $dimensi = new Dimension;

        $nilai = $kuisioner->servqual(null);
        $rekap = $kuisioner->rekapituasi(null);
        $nilaiDimensi = $kuisioner->dimensiNilai(null);
        $keterangan = $kuisioner;
        $criteria = Criteria::all();
        $dimensi = Dimension::with(['criteria'])->get();

        return view('servqual.index', compact('criteria', 'nilai', 'dimensi', 'nilaiDimensi','keterangan', 'rekap'));
    }
}
