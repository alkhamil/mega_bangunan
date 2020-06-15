@extends('layouts.app')

@section('content')
<div class="app-title">
    <div>
        <h1>User</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active">User</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambah-user">
            <i class="fa fa-plus"></i> Tambah User
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
                                <th>Username</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $u)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $u->username }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>
                                        @php
                                            $role_name = \App\Role::where('id',$u->role_id)->first()->name;
                                        @endphp
                                        <div class="badge badge-info">{{ $role_name }}</div>
                                    </td>
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
<div class="modal fade" id="tambah-user" tabindex="-1" role="dialog" aria-labelledby="tambah-userLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="tambah-userLabel">Form Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
        </button>
    </div>
    <form action="{{ route('user.tambah') }}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Level</label>
                <select name="role_id" id="select2" style="width: 100%" class="form-control">
                    @foreach ($roles as $r)
                        <option value="{{ $r->id }}">{{ Str::upper($r->name) }}</option>
                    @endforeach
                </select>
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