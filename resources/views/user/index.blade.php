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
                                        <button data-toggle="modal" data-target="#edit-user{{ $u->id }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <button @if(Auth::user()->id == $u->id) disabled style="cursor:not-allowed" @endif data-toggle="modal" data-target="#hapus-user{{ $u->id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                                
                                <!-- Modal Edit -->
                                <div class="modal fade" id="edit-user{{ $u->id }}" tabindex="-1" role="dialog" aria-labelledby="tambah-userLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title" id="tambah-userLabel">Form Edit User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="text-white">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('user.edit') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="user_id" value="{{ $u->id }}">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" value="{{ $u->username }}" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" value="{{ $u->email }}" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control">
                                                <span class="text-info">Lewati jika tidak perlu</span>
                                            </div>
                                            <div class="form-group">
                                                <label>Level</label>
                                                <select name="role_id" id="select2" style="width: 100%" class="form-control">
                                                    @foreach ($roles as $r)
                                                        <option value="{{ $r->id }}" @if($r->id == $u->role_id) selected @endif >{{ Str::upper($r->name) }}</option>
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

                                <!-- Modal hapus -->
                                <div class="modal fade" id="hapus-user{{ $u->id }}" tabindex="-1" role="dialog" aria-labelledby="tambah-userLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="tambah-userLabel">Hapus User <span class="text-danger">{{ $u->username }}</span></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="text-white">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Apakah anda yakin ingin <br> menghapus data ini ?</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="{{ route('user.hapus', $u->id) }}" class="btn btn-primary">Hapus</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add -->
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