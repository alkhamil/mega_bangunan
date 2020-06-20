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
<div class="row mt-2">
    <div class="col-md-12">
        <h5 class="bg-success p-2 text-white">Grafik GAP Berdasarkan Pernyataan</h5>
        <div>
            <canvas id="myChart" width="400" height=200"></canvas>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <hr>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-12">
        <h5 class="bg-success p-2 text-white">Grafik GAP Berdasarkan Dimensi</h5>
        <div>
            <canvas id="myDimensi" width="400" height=200"></canvas>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var url = "{{url('laporan/chart')}}";
    var url2 = "{{url('laporan/chartDimensi')}}";
    var ctx = document.getElementById('myChart').getContext('2d');
    var ctx2 = document.getElementById('myDimensi').getContext('2d');
    var Labels = new Array();
    var Labels2 = new Array();
    var Datas = new Array();
    var Datas2 = new Array();
    var Ket = new Array();
    var color = new Array();
    var color2 = new Array();

    $.get(url, function(response){
        // console.log(response.)
        response.forEach(function(data){
            Labels.push(data.id)
            Datas.push(data.nilai)
            color.push('rgba(' + colorGen () +', ' + colorGen () +',' + colorGen () +' )')
        });
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Labels,
                datasets: [{
                    label: [],
                    data: Datas,
                    backgroundColor: color,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        function colorGen () { 
            var generateColor = Math.floor(Math.random() * 256 );
            return generateColor;
        }
    });

    $.get(url2, function(response){
        // console.log(response);
        response.forEach(function(data){
            Labels2.push(data.name)
            Datas2.push(data.nilai)
            color2.push('rgba(' + colorGen () +', ' + colorGen () +',' + colorGen () +' )')
        });
        var myChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: Labels2,
                datasets: [{
                    label: [],
                    data: Datas2,
                    backgroundColor: color2,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        function colorGen () { 
            var generateColor = Math.floor(Math.random() * 256 );
            return generateColor;
        }
    });
   
</script>
@endsection