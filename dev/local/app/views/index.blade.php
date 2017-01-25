<html>
<head>

    <!-- this is for the website icon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-icon.ico') }}">

    <title>@yield('title')</title>

    <link href="{{ asset('assets/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- datepicker core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/daterangepicker.css') }}">



    <!-- my custom style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/unick_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/unick_library/input_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/unick_helptip.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/unick_library/loader.css') }}">

    <!-- datatables plugin css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.responsive.css') }}">


    @yield('css')
</head>
<body>
<header class="container">
    <div id="menu" class="navbar navbar-default navbar-fixed-top">
        <a href="{{ route('login') }}"><img src="{{ asset('assets/images/logo.png') }}" style="width:50px; margin:10px;"></a>
    </div>
</header>
<?php $message = 'im converted to blade!'; ?>
 {{  $message  }}
<!-- end of code -->
@yield('content')

</body>
        <!-- jQuery -->
<script type="text/javascript" src="{{ asset('assets/js/jquery-2.0.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>

<!-- bootstrap javascript -->
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- js datepicker picker -->
<script src="{{ asset('assets/js/moment.js') }}"></script>
<script src="{{ asset('assets/js/daterangepicker.js') }}"></script>

<!-- datatable plugin js -->
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/dataTables.responsive.js') }}"></script>
<!-- custom js -->
<script type="text/javascript" src="{{ asset('assets/js/loader.js') }}"></script>
<!-- for the charts js -->
<script type="text/javascript" src="{{ asset('assets/js/raphael-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/morris-0.4.1.min.js') }}"></script>
@yield('script')

</html>