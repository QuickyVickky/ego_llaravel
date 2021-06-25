@extends('user.master')
@section('title','Homepage')
@section('styles')
    <style>
        .dashboard-panel {
            padding: unset;
        }
    </style>
@endsection
@section('content')

    <header class="main-header home-header" id="header">
        <nav class="navbar navbar-light ">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('front/images/logo.svg') }}" height="72" alt="egogram-logo"/>
                </a>
                <div class="">
                    <div class="dropdown">
                        {{-- <button
                            class="btn btn-secondary dropdown-toggle"
                            type="button"
                            id="dropdownMenuButton"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            English
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Hindi</a>
                            <a class="dropdown-item" href="#">German</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div> --}}
                        @can('isUser')

                            <a class="btn btn-primary round-btn" href="{{ route('user.dashboard') }}">My Account</a>

                            <a href="{{ route('user.logout') }}" class="btn btn-danger round-btn"
                               title="Sign Out"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sign Out
                            </a>
                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('user.login') }}" class="btn btn-primary"><span>Login</span> <img src="{{ asset('front/images/user-profiles.svg') }}" class="login-icon"></a>
                        @endauth

                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="main home-page">
        <!-- Banner Section  -->
        <section class="banner-section">
            <div id="particle-container">
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>


            </div>
            <form @submit.prevent="sendFormSubmit" name="sendForm" id="sendForm" action="">
                <div class="container">
                    <h1 class="big-head text-center mb-50 fw-600">
                        Send your money at <strong>lightening</strong> speed
                    </h1>
                    <div class="img-wrap">
                        <img src="{{ asset('front/images/vec_header-bg.svg') }}" class="img-fluid" alt=""/>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12 m-auto country-top-box">
                            <div class="row moneytransfer-wrap">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>You send</label>
                                        <div class="input-group mb-4">
                                            <input type="text" name="amount_send" id="amount_send"
                                                   class="form-control btn btn-default"
                                                   placeholder="0"
                                                   v-model.number="sendForm.sourceAmount" style="cursor: unset;">
                                            <!--<div class="input-group-append">
                                                <div class="btn-group dropdown-toggle" data-toggle="dropdown"
                                                     @click="searchClear">
                                                    <b-dropdown variant="primary" class="custom-dropdown">
                                                        <template v-slot:button-content>
                                                        <span class="input-group-addon">
                                                            <img
                                                                :src="'images/country/flag-'+sendForm.sourceCurrency+ '.svg'"
                                                                class="mr-1" height="20" alt="">
                                                        </span>
                                                            {{--                                                            {{ sendForm.sourceCurrency }}--}}
                                                        </template>
                                                        <b-dropdown-form>

                                                            <b-form-group @submit.stop.prevent>
                                                                <b-form-input id="dropdown-form-email" size="sm"
                                                                              placeholder=" Search"
                                                                              v-model="countrySearch"></b-form-input>
                                                            </b-form-group>
                                                        </b-dropdown-form>
                                                        <b-dropdown-item
                                                            v-for="(currency,code) in currencies" :key="code"
                                                            @click="sendForm.sourceCurrency = code;"
                                                            :active="sendForm.sourceCurrency == code ? true:false">
                                                            {{--                                                            {{ code }}({{ currency }})--}}
                                                        </b-dropdown-item>
                                                    </b-dropdown>
                                                </div>
                                            </div>-->
											{{-- <div class="country-dropdown">
												<dl id="country-select" class="dropdown dropdown-box-1">
												  <dt><a href="javascript:void(0);"><span><span style="background-image: url({{ asset('front/images/flag/India.png') }})"></span><span>INR</span><span>+Indian rupee</span></span></a></dt>
												  <dd>
													<ul style="display: none;">
													  <li><a cunt_code="+91" href="javascript:void(0);"><span style="background-image: url({{ asset('front/images/flag/India.png') }})"></span><span>INR</span><span>Indian rupee</span></a></li>
													  <li><a cunt_code="+1" href="javascript:void(0);"><span style="background-image: url({{ asset('front/images/flag/usa.png') }})"></span><span>USD</span><span>United States dollar</span></a></li>
													  <li><a cunt_code="+1" href="javascript:void(0);"><span style="background-image: url({{ asset('front/images/flag/British-pound.png') }})"></span><span>GBP</span><span>British pound</span></a></li>
													  <li><a cunt_code="+1" href="javascript:void(0);"><span style="background-image: url({{ asset('front/images/flag/Euro.png') }})"></span><span>EUR</span><span>Euro</span></a></li>
													  <li><a cunt_code="+1" href="javascript:void(0);"><span style="background-image: url({{ asset('front/images/flag/Australian-dollar.png') }})"></span><span>AUD</span><span>Australian dollar</span></a></li>

													</ul>
												  </dd>
												</dl>
											</div> --}}

                                            <div class="country-dropdown">
                                                <dl id="country-select" class="dropdown dropdown-box-1">
                                                    <dt>
                                                        @foreach($currency as $crncy)
                                                            <a href="javascript:void(0);">
                                                                <span>
                                                                    <span style="background-image: url({{ $crncy['currency_flag'] }})"></span>
                                                                    <span id="amount_send_currency_code">{{ $crncy['currency_code'] }}</span>
                                                                    <span>{{ $crncy['currency_name'] }}</span>
                                                                </span>
                                                            </a>

                                                            @break
                                                        @endforeach
                                                    </dt>

                                                    <dd>
                                                       <ul style="display: none;">
                                                            @foreach($currency as $crncy)
                                                                <li>
                                                                    <a href="javascript:void(0);">
                                                                        <span style="background-image: url({{ $crncy['currency_flag'] }})"></span>
                                                                        <span id="amount_send_currency_code">{{ $crncy['currency_code'] }}</span>
                                                                        <span>{{ $crncy['currency_name'] }}</span>
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                       </ul>
                                                    </dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group position-relative">
                                        <label>Receipt Get</label>
                                        <div class="input-group mb-4">
                                            <input type="text" name="amount_get" id="amount_get"
                                                   class="form-control btn btn-default"
                                                   placeholder="Amount get" value="0"
                                                   v-model.number="sendForm.targetAmount" style="opacity: 1;" disabled>
                                            <!--<div class="position-relative">
                                                <div class="btn-group dropdown-toggle" data-toggle="dropdown">
                                                    <b-dropdown variant="primary" class="custom-dropdown">
                                                        <template v-slot:button-content>
                                                        <span class="input-group-addon">
                                                            <img
                                                                :src="'images/country/flag-'+sendForm.targetCurrency+ '.svg'"
                                                                class="mr-1" height="20" alt="">
                                                        </span>
                                                            {{--                                                            {{ sendForm.targetCurrency }}--}}
                                                        </template>
                                                        <b-dropdown-form>

                                                            <b-form-group @submit.stop.prevent>
                                                                <b-form-input id="dropdown-form-email" size="sm"
                                                                              placeholder="Search"
                                                                              v-model="countrySearch"></b-form-input>
                                                            </b-form-group>
                                                        </b-dropdown-form>
                                                        <b-dropdown-item
                                                            v-for="(currency,code) in currencies" :key="code"
                                                            @click="sendForm.targetCurrency = code;"
                                                            :active="sendForm.targetCurrency == code ? true:false">
                                                            {{--                                                            {{ code }}({{ currency }})--}}
                                                        </b-dropdown-item>
                                                    </b-dropdown>
                                                </div>
                                            </div>-->
											{{-- <div class="country-dropdown">
												<dl id="country-select-1" class="dropdown-box-2 dropdown">
												  <dt><a href="javascript:void(0);"><span><span style="background-image: url({{ asset('front/images/flag/usa.png') }})"></span><span>USD</span><span>United States dollar</span></span></a></dt>
												  <dd>
													<ul style="display: none;">
													  <li><a cunt_code="+91" href="javascript:void(0);"><span style="background-image: url({{ asset('front/images/flag/India.png') }})"></span><span>INR</span><span>Indian rupee</span></a></li>
													  <li><a cunt_code="+1" href="javascript:void(0);"><span style="background-image: url({{ asset('front/images/flag/usa.png') }})"></span><span>USD</span><span>United States dollar</span></a></li>
													  <li><a cunt_code="+1" href="javascript:void(0);"><span style="background-image: url({{ asset('front/images/flag/British-pound.png') }})"></span><span>GBP</span><span>British pound</span></a></li>
													  <li><a cunt_code="+1" href="javascript:void(0);"><span style="background-image: url({{ asset('front/images/flag/Euro.png') }})"></span><span>EUR</span><span>Euro</span></a></li>
													  <li><a cunt_code="+1" href="javascript:void(0);"><span style="background-image: url({{ asset('front/images/flag/Australian-dollar.png') }})"></span><span>AUD</span><span>Australian dollar</span></a></li>

													</ul>
												  </dd>
												</dl>
											</div> --}}

                                            <div class="country-dropdown">
                                                <dl id="country-select-1" class="dropdown-box-2 dropdown">
                                                    <dt>
                                                        @foreach($currency as $crncy)
                                                            <a href="javascript:void(0);">
                                                                <span>
                                                                    <span style="background-image: url({{ $crncy['currency_flag'] }})"></span>
                                                                    <span id="amount_get_currency_code">{{ $crncy['currency_code'] }}</span>
                                                                    <span>{{ $crncy['currency_name'] }}</span>
                                                                </span>
                                                            </a>
                                                            @break
                                                        @endforeach
                                                    </dt>

                                                    <dd>
                                                        <ul style="display: none;">
                                                            @foreach($currency as $crncy)
                                                                <li>
                                                                    <a href="javascript:void(0);">
                                                                        <span style="background-image: url({{ $crncy['currency_flag'] }})"></span>
                                                                        <span id="amount_get_currency_code">{{ $crncy['currency_code'] }}</span>
                                                                        <span>{{ $crncy['currency_name'] }}</span>
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <button type="button" id="continueBtn" class="btn btn-primary submit-btn" :disabled="isLoad">
                                        Continue
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </section>
        <section class="section-padding mt-mode" id="services">
            <div class="container">
                <h2 class="big-head mb-4 text-center">Send your money the way you prefer</h2>
                <p class="sub-text text-center mb-5">With EgoGram, you have the choice between your computer, your <br
                        class="desktop-break"> smartphone or our app for your money transfers.</p>
                <div class="row  ">
                    <div class="col-lg-4 col-md-6">
                        <div class="color-box blue">
                            <img src="{{ asset('front/images/icons/ic_bank_deposit.svg') }}" height="60" class="mb-3"
                                 alt="">
                            <h5 class="mb-3"><strong>Direct bank deposit</strong></h5>
                            <p>The money you send is
                                deposited to your
                                recipient's bank account.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="color-box yellow">
                            <img src="{{ asset('front/images/icons/ic_bank_account.svg') }}" height="60" class="mb-3"
                                 alt="">
                            <h5 class="mb-3"><strong>Credit card, Debit card, or bank account</strong></h5>
                            <p>
                                The money you send can be collected in just a few minutes at thousands of collection
                                points around the world.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 m-auto">
                        <div class="color-box red">
                            <img src="{{ asset('front/images/icons/ic_exchange.svg') }}" height="60" class="mb-3"
                                 alt="">
                            <h5 class="mb-3"><strong>Best exchange rate</strong></h5>
                            <p>Get the most value for your
                                money with Egogram's best rate
                                guarantee. </p>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section class="section-padding why-choose pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 text-center-sm">
                        <h1 class="big-head mb-4">
                            Why choose <br class="desktop-break"> EgoGram?
                        </h1>
                        <button class="btn btn-primary mb-3">Help</button>
                    </div>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="d-flex align-items-baseline">
                                    <img src="{{ asset('front/images/bluecheck.svg') }}" class=" mr-2" alt="">
                                    <div>
                                        <h5 class="mb-3"><strong>Simplicity</strong></h5>
                                        <p>No need to go to an agency. Send money in 90 currencies, to 150 countries,
                                            from
                                            your mobile or computer.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="d-flex align-items-baseline">
                                    <img src="{{ asset('front/images/bluecheck.svg') }}" class=" mr-2" alt="">
                                    <div>
                                        <h5 class="mb-3"><strong>Security</strong></h5>
                                        <p>Our advanced technology protects your money and ensures it arrives safely
                                            with
                                            every shipment.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="d-flex align-items-baseline">
                                    <img src="{{ asset('front/images/bluecheck.svg') }}" class=" mr-2" alt="">
                                    <div>
                                        <h5 class="mb-3"><strong>Speed</strong></h5>
                                        <p>90% of our transactions are authorized within minutes.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="d-flex align-items-baseline">
                                    <img src="{{ asset('front/images/bluecheck.svg') }}" class=" mr-2" alt="">
                                    <div>
                                        <h5 class="mb-3"><strong>Reduced fees</strong></h5>
                                        <p>Consult our rates and advantageous exchange rates before committing, with no
                                            hidden costs.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-img">
                    <img src="{{ asset('front/images/why-choose.svg') }}" height="250" class="mb-3" alt="">
                </div>
            </div>
        </section>
        <section class="section-padding why-choose-below">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-9 text-center-sm">
                        <h2><strong> Be there for your family.</strong></h2>
                        <h2><strong> Even on the other side of the world.</strong></h2>
                    </div>
                    <div class="col-md-3 text-center-sm">
                        <img src="{{ asset('front/images/family_world_vector.svg') }}" height="160" class=" mr-md-2"
                             alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class=" ">
            <div class="section-padding grey-bg pb-250">
                <div class="container">
                    <h2 class="big-head mb-4 text-center">Your money is safe<br class="mobile-break"> with us</h2>
                    <p class="sub-text text-center mb-5">Our industry-leading technology protects your money <br
                            class="desktop-break"> and guarantees it arrives safely every time.</p>
                    <br>
                    <div class="row align-items-center client-logos">
                        <div class="col-md-3 col-sm-6">
                            <img src="{{ asset('front/images/verified_by_visa.svg') }}" height="80" alt="">
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <img src="{{ asset('front/images/mastercard-securecode.svg') }}" height="63" alt="">
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <img src="{{ asset('front/images/AWS_Logo.svg') }}" height="70" alt="">
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <img src="{{ asset('front/images/pci-logo-high-res.svg') }}" height="75" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="white-bg pb-5">
                <div class="container">
                    <div class="blue-container push-upwards">
                        <div class="top-grid"></div>
                        <div class="left-grid"></div>
                        <div class="right-grid"></div>
                        <img src="{{ asset('front/images/play-button.svg') }}" height="90" class="mb-5" alt="">
                        <h1 class="big-head mb-3">
                            Send money with EgoGram
                        </h1>
                        <h4>Our Credo: Speed, Simplicity, Security</h4>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding grey-bg position-relative">
            <div class="testimonial-grid">
                <div class="grid-1"></div>
                <div class="grid-2"></div>
                <div class="grid-3"></div>
                <div class="grid-4"></div>
            </div>
            <div class="container">
                <div class="text-center mb-4">
                    <h6 class="sub-text mb-3">EgoGram rating on Trustpilot: Excellent</h6>
                    <h1><strong>Trustpilot</strong></h1>
                </div>
                <div class="testimonial">
                    <div class="owl-carousel owl-theme" id="testimonial">
                        <div class="item">
                            <div class="review-wrap">
                                <h1>"</h1>
                                <p>The service is efficient super fast and my recipients are happy that I am using this
                                    service.</p>
                                <div class="client-image">
                                    <img src="{{ asset('front/images/client1.png') }}" width="70"
                                         class="img-fluid rounded-circle"
                                         alt="">
                                </div>
                            </div>

                        </div>
                        <div class="item">
                            <div class="review-wrap">
                                <h1>"</h1>
                                <p>The service is efficient super fast and my recipients are happy that I am using this
                                    service.</p>
                                <div class="client-image">
                                    <img src="{{ asset('front/images/client1.png') }}" width="70"
                                         class="img-fluid rounded-circle"
                                         alt="">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="review-wrap">
                                <h1>"</h1>
                                <p>The service is efficient super fast and my recipients are happy that I am using this
                                    service.</p>
                                <div class="client-image">
                                    <img src="{{ asset('front/images/client1.png') }}" width="70"
                                         class="img-fluid rounded-circle"
                                         alt="">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="review-wrap">
                                <h1>"</h1>
                                <p>The service is efficient super fast and my recipients are happy that I am using this
                                    service.</p>
                                <div class="client-image">
                                    <img src="{{ asset('front/images/client1.png') }}" width="70"
                                         class="img-fluid rounded-circle"
                                         alt="">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding app-store">
            <div class="container">
                <div class="blue-container ">
                    <div class="row align-items-center">
                        <div class="col-md-8 text-left">
                            <h6 class="text-uppercase mb-3">Download app</h6>
                            <h2 class="text-uppercase mb-5">Send on the go and track your transfer with our app</h2>
                            <div class="text-center-sm">
                                <button type="button" class="btn  btn-light mb-2 mr-lg-3"><img
                                        src="{{ asset('front/images/playstore.svg') }}"
                                        height="20" class="mr-2"
                                        alt=""> Google Play
                                </button>
                                <button type="button" class="btn  mb-2 btn-light">
                                    <img src="{{ asset('front/images/apple.svg') }}" class="mr-2" height="20" alt="">Apple
                                    Store
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('front/images/download-app.png') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>

	</script>

    <style>

	</style>
    @include('user.footer')
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#amount_send").on("change", function(){
                calculateTransferAmount();
            });

            $('#continueBtn').click(function() {
                window.location.href = '{{ route('user.login') }}';
            });
        });

        function calculateTransferAmount() {
            var amountSend = $('#amount_send').val();

            $.ajax({
                url: "{{ url('api/exchange_currency_rate') }}",
                type: 'POST',
                async: false,
                data: {
                    _token: '{{ csrf_field() }}',
                    amount: amountSend,
                    from_currency_code: $('#amount_send_currency_code').text(),
                    to_currency_code: $('#amount_get_currency_code').text(),
                },
                success: function(data) {
                    $('#amount_get').val(data.exchange);
                }
            });
        }
    </script>
@endsection