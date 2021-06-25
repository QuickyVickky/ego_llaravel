<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/authentication/form-2.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/forms/switches.css')}}">

    <link rel="icon" href="{{ asset('/favicon.png') }}" type="image/png">
    <title>Forgot Password | EgoGram</title>
</head>
<body class="form no-image-content">

<div class="form-container outer">
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">

                    <h1 class="">Password Recovery</h1>
                    <p class="signup-link recovery">Enter your email and instructions will sent to you!</p>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    <form class="text-left" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form">
                            <div id="email-field" class="field-wrapper input">
                                <div class="d-flex justify-content-between">
                                    <label for="email">EMAIL</label>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>

                            <div class="d-sm-flex justify-content-between">

                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" value="">Reset</button>
                                </div>
                            </div>

                        </div>
                        <div class="division">
                            <p class="signup-link register">If you have already password? <a href="{{ route('login') }}">Log in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<div class="login-box">--}}
{{--    <div class="login-logo">--}}
{{--        <a href="{{ route('dashboard') }}"><b>Technomads</b> Ecommerce</a>--}}
{{--    </div>--}}
{{--    <!-- /.login-logo -->--}}
{{--    <div class="card">--}}
{{--        <div class="card-body login-card-body">--}}
{{--            <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>--}}
{{--            @if (session('status'))--}}
{{--                <div class="alert alert-success" role="alert">--}}
{{--                    {{ session('status') }}--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            <form method="POST" action="{{ route('password.email') }}">--}}
{{--                @csrf--}}

{{--                <div class="form-group row">--}}
{{--                    <div class="col-12">--}}
{{--                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"--}}
{{--                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">--}}

{{--                        @error('email')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $message }}</strong>--}}
{{--                        </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="form-group row mb-0">--}}
{{--                    <div class="col-12">--}}
{{--                        <button type="submit" class="btn btn-primary btn-block">--}}
{{--                            {{ __('Send Password Reset Link') }}--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}

{{--            <p class="mt-3 mb-1">--}}
{{--                <a class="btn btn-link" href="{{ route('login') }}">Login</a>--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        <!-- /.login-card-body -->--}}
{{--    </div>--}}
{{--</div>--}}

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('admin/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('admin/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('admin/assets/js/authentication/form-2.js') }}"></script>

</body>
</html>

