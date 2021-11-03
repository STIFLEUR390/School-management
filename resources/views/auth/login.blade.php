<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

    <title>{{ env('APP_NAME') }} - @lang('Log in') </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">

</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url({{ asset('backend/images/auth-bg/bg-1.jpg') }})">

<div class="container h-p100">
    <div class="row align-items-center justify-content-md-center h-p100">

        <div class="col-12">
            <div class="row justify-content-center no-gutters">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="bg-white rounded30 shadow-lg">
                        <div class="content-top-agile p-20 pb-0">
                            <h2 class="text-primary">Let's Get Started</h2>
                            <p class="mb-0">Sign in to continue to WebkitX.</p>
                        </div>
                        <div class="p-40">

                            <!-- Session Status -->
                            <x-auth.session-status :status="session('status')" />
                            <!-- Validation Errors -->
                            <x-auth.validation-errors :errors="$errors" />

                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <x-auth.input-email />

                                <x-auth.input-password />
                                <div class="row">
                                    <div class="col-6">
                                        <div class="checkbox">
                                            <input type="checkbox" id="remember_me" name="remember" >
                                            <label for="remember_me">@lang('Remember Me')</label>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    @if(Route::has('password.request'))
                                        <div class="col-6">
                                            <div class="fog-pwd text-right">
                                                <a href="{{ route('password.request') }}" class="hover-warning"><i class="ion ion-locked"></i>@lang('Forgot your password?')</a><br>
                                            </div>
                                        </div>
                                    @endif
                                    <!-- /.col -->
                                    <x-auth.submit title="Login" />
                                    <!-- /.col -->
                                </div>
                            </form>

                            <div class="text-center">
                                <p class="mt-15 mb-0">@lang("Not registered?")
                                    <a href="{{ route('register') }}" class="text-warning ml-5">@lang('Sign Up')</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="mt-20 text-white">- @lang('Sign With') -</p>
                        <p class="gap-items-2 mb-20">
                            <a class="btn btn-social-icon btn-round btn-facebook" href="#"><i class="fa fa-facebook"></i></a>
                            <a class="btn btn-social-icon btn-round btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
                            <a class="btn btn-social-icon btn-round btn-instagram" href="#"><i class="fa fa-instagram"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Vendor JS -->
<script src="{{ asset('backend/js/vendors.min.js') }}"></script>
<script src="{{ asset('backend/js/pages/chat-popup.js') }}"></script>
<script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>

</body>
</html>
