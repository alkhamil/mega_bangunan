<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuisioner extends Model
{
    public function getKriteria($param)
    {
        if ($param !== null) {
            $kuisioner =  Kuisioner::where('pelanggan_id', $param)->get();
        }else {
            $kuisioner =  Kuisioner::all();
        }

        foreach($kuisioner as $data)
        {
            $hasil['kenyataan'][$data->criteria_id][] = $data->kenyataan;
            $hasil['harapan'][$data->criteria_id][] = $data->harapan;
        }

        return $hasil;
    }

    public function servqual($param = null)
    {
        $data = $this->getKriteria($param);
        
        foreach($data['kenyataan'] as $key => $db)
        {
            $hasil['bobotkenyataan'][$key] = array_sum($data['kenyataan'][$key]);
            $hasil['ratakenyataan'][$key] = number_format(array_sum($data['kenyataan'][$key]) / count($data['kenyataan'][$key]), 2);
            $hasil['bobotharapan'][$key] = array_sum($data['harapan'][$key]);
            $hasil['rataharapan'][$key] = number_format(array_sum($data['harapan'][$key]) / count($data['harapan'][$key]), 2);
        }   

        return $hasil;
    }

    public function dimensiNilai($param = null)
    {   
        $kriteria = $this->servqual($param);
        $dimensi = Dimension::with(['criteria'])->get();

        foreach($dimensi as $data)
        {   
            $bobotK = 0;
            $bobotH = 0;
            $rataK = 0;
            $rataH = 0;
            foreach($data->criteria as $dt)
            {
                $bobotK += $kriteria['bobotkenyataan'][$dt->id]; 
                $rataK += $kriteria['ratakenyataan'][$dt->id]; 
                $bobotH += $kriteria['bobotharapan'][$dt->id]; 
                $rataH += $kriteria['rataharapan'][$dt->id]; 

                $hasil['bobotkenyataan'][$data->id] = $bobotK;   
                $hasil['ratakenyataan'][$data->id] = number_format($rataK, 2);   
                $hasil['bobotharapan'][$data->id] = $bobotH;   
                $hasil['rataharapan'][$data->id] = number_format($rataH, 2);   
            }
        }

        return $hasil;
    }

    public function keterangan($a)
    {
        if($a < 0){
            $ket = 'Sangat tidak puas';
        }
        if($a == 0){
            $ket = 'Cukup puas ';
        }
        if($a > 0){
            $ket = 'Sangat puas';
        }

        return $ket;
    }
}
