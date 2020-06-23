@extends('layouts.app')

@section('content')
<div class="app-title">
    <div>
        <h1>Perhitungan Servqual</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active">Perhitungan Servqual</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <span class="d-block p-2 bg-primary text-white">Tabel rekapitulasi kuesioner</span>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-light">
                            <tr class="text-center">
                                <th rowspan="2" style="vertical-align : middle;text-align:center;">No</th>
                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Item Kriteria</th>
                                <th colspan="5" style="border-right: 2px solid #000;">Kenyataan</th>
                                <th colspan="5">Harapan</th>
                            </tr>
                            <tr class="text-center">
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th style="border-right: 2px solid #000;">5</th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $x = 0;
                            @endphp
                            @foreach ($dimensi as $key => $d)
                                <tr>
                                    <td class="bg-dark text-white" colspan="12">Dimensi {{ $d->name }} ({{ $d->description }})</td>
                                </tr>
                                    @foreach ($d->criteria as $no => $value)
                                        <tr>
                                            <th class="text-center">{{ $x + 1 }}</th>
                                            <td>{{ $value->content }}</td>
                                            @for ($i = 0; $i < 5; $i++)
                                            <td class="text-center" @if($i==4) style="border-right: 2px solid #000;" @endif>
                                                {{ isset($rekap['kenyataan'][$value->id][$i + 1]) ? $rekap['kenyataan'][$value->id][$i + 1] : 0 }}
                                            </td>
                                            @endfor
                                            @for ($i = 0; $i < 5; $i++)
                                            <td class="text-center">
                                                {{ isset($rekap['harapan'][$value->id][$i +1]) ? $rekap['harapan'][$value->id][$i + 1] : 0 }}
                                            </td>
                                            @endfor
                                        </tr>
                                        @php
                                        $x++; 
                                        @endphp
                                    @endforeach
                                    @php
                                        $x= $x;
                                    @endphp  
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <span class="d-block p-2 bg-primary text-white">Nilai Rata - Rata Gap 5 berdasarkan pertanyaan</span>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th rowspan="2" style="vertical-align : middle;text-align:center;">No</th>
                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Attribut Pertanyaan</th>
                                <th colspan="2">Harapan</th>
                                <th colspan="2">Kenyataan</th>
                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Nilai Gap</th>
                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Keterangan</th>
                            </tr>
                            <tr>
                                <th>Nilai Pembobotan</th>
                                <th>Rata-Rata Harapan</th>
                                <th>Nilai Pembobotan</th>
                                <th>Rata-Rata Kenyataan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($criteria as $key => $item)
                                <tr>
                                    <th>{{ $key+1 }}</th>
                                    <td>{{ $item->content }}</td>
                                    <td class="text-center">{{ $nilai['bobotharapan'][$item->id] }}</td>
                                    <td class="text-center">{{ $nilai['rataharapan'][$item->id] }}</td>
                                    <td class="text-center">{{ $nilai['bobotkenyataan'][$item->id] }}</td>
                                    <td class="text-center">{{ $nilai['ratakenyataan'][$item->id] }}</td>
                                    <td class="text-center">{{ $nilai['ratakenyataan'][$item->id] - $nilai['rataharapan'][$item->id]}}</td>
                                    <td>{{ $keterangan->keterangan($nilai['ratakenyataan'][$item->id] - $nilai['rataharapan'][$item->id]) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <span class="d-block p-2 bg-primary text-white">Nilai Rata - Rata Gap 5 berdasarkan dimensi</span>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th rowspan="2" style="vertical-align : middle;text-align:center;">No</th>
                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Dimensi Pernyataan</th>
                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Attribut Dimensi</th>
                                <th colspan="2">Harapan</th>
                                <th colspan="2">Kenyataan</th>
                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Nilai Gap</th>
                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Keterangan</th>
                            </tr>
                            <tr>
                                <th>Nilai Pembobotan</th>
                                <th>Rata-Rata Harapan</th>
                                <th>Nilai Pembobotan</th>
                                <th>Rata-Rata Kenyataan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dimensi as $key => $item)
                                <tr>
                                    <th>{{ $key+1 }}</th>
                                    <td>{{ $item->name }} ({{ $item->description }})</td>
                                    <td>
                                        @foreach ($item->criteria as $db)
                                            {{$db->id}}
                                        @endforeach
                                    </td>
                                    <td class="text-center">{{ $nilaiDimensi['bobotharapan'][$item->id] }}</td>
                                    <td class="text-center">{{ $nilaiDimensi['rataharapan'][$item->id] }}</td>
                                    <td class="text-center">{{ $nilaiDimensi['bobotkenyataan'][$item->id] }}</td>
                                    <td class="text-center">{{ $nilaiDimensi['ratakenyataan'][$item->id] }}</td>
                                    <td class="text-center">{{ $nilaiDimensi['ratakenyataan'][$item->id] - $nilaiDimensi['rataharapan'][$item->id] }}</td>
                                    <td>{{ $keterangan->keterangan($nilaiDimensi['ratakenyataan'][$item->id] - $nilaiDimensi['rataharapan'][$item->id]) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
   
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    
@endsection