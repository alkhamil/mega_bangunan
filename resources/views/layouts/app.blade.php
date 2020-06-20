<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kuningan Mega Bangunan</title>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini">
    @include('layouts.navbar')
    <main class="app-content">
        @yield('content')
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="{{ url('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    
    <!-- The javascript plugin to display page loading on top-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="{{ url('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/gijgo/gijgo.min.js') }}" type="text/javascript"></script>
    <link href="{{ url('assets/js/plugins/gijgo/gijgo.min.css') }}" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        $('#sampleTable').DataTable();
        $('#select2').select2();
    </script>
    <script src="{{ url('assets/js/plugins/pace.min.js') }}"></script>
    <script src="{{ url('assets/js/moment.min.js') }}"></script>
    <!-- Page specific javascripts-->
    @yield('script')

    <script>
        $(document).ready(function() {
        var interval = setInterval(function() {
            var momentNow = moment();
            var dateTime = momentNow.format('DD MMMM YYYY')+' '+momentNow.format('hh:mm:ss');
                $('#datetime').html(dateTime);
            }, 100);
        });
    </script>
</body>

</html>