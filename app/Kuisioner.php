<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Kuisioner extends Model
{
    public function getKriteria($param, $req)
    {
        if ($param !== null) {
            $kuisioner =  Kuisioner::where('pelanggan_id', $param)->get();
            $c =  Criteria::all();
        }if($req !== null){
            $dari = date('Y-m-d', strtotime($req->dari));
            $sampai = date('Y-m-d', strtotime($req->sampai));
            
            $kuisioner = Kuisioner::whereBetween(DB::raw('DATE(created_at)'), array($dari, $sampai))->get();
            $c =  Criteria::all();
        }else {
            $kuisioner =  Kuisioner::all();
            $c =  Criteria::all();
        }

        if(count($kuisioner)){
            foreach($kuisioner as $data)
            {
                $hasil['kenyataan'][$data->criteria_id][] = $data->kenyataan;
                $hasil['harapan'][$data->criteria_id][] = $data->harapan;
            }

        }else{
            foreach($c as $data)
            {
                $hasil['kenyataan'][$data->id][] = 0;
                $hasil['harapan'][$data->id][] =  0;
            }
        }

        return $hasil;
    }

    public function rekapituasi($param = null, $req)
    {
        $data = $this->getKriteria($param, $req);
        
        foreach($data as $key => $value)
        {
           foreach($value as $id => $db)
           {
               $hasil[$key][$id] = array_count_values($db);
           }    
        }
        
        return $hasil;
    }

    public function servqual($param = null, $req)
    {
        $data = $this->getKriteria($param, $req);
        
        foreach($data['kenyataan'] as $key => $db)
        {
            $hasil['bobotkenyataan'][$key] = array_sum($data['kenyataan'][$key]);
            $hasil['ratakenyataan'][$key] = number_format(array_sum($data['kenyataan'][$key]) / count($data['kenyataan'][$key]), 2);
            $hasil['bobotharapan'][$key] = array_sum($data['harapan'][$key]);
            $hasil['rataharapan'][$key] = number_format(array_sum($data['harapan'][$key]) / count($data['harapan'][$key]), 2);
        }   

        return $hasil;
    }

    public function dimensiNilai($param = null, $req)
    {   
        $kriteria = $this->servqual($param, $req);
        $dimensi = Dimension::with(['criteria'])->get();

        foreach($dimensi as $data)
        {   
            $bobotK = 0;
            $bobotH = 0;
            $rataK = 0;
            $rataH = 0;
            foreach($data->criteria as $dt)
            {
                $rataK += $kriteria['ratakenyataan'][$dt->id]; 
                $rataH += $kriteria['rataharapan'][$dt->id]; 

                $hasil['bobotkenyataan'][$data->id] = $rataK;   
                $hasil['ratakenyataan'][$data->id] = number_format($rataK/ count($data->criteria), 2);   
                $hasil['bobotharapan'][$data->id] = $rataH;   
                $hasil['rataharapan'][$data->id] = number_format($rataH/ count($data->criteria), 2);   
            }
        }

        return $hasil;
    }

    public function keterangan($a)
    {
        if($a < 0){
            $ket = 'Tidak puas';
        }
        if($a == 0){
            $ket = 'Cukup puas';
        }
        if($a > 0){
            $ket = 'Sangat puas';
        }

        return $ket;
    }
}
