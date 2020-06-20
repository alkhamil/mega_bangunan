@extends('layouts.navbarhome')

@section('content')
<div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <p class="text-center">
                  Pelanggan yang terhormat, <br>
                  Terimakasih atas waktu yang telah diluangkan untuk melengkapi survey yang kami sediakan. <br>
                  Pendapat anda sangat berarti bagi kami untuk meningkatkan pelayanan.
                </p>
                <div class="text-center">
                  <img src="{{ url('assets/images/logo.png') }}" class="img-fluid" width="100" alt="">
                </div>
                <p class="text-center">
                  <br> Hormat kami, <br><br>
                  Management <br> 
                  Kuningan Mega Bangunan
                </p>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection