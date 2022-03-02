<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>FoodGardan</title>
    <!-- loader-->
    <link href="{{asset('admin/assets/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset('admin/assets/js/pace.min.js')}}"></script>
    <!--favicon-->
    <link rel="icon" href="{{asset('admin/assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- Vector CSS -->
    <link href="{{asset('admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <!-- simplebar CSS-->
    <link href="{{asset('admin/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{asset('admin/assets/css/animate.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{asset('admin/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <!-- Custom Style-->
    <link href="{{asset('admin/assets/css/app-style.css')}}" rel="stylesheet" />
    <!-- Sidebar CSS-->
    <link href="{{asset('admin/assets/css/sidebar-menu.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    @stack('css')
</head>
<body class="bg-theme bg-theme1">
    
    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <!-- end loader -->
    @include('admin.layouts.header')
    @include('admin.layouts.menubar')

    @yield('content')
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
    <!-- simplebar js -->
    <script src="{{asset('admin/assets/plugins/simplebar/js/simplebar.js')}}"></script>
    <!-- sidebar-menu js-->
    <script src="{{asset('admin/assets/js/sidebar-menu.js')}}"></script>
    <!-- loader scripts -->
    <script src="{{asset('admin/assets/js/jquery.loading-indicator.js')}}"></script>
    <!-- Custom scripts -->
    <script src="{{asset('admin/assets/js/app-script.js')}}"></script>
    <!-- Chart js -->
    <script src="{{asset('assets/plugins/Chart.js/Chart.min.js')}}"></script>
    <!-- Index js -->
    <script src="{{asset('assets/js/index.js')}}"></script>

</body>
@stack('scripts')
@include('admin.layouts.footer')

</html>