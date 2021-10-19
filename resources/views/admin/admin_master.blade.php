<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

    <title>Easy School Managment System - Dashboard</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

<div class="wrapper">
    <div id="loader"></div>

    @include('admin.body.hearder')

    @include('admin.body.sidebar')

    <!-- Content Wrapper. Contains page content -->
    @yield('admin')
    <!-- /.content-wrapper -->
    @include('admin.body.footer')

    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- Page Content overlay -->


<!-- Vendor JS -->
<script src="{{ asset('backend/js/vendors.min.js') }}"></script>
<script src="{{ asset('backend/js/pages/chat-popup.js') }}"></script>
<script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>

<script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
<script src="{{ asset('assets/vendor_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendor_components/fullcalendar/fullcalendar.js') }}"></script>

<!-- EduAdmin App -->
<script src="{{ asset('backend/js/template.js') }}"></script>
<script src="{{ asset('backend/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('backend/js/pages/calendar.js') }}"></script>

</body>
</html>
