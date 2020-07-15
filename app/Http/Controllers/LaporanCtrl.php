<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Criteria;
use App\Kuisioner;
use App\Dimension;
use PDF;
use DB;
use App\Pelanggan;

class LaporanCtrl extends Controller
{
    public function index()
    {
        $kuisioner = new Kuisioner;
        $dimensi = new Dimension;

        $respondens = Pelanggan::all();
        $nilai = $kuisioner->servqual(null,null);
        $nilaiDimensi = $kuisioner->dimensiNilai(null,null);
        $keterangan = $kuisioner;
        $criteria = Criteria::with(['dimensi'])->get();
        $dimensi = Dimension::with(['criteria'])->get();

        return view('laporan.index', compact('criteria', 'nilai', 'dimensi', 'nilaiDimensi', 'keterangan', 'respondens'));
    }

    public function cari(Request $request)
    {
        $kuisioner = new Kuisioner;
        $dimensi = new Dimension;
        $dari = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $nilai = $kuisioner->servqual(null,$request);
        $nilaiDimensi = $kuisioner->dimensiNilai(null,$request);
        $respondens = Pelanggan::whereBetween(DB::raw('DATE(created_at)'), array($dari, $sampai))->get();
        $keterangan = $kuisioner;
        $criteria = Criteria::with(['dimensi'])->get();
        $dimensi = Dimension::with(['criteria'])->get();
        $qDari = $request->dari;
        $qSampai = $request->sampai;

        return view('laporan.index', compact('criteria', 'nilai', 'dimensi', 'nilaiDimensi', 'keterangan', 'qDari', 'qSampai', 'respondens'));
    }

    public function chart(Request $request)
    {

        $kuisioner = new Kuisioner;
        $criteria = Criteria::all();
        if($request->dari == null){
            $nilai = $kuisioner->servqual(null,null);
        }else{
            $nilai = $kuisioner->servqual(null,$request);
        }
        foreach($criteria as $key => $data){
            $hasil[$key]['id'] = $data->id;
            $hasil[$key]['nilai'] = number_format($nilai['ratakenyataan'][$data->id] - $nilai['rataharapan'][$data->id], 2);
            $hasil[$key]['ket'] = $data->content;
        }

        return response()->json($hasil);
    }

    public function chartDimensi(Request $request)
    {
        $kuisioner = new Kuisioner;
        $dimensi = Dimension::with(['criteria'])->get();
        if($request->dari == null){
            $nilai = $kuisioner->dimensiNilai(null, null);     
        }else{
            $nilai = $kuisioner->dimensiNilai(null, $request);     
        }
        foreach($dimensi as $key => $data){
            $hasil[$key]['id'] = $data->id;
            $hasil[$key]['nilai'] = number_format($nilai['ratakenyataan'][$data->id] - $nilai['rataharapan'][$data->id], 2);
            $hasil[$key]['name'] = $data->name .'('. $data->description .')';
        }

        return response()->json($hasil);
    }

    public function cetakPernyataan(Request $request)
    {   
        $kuisioner = new Kuisioner;
        $dimensi = new Dimension;

        if($request->dari == null){
            $nilai = $kuisioner->servqual(null, null);
            $nilaiDimensi = $kuisioner->dimensiNilai(null, null);
        }else{
            $nilai = $kuisioner->servqual(null, $request);
            $nilaiDimensi = $kuisioner->dimensiNilai(null, $request);
        }
        $keterangan = $kuisioner;
        $criteria = Criteria::with(['dimensi'])->get();
        $dimensi = Dimension::with(['criteria'])->get();

        $pdf = PDF::loadview('laporan.cetak_pernyataan', compact('criteria', 'nilai', 'dimensi', 'nilaiDimensi', 'keterangan'));
        return $pdf->stream();
    }

    public function cetakDimensi(Request $request)
    {   
        $kuisioner = new Kuisioner;
        $dimensi = new Dimension;

        if($request->dari == null){
            $nilai = $kuisioner->servqual(null, null);
            $nilaiDimensi = $kuisioner->dimensiNilai(null, null);
        }else{
            $nilai = $kuisioner->servqual(null, $request);
            $nilaiDimensi = $kuisioner->dimensiNilai(null, $request);
        }
        $keterangan = $kuisioner;
        $criteria = Criteria::with(['dimensi'])->get();
        $dimensi = Dimension::with(['criteria'])->get();

        $pdf = PDF::loadview('laporan.cetak_dimensi', compact('criteria', 'nilai', 'dimensi', 'nilaiDimensi', 'keterangan'));
        return $pdf->stream();
    }

    public function rekapitulasi()
    {
        $kuisioner = new Kuisioner;
        $dimensi = new Dimension;
        $criteria = Criteria::all();
        $dimensi = Dimension::with(['criteria'])->get();

        $rekap = $kuisioner->rekapituasi(null, null);

        return view('laporan.rekapitulasi', compact('criteria', 'dimensi', 'rekap'));
    }

    public function rekapitulasiCari(Request $request)
    {
        $kuisioner = new Kuisioner;
        $dimensi = new Dimension;
        $criteria = Criteria::all();
        $dimensi = Dimension::with(['criteria'])->get();

        $rekap = $kuisioner->rekapituasi(null, $request);

        return view('laporan.rekapitulasi', compact('criteria', 'dimensi', 'rekap'));
    }
}
