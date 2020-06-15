@extends('layouts.app')

@section('content')
<div class="app-title">
    <div>
        <h1>Dimensi</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active">Dimensi</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambah-dimensi">
            <i class="fa fa-plus"></i> Tambah Dimensi
        </button>
        @if (Session::has('msg'))
            <div class="alert alert-success mb-2">
                {{ Session::get('msg') }}
            </div>
        @endif
        <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode</th>
                                <th>Nama Dimensi</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dimensions as $key => $d)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $d->code }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->description }}</td>
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

<!-- Modal -->
<div class="modal fade" id="tambah-dimensi" tabindex="-1" role="dialog" aria-labelledby="tambah-dimensiLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="tambah-dimensiLabel">Form Tambah Dimensi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
        </button>
    </div>
    <form action="{{ route('dimensi.tambah') }}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label>Kode Dimensi</label>
                <input type="text" name="code" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nama Dimensi</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="description" class="form-control" cols="10" rows="5" required></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    </div>
</div>
</div>
@endsection

@section('script')
    
@endsection