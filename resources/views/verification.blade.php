@extends('user.master')
@section('title','Login verification')
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
                        <img height="460" src="{{ asset('front/images/otp-hero.svg')}}" alt=""/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <a href="{{ route('user.login') }}">
                        <img class="cross-icons" src="{{ asset('front/images/cross.svg')}}" alt="">
                    </a>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-6 m-auto">
                        <div class="center-container">
                            @include('user.notification')
                            <div class="result"></div>
                            <h3>We just sent you an SMS</h3>
                            <p class="text-grey pt-0"> To log in, enter the security code we sent to</p>

                            <div class="d-flex justify-content-between  align-items-center mt-4">
                                <h4 class="text-primary pt-0 m-0">
                                    ******{{ substr($user->phone,6,4)}}</h4>
                                <a href="" class=" ">Learn More</a>
                            </div>
                            <p class="text-grey text-left">Type your 6-digit security code here</p>
                            <div class="otp-form mb-4">
                                <form action="{{ route('user.verification.post') }}" method="post" class="digit-group"
                                      data-group-name="digits"
                                      data-autosubmit="false" autocomplete="off">
                                    @csrf
                                    <input class="digit-input @error('digit.1') is-invalid @enderror" type="text" id="digit-1" name="digit[1]"
                                           data-current="0"
                                           data-next="digit-2" v-model.number="digits[0]"
                                           onkeypress="onlyNumber(event)"
                                           onpaste="onPaste(event)"
                                           onkeyup="keyup(event)"
                                           min="1" max="9" maxlength="1"/ autofocus>
                                    {{-- @error('digit.1')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror --}}

                                    <input class="digit-input @error('digit.2') is-invalid @enderror" type="text" id="digit-2" name="digit[2]"
                                           data-current="1"
                                           data-next="digit-3" data-previous="digit-1" v-model.number="digits[1]"
                                           onkeypress="onlyNumber(event)"
                                           onpaste="onPaste(event)"
                                           onkeyup="keyup(event)"
                                           min="1" max="9" maxlength="1"/>
                                    {{-- @error('digit.2')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror --}}
                                    <input class="digit-input @error('digit.3') is-invalid @enderror" type="text" id="digit-3" name="digit[3]"
                                           data-current="2"
                                           data-next="digit-4" data-previous="digit-2" v-model.number="digits[2]"
                                           onkeypress="onlyNumber(event)"
                                           onpaste="onPaste(event)"
                                           onkeyup="keyup(event)"
                                           min="1" max="9" maxlength="1"/>
                                    {{-- @error('digit.3')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror --}}
                                    <input class="digit-input @error('digit.4') is-invalid @enderror" type="text" id="digit-4" name="digit[4]"
                                           data-current="3"
                                           data-next="digit-5" data-previous="digit-3" v-model.number="digits[3]"
                                           onkeypress="onlyNumber(event)"
                                           onpaste="onPaste(event)"
                                           onkeyup="keyup(event)"
                                           min="1" max="9" maxlength="1"/>
                                    {{-- @error('digit.4')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror --}}
                                    <input class="digit-input @error('digit.5') is-invalid @enderror" type="text" id="digit-5" name="digit[5]"
                                           data-current="4"
                                           data-next="digit-6" data-previous="digit-4" v-model.number="digits[4]"
                                           onkeypress="onlyNumber(event)"
                                           onpaste="onPaste(event)"
                                           onkeyup="keyup(event)"
                                           min="1" max="9" maxlength="1"/>
                                    {{-- @error('digit.5')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror --}}
                                    <input class="digit-input @error('digit.6') is-invalid @enderror" type="text" id="digit-6" name="digit[6]"
                                           data-current="5"
                                           data-previous="digit-5" v-model.number="digits[5]"
                                           onkeypress="onlyNumber(event)"
                                           onpaste="onPaste(event)"
                                           onkeyup="keyup(event)"
                                           min="1" max="9" maxlength="1"/>
                                    {{-- @error('digit.6')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror --}}
                                    @error('digit.*')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>

                                      <br>
                                    @enderror



                                    <input type="hidden" name="phone" value="{{ $user->phone }}">
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <button class="btn btn-primary btn-block" type="submit">DONE</button>
                                </form>
                            </div>
                            <div class="text-grey text-center resendOTPTimer">Time left = <span id="timer"></span></div>
                            <div class="text-center collapse" id="resendOTP">
                                <a class="text-center" href="#" onclick="resendOTP()">I didn't receive the code</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            timer();
            // timer(120);
        })


        let timerOn = true;

        function timer(remaining=121) {
            var m = Math.floor(remaining / 60);
            var s = remaining % 60;

            m = m < 10 ? '0' + m : m;
            s = s < 10 ? '0' + s : s;
            document.getElementById('timer').innerHTML = m + ':' + s;
            remaining -= 1;

            if (remaining >= 0 && timerOn) {
                setTimeout(function () {
                    timer(remaining);
                }, 1000);
                return;
            }

            if (!timerOn) {
                // Do validate stuff here
                return;
            }

            // Do timeout stuff here
            $("#resendOTP").removeClass('collapse');
            $(".resendOTPTimer").addClass('collapse');
        }

        function resendOTP() {
            var url = "{{ route('user.resend-otp') }}";
            var data = {phone: "{{ $user->phone }}", user_id: "{{ $user->id }}"};

            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: url,
                data: data,
                success: function (result) {
                    console.log("result: ", result);
                    if(result.Success == true){
                        $(".result").append("<div class='alert alert-success alert-dismissible'><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>"+result.Message+"</div>")
                        $("#resendOTP").addClass('collapse');
                        $(".resendOTPTimer").removeClass('collapse');
                        timer();
                    }else{
                        $(".result").append("<div class='alert alert-danger alert-dismissible'><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>"+result.Message+"</div>")
                    }

                }

            });
        }
    </script>
@endsection
