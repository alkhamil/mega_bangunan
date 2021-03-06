@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Survey Kepuasan Pelanggan</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('survey.create') }}" method="POST">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label for="nama" class="col-md-5 col-form-label">Nama Pelanggan</label>
                                <div class="col-md-7">
                                    <input type="text" id="nama" name="nama" class="form-control"  placeholder="Nama Pelanggan" required>
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="alamat" class="col-md-5 col-form-label">Alamat</label>
                                <div class="col-md-7">
                                    <textarea name="alamat" id="alamat" name="alamat" class="form-control" required></textarea>
                                </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hp" class="col-md-5 col-form-label">No telpon</label>
                                    <div class="col-md-7">
                                        <input type="number" id="hp" name="hp" class="form-control"  placeholder="Nomot telpon" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal" class="col-md-5 col-form-label">Tanggal</label>
                                    <div class="col-md-7">
                                    <input type="text" id="tanggal" name="tanggal" class="form-control" value="{{ date('d-m-Y') }}" placeholder="Tanggal" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="pb-2 mt-2 mb-2">
                                    <span class="badge badge-info">1</span> <small class="">Tidak Puas</small>
                                    <span class="badge badge-info">2</span> <small class="">Kurang Puas</small>
                                    <span class="badge badge-info">3</span> <small class="">Cukup Puas</small>
                                    <span class="badge badge-info">4</span> <small class="">Puas</small>
                                    <span class="badge badge-info">5</span> <small class="">Sangat Puas</small>
                                </div>
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
                                            @foreach ($dimensions as $key => $d)
                                                <tr>
                                                    <td class="bg-dark text-white" colspan="12">Dimensi {{ $d->name }} ({{ $d->description }})</td>
                                                </tr>
                                                    @foreach ($d->criteria as $no => $value)
                                                        <tr>
                                                            <th class="text-center">{{ $x + 1 }}</th>
                                                            <td>{{ $value->content }}</td>
                                                            @for ($i = 0; $i < 5; $i++)
                                                            <td class="text-center" @if($i==4) style="border-right: 2px solid #000;" @endif><input style="cursor: pointer" name="k[{{$value->id}}]" type="radio" value="{{ $i + 1 }}" required></td>
                                                            @endfor
                                                            @for ($i = 0; $i < 5; $i++)
                                                            <td class="text-center"><input style="cursor: pointer" name="h[{{$value->id}}]" type="radio" value="{{ $i + 1 }}" @if($i==3) checked @else disabled @endif ></td>
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
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="komentar">Komentar / Saran</label>
                                    <textarea name="saran" class="form-control" placeholder="Tulis komentar dan saran..." rows="5" required></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">
                                        Kirim
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection