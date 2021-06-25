@extends('user.master')
@section('title','Forgot password')
@section('content')
    <section class="login-page">
        <div class="row no-gutters">
            <div class="col-md-6">
                <div class="login-splash">
                    <div class="login-logo">
                        <a href="{{ route('home') }}" class="navbar-brand">
                            <img src="{{ asset('front/images/logo.svg') }}" alt=""/>
                        </a>
                    </div>
                    <div class="splash-image">
                        <img height="460" src="{{ asset('front/images/otp-hero.svg') }}" alt=""/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <img class="cross-icons" src="{{ asset('front/images/forgot-password.svg') }}" alt="">

                </div>
                <div class="row no-gutters">
                    <div class="col-lg-6 m-auto">
                        @include('user.notification')
                        <form action="{{ route('user.forgot-password.post') }}" method="post">
                            @csrf
                            <div class="center-container text-left">
                                <h3 class="mb-3">Forgot password?</h3>
                                <p class="text-grey pt-0 mb-4"> Don’t worry, just enter the email address you
                                    registered with and we will send you a link to reset your password.</p>
                                <div class="form-group">
                                    <label class="form-label text-grey">Email Address</label>
                                    <input type="email" name="email"
                                           class="form-control  @error('email') is-invalid @enderror"
                                           placeholder="Email address" required/>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="text-center mt-5">
                                    <button type="submit"
                                            class="btn btn-primary text-center text-uppercase btn-block">Send
                                        password reset link
                                    </button>
                                </div>

                                <div class="mt-10">
                                    <p class="sign-in-text">
                                        Remembered your password?
                                        <a href="{{ route('user.login') }}" class="">Login</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
