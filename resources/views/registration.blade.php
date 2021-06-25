@extends('user.master')
@section('title','Registration')
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
                        <img height="300" src="{{ asset('front/images/signup_girls.svg') }}" alt="" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <p class="text-right sign-in-text pb-0">Already a member?
                        <strong><a  href="{{ route('user.login') }}" class="">Sign In</a></strong>
                        <a href="{{ url('/') }}"><img src="{{ asset('front/images/cross.svg') }}" class="ml-2" height="30"></a>
                    </p>

                </div>
                <div class="row no-gutters">
                    <div class="col-md-6 m-auto">
                        <div class="center-container mt-3 text-left ">
                            <h3 class="mb-4">Create an account</h3>
                            <form class="form-signin" href="{{ route('user.registration.post') }}" method="post">
                                @csrf

                                <input type="hidden" name="google_id" value="{{ $googleId }}">

                                <div class="form-group">
                                    <label class="form-label text-grey" for="inputEmail">Email address</label>
                                    <input type="email" name="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" value="{{ $email }}" @if($email) readonly @endif required />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label text-grey" for="inputEmail">Phone number</label>
                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter phone number"
                                           required onkeypress="onlyNumber(event)"
                                           maxlength="10"/>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label text-grey" for="inputPassword">Password</label>
                                    <input type="password" name="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required/>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-grey" for="inputPassword">Country of Registration</label>
                                    <div class="input-group">
                                        <select class="form-control @error('country') is-invalid @enderror" name="country">
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('country')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>
                                </div>

                                <button class="btn btn-primary btn-block mt-3 mb-4" type="submit">
                                    SIGN UP
                                </button>
                                <p class="text-center text-grey mt-5 mb-3">
                                    -----Or Continue with-----
                                </p>
                                <div class="social-icon-image">
                                    <!--                                        <img class="social-icons" src="front/images/ic_fb.svg" alt="" />-->
                                    <a href="{{ route('user.google.redirect') }}" class="">
                                        <img class="social-icons" src="{{ asset('front/images/ic_google.svg') }}" alt="" />
                                    </a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-right text-grey pr-5 pt-4">
                        Privacy Policy and Terms of Service </p>
                </div>
            </div>
        </div>
    </section>
@endsection
