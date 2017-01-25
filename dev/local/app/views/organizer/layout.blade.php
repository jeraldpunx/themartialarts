<html>
<head>

    <!-- this is for the website icon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-icon.ico') }}">

    <title>{{ $page_title }}</title>

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
        <div class="navbar-header">
            <div class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <i class="fa fa-navicon" style="font-size:20px;"></i>
            </div>

            <div class="logo">
                <ul class="logo-option">
                    <li id="sample_alert">The Martial Arts University</li>
                    <li class="user-options">
                        <div><p class="fa-tasks fa"></p></div>
                        <input type="radio" name="user-option-anchor" style="position: absolute; width: 60px;height: 60px;top: 0px;right: 0px; opacity: 0; cursor:pointer;">
                        <input type="radio" class="anchor-user-options" checked="" name="user-option-anchor">
                        <p class="anchor-icon fa-arrow-right fa"></p>
                        <div class="user-option-div">
                            <div class="user-option-header">User Options</div>
                            <ul>
                                <li>
                                    <a href="{{ URL::to('org/schools') }}">
                                        <img src="{{ asset('assets/images/school_icon.png') }}">
                                        Schools
                                    </a>
                                </li>

                                <li>
                                    <a href="{{URL::to('org/styles') }}">
                                        <img src="{{ asset('assets/images/student_icon.png') }}">
                                        Organization Styles
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('logout') }}">
                                        <p class="fa-sign-out fa" style="font-size:20px;"></p>
                                        Log-out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <li class="nav"><a href="#">Dashboard</a>
                </li>
            </ul>
        </div>
    </div>
</header>

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