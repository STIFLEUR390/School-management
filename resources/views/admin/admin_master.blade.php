<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

    <title>{{ env('APP_NAME') }} - Dashboard</title>

    <!-- Vendors Style-->
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">
    <style>
        .colored-toast.swal2-icon-success {
            background-color: #04A08B !important;
        }

        .colored-toast.swal2-icon-error {
            background-color: #FF562F !important;
        }

        .colored-toast.swal2-icon-warning {
            background-color: #FF9920 !important;
        }

        .colored-toast.swal2-icon-info {
            background-color: #00BAFF !important;
        }

        .colored-toast.swal2-icon-question {
            background-color: #87ADBD !important;
        }

        .colored-toast .swal2-title {
            color: #D7E5FF;
        }

        .colored-toast .swal2-close {
            color: #D7E5FF;
        }

        .colored-toast .swal2-html-container {
            color: #D7E5FF;
        }

        .swal2-loader, .swal2-x-mark{
            background-color: #D7E5FF;
        }
    </style>
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('js/toastr/toastr.css') }}" />--}}

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

@include('sweetalert::alert')
{{--@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])--}}

<!-- Vendor JS -->
{{--<script src="{{ asset('js/sweetalert/sweetalert2@9.js') }}"></script>--}}
<script src="{{ asset('backend/js/vendors.min.js') }}"></script>
<script src="{{ asset('backend/js/pages/chat-popup.js') }}"></script>
<script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>

{{--<script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>--}}

<script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('backend/js/pages/data-table.js') }}"></script>

@yield('scripts')
<!-- EduAdmin App -->
<script src="{{ asset('backend/js/template.js') }}"></script>
<script src="{{ asset('backend/js/pages/dashboard2.js') }}"></script>

<!-- Notification de l'application -->

<script src="{{ asset('assets/vendor_components/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js') }}"></script>



<script src="{{ asset('assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js') }}">
<script src="{{ asset('backend/js/pages/notification.js') }}"></script>

<script>
        @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            $.toast({
                heading: "{{ env('APP_NAME') }}",
                text: " {{ Session::get('message') }} ",
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'info',
                hideAfter: 10000,
                stack: 6
            });
            break;

        case 'success':
            $.toast({
                heading: "{{ env('APP_NAME') }}",
                text: " {{ Session::get('message') }} ",
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 10000,
                stack: 6
            });
            break;

        case 'warning':
            $.toast({
                heading: "{{ env('APP_NAME') }}",
                text: " {{ Session::get('message') }} ",
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'warning',
                hideAfter: 10000,
                stack: 6
            });
            break;

        case 'error':
            $.toast({
                heading: "{{ env('APP_NAME') }}",
                text: " {{ Session::get('message') }} ",
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'error',
                hideAfter: 10000

            });
            break;
    }
    @endif
</script>
</body>
</html>
