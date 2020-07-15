@extends('layouts.app')

@section('content')
<div class="app-title">
    <div>
        <h1>Rekapitulaasi</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active">Rekapitulasi</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('laporan.rekapitulasiCari') }}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Dari</label>
                                <input type="text" id="dari" name="dari" @isset($qDari) @if ($qDari !== null) value="{{ $qDari }}" @endif @endisset class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Sampai</label>
                                <input type="text" id="sampai" name="sampai" @isset($qSampai) @if ($qSampai !== null) value="{{ $qSampai }}" @endif @endisset class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i> Cari
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
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
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('#dari').datepicker({
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        format: 'dd mmm yyyy', 
        
        });
        $('#sampai').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            format: 'dd mmm yyyy', 
            
        });
    </script>
@endsection