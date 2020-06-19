@php
    $auth = Auth::user();
    $s1 = Request::segment(1);
    $s2 = Request::segment(2);
@endphp
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="index.html">MEGA BANGUNAN</a>
    <!-- Sidebar toggle button-->
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <div class="ml-auto">
        <a href="{{ route('logout') }}" class="btn btn-danger btn-sm mt-2">Logout</a>
    </div>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="text-center">
        <p class="text-white text-bold">{{ Str::upper($auth->username) }}</p>
    </div>
    <ul class="app-menu">
        <li>
            <a @if($s1 == "/" || $s1 == "dashboard") class="app-menu__item active" @else class="app-menu__item" @endif href="{{ url('dashboard') }}">
                <i class="app-menu__icon fa fa-home"></i>
                <span class="app-menu__label">Home</span>
            </a>
        </li>
        @if ($auth->role_id == 1)
        <li>
            <a @if($s1 == "user") class="app-menu__item active" @else class="app-menu__item" @endif href="{{ url('user') }}">
                <i class="app-menu__icon fa fa-user-circle-o"></i>
                <span class="app-menu__label">Managemen User</span>
            </a>
        </li>
        <li>
            <a @if($s1 == "dimensi") class="app-menu__item active" @else class="app-menu__item" @endif href="{{ url('dimensi') }}">
                <i class="app-menu__icon fa fa-book"></i>
                <span class="app-menu__label">Managemen Dimensi</span>
            </a>
        </li>
        <li>
            <a @if($s1 == "pernyataan") class="app-menu__item active" @else class="app-menu__item" @endif href="{{ url('pernyataan') }}">
                <i class="app-menu__icon fa fa-tag"></i>
                <span class="app-menu__label">Managemen Pernyataan</span>
            </a>
        </li>
        <li>
            <a @if($s1 == "responden") class="app-menu__item active" @else class="app-menu__item" @endif href="{{ url('responden') }}">
                <i class="app-menu__icon fa fa-users"></i>
                <span class="app-menu__label">Daftar Responden</span>
            </a>
        </li>
        <li>
            <a @if($s1 == "servqual") class="app-menu__item active" @else class="app-menu__item" @endif href="{{ url('servqual') }}">
                <i class="app-menu__icon fa fa-calculator"></i>
                <span class="app-menu__label">Perhitungan Servqual</span>
            </a>
        </li>
        @endif
    </ul>
</aside>