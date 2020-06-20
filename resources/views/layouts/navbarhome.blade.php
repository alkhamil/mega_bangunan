@php
    $uri = Request::segment(1);
@endphp
<head>
    <title>Kuningan Mega Bangunan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="{{ url('/') }}">Kuningan Mega Bangunan</a>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link @if($uri == "profile") text-warning @else text-white @endif" href="{{ url('profile') }}">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if($uri == "contact") text-warning @else text-white @endif" href="{{ url('contact') }}">Contact</a>
          </li>
          <li class="nav-item">
              <a class="nav-link @if($uri == "about") text-warning @else text-white @endif" href="{{ url('about') }}">About</a>
          </li>
          <li class="nav-item">
              <a class="nav-link @if($uri == "survey") text-warning @else text-white @endif" href="{{ url('survey')}}">Survey</a>
          </li>
          <li>
              <a class="ml-3" href="{{ url('login') }}"><button class="btn btn-success">Login</button></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <body>
      @yield('content')
  </body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>