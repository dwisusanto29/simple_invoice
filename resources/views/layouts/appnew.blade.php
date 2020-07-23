<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>INVOICE</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet"
          href="{{ asset('bower_components/admin-lte/plugins/datepicker/libraries/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/dist/css/adminlte.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet"
          href="{{ asset('bower_components/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/toastr/toastr.min.css')}}">
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- Google Font: Source Sans Pro -->
    {{--
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700')}}" rel="stylesheet">
    --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins|Roboto|Sriracha&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/summernote/summernote-lite.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet"
          href="{{ asset('bower_components/admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet"
          href="{{ asset('bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <!-- Navbar -->
    @include('layouts.navbar')

<!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-danger elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="{{ asset('bower_components/admin-lte/dist/img/AdminLTELogo.png')}}"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">INVOICE</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('bower_components/admin-lte/dist/img/user2-160x160.jpg')}}"
                         class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    
                </div>
            </div>

                @include('layouts.menu')
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

   
    @yield('content')

    <footer class="main-footer">
        <strong>Copyright &copy; 2020 <a href="#">SISFOIS</a>.</strong>
        All rights reserved.
    </footer>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
</div>

<!-- jQuery -->
<script src="{{ asset('bower_components/admin-lte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('bower_components/admin-lte/plugins/cleave.js-master/cleave.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('bower_components/admin-lte/dist/js/adminlte.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('bower_components/admin-lte/plugins/summernote/summernote-lite.js')}}"></script>
<script src="{{ asset('bower_components/admin-lte/plugins/datepicker/libraries/moment/moment.min.js')}}"></script>
<script
    src="{{ asset('bower_components/admin-lte/plugins/datepicker/libraries/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{ asset('bower_components/admin-lte/plugins/datepicker/js/custom.js')}}"></script>
<script src="{{ asset('bower_components/admin-lte/plugins/toastr/toastr.min.js') }}"></script>
<script
    src="{{ asset('bower_components/admin-lte/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<!-- Select2 -->
<script src="{{ asset('bower_components/admin-lte/plugins/select2/js/select2.full.min.js')}}"></script>

</body>
</html>

