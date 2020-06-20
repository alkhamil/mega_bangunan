@extends('layouts.app')

@section('content')
<div class="app-title">
    <div>
        <h1>Hasil Survei Dari <b><u>{{ $responden->nama }}</u></b></h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active">Perhitungan Servqual</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="{{ url('responden') }}" class="btn btn-primary btn-sm mb-2">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
        <div class="tile">
            <div class="tile-body">
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
                                    <td class="text-center">{{ $nilai['ratakenyataan'][$item->id] - $nilai['rataharapan'][$item->id] }}</td>
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
                                    <td class="text-center">{{ $nilaiDimensi['ratakenyataan'][$item->id] - $nilaiDimensi['rataharapan'][$item->id]}}</td>
                                    <td>{{ $keterangan->keterangan( $nilaiDimensi['ratakenyataan'][$item->id] - $nilaiDimensi['rataharapan'][$item->id]) }}</td>
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