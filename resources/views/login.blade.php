@extends('user.master')
@section('title','Login')
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
                    <img height="300" src="{{ asset('front/images/signup_girls.svg') }}" alt=""/>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <p class="text-right sign-in-text ">New to Egogram?
                    <strong><a href="{{ route('user.registration') }}" class="">Sign Up</a></strong>
                    <a href="{{ url('/') }}"><img src="{{ asset('front/images/cross.svg') }}" class="ml-2" height="30"></a>
                </p>
            </div>
            <div class="row no-gutters">
                <div class="col-md-6 m-auto">
                    <div class="center-container text-left ">
                        <h3 class="mb-4">Welcome back</h3>
                        <form class="form-signin" {{ route('user.login.post') }} method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    @include('user.notification')
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label text-grey" for="inputEmail">Email address</label>
                                        <input name="email" type="email" id="inputEmail" class="form-control  @error('email') is-invalid @enderror" placeholder="Email address" required />
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label text-grey" for="inputPassword">Password</label>
                                        <input name="password" type="password" id="inputPassword" class="form-control  @error('password') is-invalid @enderror" placeholder="Password" required/>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 ">
                                    <a href="{{ route('user.forgot-password') }}" class="">Forgot password?</a>
                                </div>
                                <div class="col-sm-12 mt-3 mb-4">
                                    <button class="btn btn-primary btn-block" type="submit">SIGN IN</button>
                                </div>
                            </div>
                        </form>
                        <p class="text-center text-grey mt-5 mb-3">
                            -----Or Continue with-----
                        </p>

                        <div class="social-icon-image">
                            {{-- <a href="/redirect" class="btn btn-primary">
                                <img class="social-icons" src="{{ asset('front/images/ic_fb.svg')}}" alt="">
                            </a> --}}
                            <a href="{{ route('user.google.redirect') }}" class="">
                                <img class="social-icons" src="{{ asset('front/images/ic_google.svg') }}" alt="">
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
@endsection
