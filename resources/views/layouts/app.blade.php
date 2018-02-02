<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>JOB App | Dashboard</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('css/bootstrap/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('css/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Toastr CSS -->
    <link href="{{ asset('css/toastr/toastr.min.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('css/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('css/dash/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dash/theme-cyan.css') }}" rel="stylesheet">

    <!-- Datatable Css -->
    <link href="{{asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- icheck checkboxes -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck/square/yellow.css') }}">
    
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
</head>

<body class="theme-cyan">
    <!-- Page Loader -->
    @if(! (\Request::is('/','login','register','password/reset')) )
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
    @endif
    <!-- #END# Page Loader -->

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Navbar -->
    @include('layouts.navbar')
    <!-- #navbar -->

    <!-- Sidebar -->
    @if(! (\Request::is('/','login','register','password/reset')) )
        @include('layouts.sidebar')
    @else
    
    @endif
    <!-- #sidebar -->
    @if(\Request::is('/','login','register','password/reset'))
        @yield('content')
    @else
    <section class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>
    @endif

    <!-- Jquery Core Js -->
    <script src="{{asset('js/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('js/bootstrap/bootstrap.js')}}"></script>

    <!-- Datatable js -->
    <script src="{{asset('plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('js/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('js/node-waves/waves.js')}}"></script>

    <!-- Toastr Plugin Js -->
    <script src="{{asset('js/toastr/toastr.min.js')}}"></script>

    <!-- icheck checkboxes -->
    <script type="text/javascript" src="{{ asset('plugins/icheck/icheck.min.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{asset('js/admin.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{asset('js/demo.js')}}"></script>
</body>


</html>