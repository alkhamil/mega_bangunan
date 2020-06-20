<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Criteria;
use App\Kuisioner;
use App\Dimension;
use PDF;

class LaporanCtrl extends Controller
{
    public function index()
    {
        $kuisioner = new Kuisioner;
        $dimensi = new Dimension;

        $nilai = $kuisioner->servqual();
        $nilaiDimensi = $kuisioner->dimensiNilai();
        $keterangan = $kuisioner;
        $criteria = Criteria::with(['dimensi'])->get();
        $dimensi = Dimension::with(['criteria'])->get();

        return view('laporan.index', compact('criteria', 'nilai', 'dimensi', 'nilaiDimensi', 'keterangan'));
    }

    public function chart()
    {
        $kuisioner = new Kuisioner;
        $criteria = Criteria::all();
        $nilai = $kuisioner->servqual();
        foreach($criteria as $key => $data){
            $hasil[$key]['id'] = $data->id;
            $hasil[$key]['nilai'] = $nilai['ratakenyataan'][$data->id] - $nilai['rataharapan'][$data->id];
            $hasil[$key]['ket'] = $data->content;
        }

        return response()->json($hasil);
    }

    public function chartDimensi()
    {
        $kuisioner = new Kuisioner;
        $dimensi = Dimension::with(['criteria'])->get();

        $nilai = $kuisioner->dimensiNilai();
        foreach($dimensi as $key => $data){
            $hasil[$key]['id'] = $data->id;
            $hasil[$key]['nilai'] = $nilai['ratakenyataan'][$data->id] - $nilai['rataharapan'][$data->id];
            $hasil[$key]['name'] = $data->name .'('. $data->description .')';
        }

        return response()->json($hasil);
    }

    public function cetakPernyataan()
    {   
        $kuisioner = new Kuisioner;
        $dimensi = new Dimension;

        $nilai = $kuisioner->servqual();
        $nilaiDimensi = $kuisioner->dimensiNilai();
        $keterangan = $kuisioner;
        $criteria = Criteria::with(['dimensi'])->get();
        $dimensi = Dimension::with(['criteria'])->get();

        $pdf = PDF::loadview('laporan.cetak_pernyataan', compact('criteria', 'nilai', 'dimensi', 'nilaiDimensi', 'keterangan'));
        return $pdf->stream();
    }

    public function cetakDimensi()
    {   
        $kuisioner = new Kuisioner;
        $dimensi = new Dimension;

        $nilai = $kuisioner->servqual();
        $nilaiDimensi = $kuisioner->dimensiNilai();
        $keterangan = $kuisioner;
        $criteria = Criteria::with(['dimensi'])->get();
        $dimensi = Dimension::with(['criteria'])->get();

        $pdf = PDF::loadview('laporan.cetak_dimensi', compact('criteria', 'nilai', 'dimensi', 'nilaiDimensi', 'keterangan'));
        return $pdf->stream();
    }
}
