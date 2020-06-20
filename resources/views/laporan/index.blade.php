@extends('layouts.app')

@section('content')
<style>
    
</style>
<div class="app-title">
    <div>
        <h1>Laporan</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active">Laporan</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <section id="tabs" class="project-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><b>Gap Per Pernyataan</b></a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><b>Gap Per Dimensi</b></a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <br>
                                    <a href="{{ url('laporan/cetakPernyataan') }}" target="_blank"><button class="btn btn-success mb-2"><i class="fa fa-print"></i> Cetak</button></a>
                                    <span class="d-block p-2 mb-2 bg-primary text-white">Nilai Rata - Rata Gap 5 berdasarkan peryataan</span>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Attribut Pernyataan</th>
                                                    <th>Dimensi</th>
                                                    <th>Nilai Gap 5</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @foreach ($criteria as $key => $item)
                                                @php
                                                    // $k[] = $item->id;
                                                    $gap = $nilai['ratakenyataan'][$item->id] - $nilai['rataharapan'][$item->id];  
                                                @endphp
                                                    <tr>
                                                        <th>{{ $key+1 }}</th>
                                                        <td>{{ $item->content }}</td>
                                                        <td>{{ $item->dimensi->name }}</td>
                                                        <td class="text-center">{{ $gap }}</td>
                                                        <td>{{ $keterangan->keterangan($gap) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <h3 class="title-head mt-5">Grafik GAP Berdasarkan Pernyataan</h3>
                                    <div>
                                        <canvas id="myChart" width="400" height=200"></canvas>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <br>
                                    <a href="{{ url('laporan/cetakDimensi') }}" target="_blank"><button class="btn btn-success mb-2"><i class="fa fa-print"></i> Cetak</button></a>
                                    <span class="d-block p-2 mb-2 bg-primary text-white">Nilai Rata - Rata Gap 5 berdasarkan dimensi</span>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                   <th>No</th>
                                                   <th>Dimensi</th>
                                                   <th>Nilai Gap 5</th>
                                                   <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dimensi as $key => $item)
                                                    <tr>
                                                        <th class="text-center">{{ $key+1 }}</th>
                                                        <td>{{ $item->name }} ({{ $item->description }})</td>
                                                        <td class="text-center">{{ $nilaiDimensi['ratakenyataan'][$item->id] - $nilaiDimensi['rataharapan'][$item->id] }}</td>
                                                        <td>{{ $keterangan->keterangan($nilaiDimensi['ratakenyataan'][$item->id] - $nilaiDimensi['rataharapan'][$item->id]) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <h3 class="title-head mt-5">Grafik GAP Berdasarkan Dimensi</h3>
                                    <div>
                                        <canvas id="myDimensi" width="400" height=200"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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