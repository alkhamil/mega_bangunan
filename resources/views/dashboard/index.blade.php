@extends('layouts.app') @section('content')
<div class="app-title">
    <div>
        <h1>Dashboard</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-user fa-3x"></i>
            <div class="info">
                <h4>Users</h4>
                <p><b>{{ $users }}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
                <h4>Responden</h4>
                <p><b>{{ $respondens }}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-book fa-3x"></i>
            <div class="info">
                <h4>Dimensi</h4>
                <p><b>{{ $dimensions }}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-tag fa-3x"></i>
            <div class="info">
                <h4>Pernyataan</h4>
                <p><b>{{ $criterias }}</b></p>
            </div>
        </div>
    </div>
</div>
@endsection