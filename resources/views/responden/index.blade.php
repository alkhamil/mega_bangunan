@extends('layouts.app')

@section('content')
<div class="app-title">
    <div>
        <h1>Responden</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active">Responden</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('responden.cari') }}" method="GET">
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
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Responden</th>
                                <th>Tanggal Isi Survei</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($respondens as $key => $r)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $r->nama }}</td>
                                    <td>{{ date('d M Y H:i:s', strtotime($r->created_at)) }}</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    </td>
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
<script>
    $('#dari').datepicker({
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        format: 'dd mmm yyyy', 
        maxDate: function () {
            return $('#sampai').val();
        }
    });
    $('#sampai').datepicker({
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        format: 'dd mmm yyyy', 
        minDate: function () {
            return $('#dari').val();
        }
    });
</script>
@endsection