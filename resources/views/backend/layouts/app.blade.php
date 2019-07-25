<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Penny Insurance') }} | </title>

    <!-- Bootstrap -->
    <link href="{{ asset('backend/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('backend/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('backend/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('backend/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

@stack('css')

    <!-- Custom Theme Style -->
    <link href="{{ asset('backend/css/custom.min.css') }}" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
    @include('backend.layouts.partials.leftsidebar')

    <!-- top navigation -->
    @include('backend.layouts.partials.topnav')
    <!-- /top navigation -->

        <!-- page content -->
    @yield('content')
    <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Penny Insurance - Developed by <a href="https://ferdousanam.com">Ferdous Anam</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('backend/vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('backend/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('backend/vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('backend/vendors/nprogress/nprogress.js') }}"></script>
<!-- morris.js -->
<script src="{{ asset('backend/vendors/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('backend/vendors/morris.js/morris.min.js') }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('backend/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('backend/vendors/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('backend/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

@stack('scripts')

<!-- Custom Theme Scripts -->
<script src="{{ asset('backend/js/custom.min.js') }}"></script>

</body>
</html>
