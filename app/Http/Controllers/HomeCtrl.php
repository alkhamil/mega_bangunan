<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dimension;
use App\Pelanggan;
use App\Kuisioner;
use App\Criteria;

class HomeCtrl extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function survey()
    {
        $dimensions = Dimension::with(['criteria'])->get();
        
        return view('home.survey', compact('dimensions'));
    }

    public function survey_create(Request $request)
    {
        $pelanggan = new Pelanggan;
        $criteria = Criteria::all();
        $pelanggan->nama = $request->nama;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->no_tlp = $request->hp;
        $pelanggan->saran = $request->saran;
        if($pelanggan->save()){
            foreach($criteria as $data){
                $kuisioner = new Kuisioner;
                $kuisioner->pelanggan_id = $pelanggan->id;
                $kuisioner->criteria_id = $data->id;
                $kuisioner->kenyataan = empty($request->k[$data->id]) ? 0 : $request->k[$data->id];
                $kuisioner->harapan = empty($request->h[$data->id]) ? 0 : $request->h[$data->id];
                
                $kuisioner->save();
            }
        }

        return redirect('feedback')->with('msg', 'Data dimensi berhasil dibuat!');
        
    }

    public function feedback()
    {
        return view('home.feedback');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function profile()
    {
        return view('home.profile');
    }

    public function about()
    {
        return view('home.about');
    }
}
