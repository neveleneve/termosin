<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="shortcut icon" href="{{url('images/termosin.png')}}" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="{{url('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <link type="text/css" rel="stylesheet"
        href="{{url('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('admin/plugins/jqvmap/jqvmap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('admin/dist/css/adminlte.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('admin/plugins/daterangepicker/daterangepicker.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('admin/plugins/summernote/summernote-bs4.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('template/nav/adminnav')
        @include('template/nav/adminside')
        @yield('content')
    </div>
    <script src="{{url('admin/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{url('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('admin/plugins/chart.js/Chart.min.js')}}"></script>
    <script src="{{url('admin/plugins/sparklines/sparkline.js')}}"></script>
    <script src="{{url('admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <script src="{{url('admin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{url('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{url('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{url('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{url('admin/dist/js/adminlte.js')}}"></script>
    @yield('customjs')
</body>

</html>