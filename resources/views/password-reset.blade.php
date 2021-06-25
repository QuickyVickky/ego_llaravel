@extends('user.master')
@section('title','Forgot password')
@section('content')
    <section class="signup-page">
        <div class="row no-gutters">
            <div class="col-md-6">
                <div class="login-splash">
                    <div class="login-logo">
                        <img src="{{ asset('front/images/logo.svg') }}" alt=""/>
                    </div>
                    <div class="splash-image">
                        <img height="300" src="{{ asset('front/images/signup_girls.svg') }}" alt=""/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">

                <div class="row no-gutters">
                    <div class="col-md-6 m-auto">
                        <div class="signup-form">
                            <h3>Set your new password</h3>
                            <p></p>
                            @include('user.notification')
                            <form class="form-signin" name="resetPassword" method="post"
                                  action="{{ route('user.password.reset.post',Request::segment(3)) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="signin-label" for="email">Email address</label>
                                        <input type="text" id="email" name="email"
                                               class="form-control @error('email') is-invalid @enderror" value="{{ Request::get('email') }}"
                                               placeholder="Email address" required readonly/>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="signin-label" for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control @error('email') is-invalid @enderror"
                                               placeholder="Enter your password" required />
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="signin-label" for="password_confirmation">Re-enter
                                            Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"
                                               placeholder="Re-enter your password" required />
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="hidden" id="token" name="token"
                                               class="form-control @error('token') is-invalid @enderror" value="{{ Request::get('token') }}" required readonly/>
                                    </div>
                                    <div class="col-sm-12 mt-20">
                                        <button class="btn btn-primary btn-block" type="submit"> Confirm</button>
                                    </div>
                                </div>
                            </form>

                            <div class="mt-10">
                                <p class="sign-in-text">
                                    Remembered your password?
                                    <a href="{{ route('user.login') }}" class="">Login</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
