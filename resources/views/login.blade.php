<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Kuningan Mega Bangunan</title>
</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    @if (Session::has('msg'))
        <div class="alert alert-danger" style="border-radius: 0%">
            {{ Session::get('msg') }}
        </div>
    @endif
    <section class="login-content">
        <div class="text-center text-white mb-4">
            <h1>KUNINGAN MEGA BANGUNAN</h1>
        </div>
        <div class="login-box">
            <form class="login-form" action="{{ route('login.proses') }}" method="POST">
                @csrf
                <h3 class="login-head">LOGO</h3>
                <div class="form-group">
                    <label class="control-label">USERNAME</label>
                    <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" placeholder="Username" autofocus>
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">PASSWORD</label>
                    <input class="form-control @error('username') is-invalid @enderror" type="password" name="password" placeholder="Password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group btn-container">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
                </div>
            </form>
        </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="{{ url('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/main.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ url('assets/js/plugins/pace.min.js') }}"></script>
    <script type="text/javascript">
        // Login Page Flipbox control
        $('.login-content [data-toggle="flip"]').click(function() {
            $('.login-box').toggleClass('flipped');
            return false;
        });
    </script>
</body>

</html>