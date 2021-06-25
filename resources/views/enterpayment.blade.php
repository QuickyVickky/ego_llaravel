@extends('user.master')
@section('title','Enter payment')

@section('styles')
    <style>
        @media (min-width: 1024px) {
            .card .card-header {
              display: none;
            }

            .card .collapse {
              display: block;
            }
        }
    </style>
@endsection

@section('content')
    @include('user.send_header')
    <div class="dashboard-body">
        <div class="sendmoney-tabs" id="sendmoneyTabs">
            <div class="sidebar">
                <ul id="tabs" class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Amount</a>
                    </li>

                    <li class="nav-item">
                        <a id="tab-B" @if($transactions) href="#pane-B" data-toggle="tab" role="tab" @endif class="nav-link">You</a>
                    </li>

                    <li class="nav-item">
                        <a id="tab-C" @if($transactions) href="#pane-C" data-toggle="tab" role="tab" @endif class="nav-link">{{ $transactions ? 'Verification' : 'Recipients' }}</a>
                    </li>

                    <li class="nav-item">
                        <a id="tab-D" @if($transactions) href="#pane-D" data-toggle="tab" role="tab" @endif class="nav-link">Review</a>
                    </li>

                    <li class="nav-item">
                        <a id="tab-E" @if($transactions) href="#pane-E" data-toggle="tab" role="tab" @endif class="nav-link">Pay</a>
                    </li>
                </ul>
            </div>

            <div id="content" class="sm-content tab-content" role="tablist">
                {{-- <form name="sendMoneyForm" action="#"> --}}
                    <input type="hidden" name="csrf_token" id="csrf_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="userName" id="userName" value="{{ $user->first_name . ' ' . $user->last_name}}">
                    <input type="hidden" name="recipient_id" id="recipient_id" value="{{ $transactions ? $transactions->recipient->id : '' }}">
                    <input type="hidden" name="isRecipientSelect" id="isRecipientSelect" value="{{ $transactions ? '1' : '0' }}">

                    <div id="pane-A" class="card tab-pane show active" role="tabpanel" aria-labelledby="tab-A">
                        <div class="card-header" role="tab" id="heading-A">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#collapse-A" data-parent="#content" aria-expanded="true" aria-controls="collapse-A">Amount</a>
                            </h5>
                        </div>

                        <div id="collapse-A" class="collapse show" role="tabpanel" aria-labelledby="heading-A">
                            <div class="card-body">
                                <h2 class="mb-4">How much would you like to transfer?</h2>
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="row moneytransfer-wrap">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>You send</label>

                                                    <div class="btn-group">
                                                        <input type="number" name="amount_send" id="amount_send" class="btn btn-default send-money-input" placeholder="0" min="0" value="{{ $transactions ? $transactions->you_send : '' }}" autofocus>

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

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Recipient Get</label>

                                                    <div class="btn-group">
                                                        <input type="number" name="amount_get" id="amount_get" class="btn btn-default send-money-input" placeholder="Amount get" value="0" disabled>

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
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="d-lg-flex align-items-center mb-4">
                                        <h5 class="fw-bold mr-4 mb-1">
                                            <img src="{{ asset('images/blue-minus.svg') }}" class="mr-2">

                                            <span id="fee_rate_amount">0.00</span> <span class="related_currency_code">USD</span>
                                        </h5>

                                        <select name="fees" id="fees" class="form-control mr-4 mb-1" style="width: 230px;">
                                            @foreach($fees as $fee)
                                                <option value="{{ $fee->type }}" data-rate-percentage="{{ $fee->percentage }}" {{ $transactions ? ($fee->type == $transactions->fees_type ? 'selected' : '') : '' }}>{{ $transfer[$fee->type] }}</option>
                                            @endforeach
                                        </select>

                                        <span class="orange-text mr-4 fw-bold">Fees</span>

                                        <span >Type a value for the recipients to get exact amount</span>
                                    </div>

                                    <div class="mb-4">
                                        <h5 class="fw-bold mr-4 mb-0 d-inline-block">
                                            <img src="{{ asset('images/blue-equals.svg') }}" class="mr-2">

                                            <span id="remain_amount">0.00</span> <span class="related_currency_code">USD</span>
                                        </h5>

                                        <span class="text-grey d-block-sm">Amount we’ll convert</span>
                                    </div>

                                    <div class="mb-4">
                                        <h5 class="fw-bold mr-4 mb-0 d-inline-block">
                                            <img src="{{ asset('images/blue-multiply.svg') }}" class="mr-2">

                                            <span id="convert_rate">0.00</span>
                                        </h5>

                                        <span class="text-grey d-block-sm">Convert Rate</span>
                                    </div>
                                </div>

                                <h5 class="mb-4 text-grey">
                                    Should arrive

                                    <span class="text-primary">
                                        <strong>by {{ $arrivingDate }}.</strong>
                                    </span>
                                </h5>

                                <button type="button" id="amountContinueBtn" class="btn btn-primary btn-fixwidth text-uppercase">Continue</button>
                            </div>
                        </div>
                    </div>

                    <div id="pane-B" class="card tab-pane" role="tabpanel" aria-labelledby="tab-B">
                        <div class="card-header" role="tab" id="heading-B">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapse-B" data-parent="#content" aria-expanded="false" aria-controls="collapse-B">You</a>
                            </h5>
                        </div>

                        <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                            <div class="card-body">
                                <div class="you-screen-1">
                                    <h2 style="margin-bottom: 100px;">Is this a personal or business transfer?</h2>

                                    <div class="row  mt-5">
                                        <div class="col-lg-4 col-md-6">
                                            <a href="javascript:void(0)" id="changeYouScreenId" onclick="{{ $transactions ? 'changeYouScreenRecipient()' : 'changeYouScreen()' }}">
                                                <div class="color-box red">
                                                    <div class="icon-wrap push-above">
                                                        <img src="{{ asset('images/user.svg') }}" height="40" alt="">
                                                    </div>

                                                    <h3 id="existUserName">{{ $transactions ? $transactions->user->first_name . ' ' . $transactions->user->last_name : 'Personal' }}</h3>

                                                    <h5>If you’re paying in from <br> your personal bank <br> account.</h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="you-screen-2 d-none">
                                    <h2 class="mb-4">Fill in your details</h2>

                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label for="">Full legal first and middle names</label>

                                                <input type="text" name="you_first_name" id="you_first_name" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label for="">Full legal last name</label>

                                                <input type="text" name="you_last_name" id="you_last_name" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label for="">Date of birth</label>

                                                <div class="row">
                                                    <div class="col-md-3 col-sm-3">
                                                        <select class="form-control" name="you_dob_day" id="you_dob_day">
                                                            @foreach($day as $d)
                                                                <option value="{{ $d }}">{{ $d }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-5 col-sm-4 pl-0">
                                                        <select class="form-control" name="you_dob_month" id="you_dob_month">
                                                            @foreach($month as $mnth)
                                                                <option value="{{ $mnth }}">{{ $mnth }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-4 col-sm-3 pl-0 ">
                                                        <select class="form-control" name="you_dob_year" id="you_dob_year">
                                                            @for($i = $yearEnd; $i >= $yearStart; $i--)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label for="">Phone number</label>

                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4">
                                                        <select class="form-control" name="you_dial_code" id="you_dial_code" disabled>
                                                            @foreach($country as $cntry)
                                                                <option value="{{ $cntry['id'] }}" {{ $cntry['id'] == $user->country ? 'selected' : '' }}>{{ $cntry['dial_code'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-8 col-sm-6 pl-0 ">
                                                        <input type="number" name="you_phone_number" id="you_phone_number" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label for="">Country</label>

                                                <select class="form-control" name="you_country" id="you_country" disabled>
                                                    @foreach($country as $cntry)
                                                        <option value="{{ $cntry['id'] }}" {{ $cntry['id'] == $user->country ? 'selected' : '' }}>{{ $cntry['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label for="">Address</label>

                                                <input type="text" name="you_address" id="you_address" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label for="">Postcode</label>

                                                <input type="number" name="you_postcode" id="you_postcode" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label for="">State</label>

                                                <input type="text" name="you_state" id="you_state" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="custom-radio position-relative mt-4 mb-4">
                                        <input type="radio" id="tnc" name="radio-group" checked>

                                        <label for="tnc" >
                                            <h5 class="mb-0 pl-5 fw-bold text-grey">Yes, Egogram can verify my identity faster by disclosing my information to a credit reporting partner.<br> (Don’t worry, this won’t leave marks or in any way alter your credit history.)</h5>
                                        </label>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <button type="button" id="youContinueBtn" class="btn btn-primary w-100 text-uppercase">Continue</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="pane-C" class="card tab-pane " role="tabpanel" aria-labelledby="tab-C">
                        <div class="card-header" role="tab" id="heading-C">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapse-C" data-parent="#content" aria-expanded="false" aria-controls="collapse-C">
                                    Recipients
                                </a>
                            </h5>
                        </div>

                        <div id="collapse-C" class="collapse" role="tabpanel" aria-labelledby="heading-C">
                            <div class="card-body">
                                <div class="recipients-screen-1">
                                    <h2 class="mb-4 tabpanel-title">Who are you sending money to?</h2>

                                    <div class="row ">
                                        <div class="col-lg-7 ">
                                            <div class="row ">
                                                <div class="col-lg-12 text-center">
                                                    <h4 class="mb-4">New Recipient</h4>
                                                </div>

                                                <div class="col-lg-4 col-md-6 new-receipts">
                                                    <a href="javascript:void(0)" onclick="changeRecipientsScreen1('yourself')">
                                                        <div class="color-box red">
                                                            <div class="icon-wrap mb-2">
                                                                <img src="{{ asset('images/user.svg') }}" height="40" alt="">
                                                            </div>

                                                            <h3 class="sendRecipientOption">Myself</h3>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="col-lg-4 col-md-6 new-receipts">
                                                    <a href="javascript:void(0)" onclick="changeRecipientsScreen1('someone else')">
                                                        <div class="color-box yellow">
                                                            <div class="icon-wrap mb-2">
                                                                <img src="{{ asset('images/hand-shake.svg') }}" height="40" alt="">
                                                            </div>

                                                            <h3 class="sendRecipientOption">Someone else</h3>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="col-lg-4 col-md-6 m-auto new-receipts">
                                                    <a href="javascript:void(0)" onclick="changeRecipientsScreen1('business or charity')">
                                                        <div class="color-box blue">
                                                            <div class="icon-wrap mb-2">
                                                                <img src="{{ asset('images/friends.svg') }}" height="40" alt="">
                                                            </div>

                                                            <h3 class="sendRecipientOption">Business or Charity</h3>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        @if(count($recipient) > 0)
                                            <div class="col-lg-5 ">
                                                <h4 class="mb-4 text-center">Your Recipients</h4>

                                                <div class="your-recipient">
                                                    <div class="your-recipient-inner">
                                                        <ul>
                                                            @foreach($recipient as $rcp)
                                                                <li>
                                                                    <a href="javascript:void(0)" onclick="goToVerificationScreen({{ $rcp }})">
                                                                        <div class="your-recipient-box">
                                                                            <div class="recipient-box-profile">
                                                                                {{ $rcp->recipient_first_name[0].$rcp->recipient_last_name[0] }}
                                                                            </div>

                                                                            <div class="recipient-box-text">
                                                                                <h4>{{ $rcp->recipient_first_name . ' ' . $rcp->recipient_last_name }}</h4>
                                                                                <p>{{ $rcp->countryData->code }} account</p>
                                                                            </div>

                                                                            <div class="recipient-box-icon">
                                                                                <img src="{{ asset('front/images/right-icon.svg') }}"  alt="">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="recipients-screen-2 d-none">
                                    <h2 class="mb-5">Send to <span id="sendRecipientText">yourself</span></h2>

                                    <div class="row">
                                        <div class="col-lg-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Bank account Country</label>

                                                        <select class="form-control" name="recipient_country" id="recipient_country">
                                                            <option value="">Select country</option>
                                                            @foreach($country as $cntry)
                                                                <option value="{{ $cntry['id'] }}">{{ $cntry['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                   <div class="form-group">
                                                        <label for="">Account holder Email Address</label>

                                                        <input type="text" name="recipient_email" id="recipient_email" class="form-control">
                                                   </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Account holder First Name</label>

                                                        <input type="text" name="recipient_first_name" id="recipient_first_name" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Account holder Last Name</label>

                                                        <input type="text" name="recipient_last_name" id="recipient_last_name" class="form-control">
                                                    </div>
                                                </div>

                                                <div id="zelleDiv" class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Zelle Email / Mobile number</label>

                                                        <input type="text" name="recipient_zelle" id="recipient_zelle" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row" id="recipientBankFieldAccordingToCountry">
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="button" id="recipientContinueBtn" class="mt-4 btn btn-primary text-uppercase w-100">Confirm</button>
                                                </div>
                                            </div>

                                            <a href="{{ route('user.send.enterpayment') }}" class="text-primary mt-5 d-block text-underline" style="margin-top: 3rem !important;">
                                                Ecogram sends money to bank accounts. Looking to send money another way?
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="recipients-screen-3 d-none">
                                    <h2 class="mb-3">What’s the reason for your transfer?</h2>

                                    <p class="mb-4">To help us keep EgoGram safe and secure, please let us know why <br> You’re making this transfer.</p>

                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label>Reason for your transfer</label>

                                                <select class="form-control" name="recipient_transfer_reason" id="recipient_transfer_reason">
                                                    @foreach($transfer_reason as $tr)
                                                        <option value="{{ $tr }}" {{ $transactions ? ($tr == $transactions->recipient_transfer_reason ? 'selected' : '') : '' }}>{{ $tr }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" id="recipientTransferReasonContinueBtn" class="mt-4 btn btn-primary text-uppercase btn-fixwidth">Continue</button>
                                </div>

                                <div class="recipients-screen-4 d-none">
                                    <h2 style="margin-bottom: 100px;">Is this a personal or business transfer?</h2>

                                    <div class="row  mt-5">
                                        <div class="col-lg-4 col-md-6">
                                            <a href="javascript:void(0)" onclick="recipientsUploadProof('National ID card')">
                                                <div class="color-box red">
                                                    <div class="icon-wrap push-above">
                                                        <img src="{{ asset('images/user.svg') }}" height="40" alt="">
                                                    </div>

                                                    <h3>National ID card</h3>

                                                    <h5>Upload a photo or scan of <br>your national ID card.</h5>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <a href="javascript:void(0)" onclick="recipientsUploadProof('Passport')">
                                                <div class="color-box yellow">
                                                    <div class="icon-wrap push-above">

                                                        <img src="{{ asset('images/hand-shake.svg') }}" height="40" alt="">
                                                    </div>

                                                    <h3>Passport</h3>

                                                    <h5>Upload a photo or scan of<br> your passport photo page.</h5>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-lg-4 col-md-6 m-auto">
                                            <a href="javascript:void(0)" onclick="recipientsUploadProof('Driver’s Licence')">
                                                <div class="color-box blue">
                                                    <div class="icon-wrap push-above">
                                                        <img src="{{ asset('images/friends.svg') }}" height="40" alt="">
                                                    </div>

                                                    <h3>Driver’s Licence</h3>

                                                    <h5>Upload a photo or scan of <br>your driver’s licence.</h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="recipients-screen-5 d-none">
                                    <h2 class="mb-3" id="recipient_upload_title_text">Driver’s Licence</h2>

                                    <p class="grey-text">Upload a photo or scan of your <span id="recipient_upload_description_text">passport</span> photo page.</p>

                                    <div class="row  mt-2">
                                        <div class="col-lg-5 col-md-6 mb-3">
                                            <div class="file-upload">
                                                <div class="image-upload-wrap image-upload-wrap-front" @if($transactions) style="display: none;" @endif>
                                                    <input class="file-upload-input" name="recipientUploadFrontInput" id="recipientUploadFrontInput" type='file' onchange="readURLFront(this);" accept="image/*" data-front-proof-name="{{ $user->is_proof_verified == Config('constants.is_proof_verified.verified') ? $user->front_proof : '' }}"/>

                                                    <div class="drag-text">
                                                        <img src="{{ asset('images/upload.svg') }}" class="mb-3" height="50" alt="">

                                                        <p class="mb-3">Upload the front side of your <span id="recipient_upload_div_front_description_text">Driver’s licence</span></p>
                                                    </div>

                                                    <div class="text-center">
                                                        <button class="file-upload-btn btn btn-dark text-uppercase pl-5 pr-5" type="button" onclick="$('#recipientUploadFrontInput').trigger( 'click' )">Upload</button>
                                                    </div>
                                                </div>

                                                <div class="file-upload-content file-upload-content-front" @if($transactions) style="display: block;" @endif>
                                                    <img class="file-upload-image file-upload-image-front" src="{{ $transactions ? $transactions->recipient_upload_front_input : '#' }}" alt="your image" />
                                                    <div class="image-title-wrap">
                                                        <span class="image-title image-title-front">Uploaded Image</span>

                                                        <div>
                                                            <a href="#" id="uploadAnotherImageFront" style="color: #255F99;">Uploaded another image</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-5 col-md-6">
                                            <div class="file-upload">
                                                <div class="image-upload-wrap image-upload-wrap-back" @if($transactions) style="display: none;" @endif>
                                                    <input class="file-upload-input" name="recipientUploadBackInput" id="recipientUploadBackInput" type='file' onchange="readURLBack(this);" accept="image/*" data-back-proof-name="{{ $user->is_proof_verified == Config('constants.is_proof_verified.verified') ? $user->back_proof : '' }}"/>

                                                    <div class="drag-text">
                                                        <img src="{{ asset('images/upload.svg') }}" class="mb-3" height="50" alt="">

                                                        <p class="mb-3">Upload the back side of your <span id="recipient_upload_div_back_description_text">Driver’s licence</span></p>
                                                    </div>

                                                    <div class="text-center">
                                                        <button class="file-upload-btn btn btn-dark text-uppercase pl-5 pr-5" type="button" onclick="$('#recipientUploadBackInput').trigger( 'click' )">Upload</button>
                                                    </div>
                                                </div>

                                                <div class="file-upload-content file-upload-content-back" @if($transactions) style="display: block;" @endif>
                                                    <img class="file-upload-image file-upload-image-back" src="{{ $transactions ? $transactions->recipient_upload_back_input : '#' }}" alt="your image" />

                                                    <div class="image-title-wrap">
                                                        <span class="image-title image-title-back">Uploaded Image</span>

                                                        <div>
                                                            <a href="#" id="uploadAnotherImageBack" style="color: #255F99;">Uploaded another image</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" id="recipientsUploadProofContinueBtn" class="btn btn-primary text-uppercase btn-fixwidth" style="margin-top: 3rem!important;">Continue</button>

                                    <a href="javascript:void(0)" class="text-primary mt-3 d-block text-underline" onclick="recipientsChooseDifferentAccount()">
                                        Choose a different ID document
                                    </a>
                                </div>

                                <div class="recipients-screen-6 d-none">
                                    <h2 style="margin-bottom: 80px;">What are you sending money to?</h2>

                                    <div class="row  mt-2">
                                        <div class="col-lg-6">
                                            <div class="recipient-box">
                                                <div class="rcp-initial">
                                                    <h1 class="mb-0"> J</h1>
                                                </div>

                                                <table class="table mb-0">
                                                    <tr>
                                                        <th>Recipient First</th>

                                                        <td class="grey-text text-right" id="verificationRecipientFirstName">{{ $transactions ? $transactions->recipient->recipient_first_name . ' ' . $transactions->recipient->recipient_last_name : 'recipient1@grr.la' }}</td>
                                                    </tr>
                                                </table>

                                                <table id="verificationRecipientData" class="table mb-0">
                                                    @if($transactions)
                                                        @foreach($transactions->recipient->transactionField as $trf)
                                                            <tr>
                                                                <th>{{ $trf->field_name }}</th>

                                                                <td class="grey-text text-right">{{ $trf->field_value }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" id="verificationContinueBtn" class="btn btn-primary text-uppercase btn-fixwidth mt-4">Continue</button>

                                    <a href="javascript:void(0)" class="text-primary mt-3 d-block text-underline" onclick="selectAnotherRecipient()">
                                        <strong>Select another recipient</strong>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="pane-D" class="card tab-pane " role="tabpanel" aria-labelledby="tab-D">
                        <div class="card-header" role="tab" id="heading-D">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapse-D" data-parent="#content" aria-expanded="false" aria-controls="collapse-D">
                                    Review
                                </a>
                            </h5>
                        </div>

                        <div id="collapse-D" class="collapse" role="tabpanel" aria-labelledby="heading-D">
                            <div class="card-body">
                                <div class="review-tab" >
                                    <h2 class="mb-4">Review details of your transfer</h2>

                                    <div class="row ">
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-between text-uppercase align-items-center mb-2">
                                                <h6><strong>Transfer details</strong></h6>

                                                <a href="javascript:void(0)" class="text-monospace text-success text-underline" onclick="editTransferDetailFromReviewScreen()">Edit</a>
                                            </div>

                                            <div class="rounded-shadow-box mb-4">
                                                <table class="table mb-0">
                                                    <tr>
                                                        <th>You send</th>

                                                        <td class=" large-text">
                                                            <span id="reviewYouSend">0.00</span>
                                                            <span id="reviewYouSendCurrencyCode">USD</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Total Fees (included)</th>

                                                        <td class="text-grey  small fw-bold">
                                                            <span id="reviewTotalFee">0.00</span>
                                                            <span id="reviewTotalFeeCurrencyCode">USD</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Amount we’ll convert</th>

                                                        <td class="text-grey small fw-bold">
                                                            <span id="reviewAmountConvert">0.00</span>
                                                            <span id="reviewAmountConvertCurrencyCode">USD</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Recipient Gets</th>

                                                        <td class="large-text">
                                                            <span id="reviewRecipientGets">0.00</span>
                                                            <span id="reviewRecipientGetsCurrencyCode">INR</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Should arrive</th>

                                                        <td class="fw-bold ">{{ $arrivingDate }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <div class="d-flex justify-content-between text-uppercase align-items-center mb-2">
                                                <h6><strong>Recipients Details</strong></h6>

                                                <a href="javascript:void(0)" class="text-monospace text-success text-underline" onclick="changeRecipientFromReviewScreen()">Change</a>
                                            </div>

                                            <div class="rounded-shadow-box">
                                                <table class="table mb-0">
                                                    <tr>
                                                        <th>Name</th>

                                                        <td class="grey-text large-text" id="reviewRecipientName">{{ $transactions ? $transactions->recipient->recipient_first_name . ' ' . $transactions->recipient->recipient_last_name : 'Name' }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Email Address</th>

                                                        <td class="grey-text large-text" id="reviewRecipientEmail">{{ $transactions ? $transactions->recipient->recipient_email : 'email@mail.co' }}</td>
                                                    </tr>
                                                </table>

                                                <table id="reviewRecipientData" class="table mb-0">
                                                    @if($transactions)
                                                        @foreach($transactions->recipient->transactionField as $trf)
                                                            <tr>
                                                                <th>{{ $trf->field_name }}</th>

                                                                <td class="grey-text text-right">{{ $trf->field_value }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Reference for recipient</label>

                                                <input type="text" id="review_reference_for_recipient" name="review_reference_for_recipient" class="form-control" placeholder="Type a reference for recipient" value="{{ $transactions ? $transactions->review_reference_for_recipient : '' }}">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" id="reviewContinueBtn" class="btn btn-primary text-uppercase btn-fixwidth mt-2">Confirm and Continue</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="pane-E" class="card tab-pane e" role="tabpanel" aria-labelledby="tab-E">
                        <div class="card-header" role="tab" id="heading-E">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapse-E" data-parent="#content" aria-expanded="false" aria-controls="collapse-E">
                                    Pay
                                </a>
                            </h5>
                        </div>

                        <div id="collapse-E" class="collapse" role="tabpanel" aria-labelledby="heading-E">
                            <div class="card-body">
                                <div class="review-tab" >
                                    <div class="row ">
                                        <div class="col-lg-6 mb-2">
                                            <div class="d-flex justify-content-between text-uppercase align-items-center ">
                                                <h6><strong>Transfer details</strong></h6>

                                                <a href="javascript:void(0)" class="text-monospace text-success text-underline" onclick="editTransferDetailFromPayScreen()">Edit</a>
                                            </div>

                                            <div class="rounded-shadow-box mb-4">
                                                <table class="table mb-0">
                                                    <tr>
                                                        <th>You send</th>

                                                        <td class=" large-text">
                                                            <span id="payYouSend">0.00</span>
                                                            <span id="payYouSendCurrencyCode">USD</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Total Fees (included)</th>

                                                        <td class="text-grey  small fw-bold">
                                                            <span id="payTotalFee">0.00</span>
                                                            <span id="payTotalFeeCurrencyCode">USD</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Amount we’ll convert</th>

                                                        <td class="text-grey small fw-bold">
                                                            <span id="payAmountConvert">0.00</span>
                                                            <span id="payAmountConvertCurrencyCode">USD</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Recipient Gets</th>

                                                        <td class="large-text">
                                                            <span id="payRecipientGets">0.00</span>
                                                            <span id="payRecipientGetsCurrencyCode">INR</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Should arrive</th>

                                                        <td class="fw-bold ">{{ $arrivingDate }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <div class="d-flex justify-content-between text-uppercase align-items-center mb-2">
                                                <h6><strong>Recipients Details</strong></h6>

                                                <a href="javascript:void(0)" class="text-monospace text-success text-underline" onclick="changeRecipientFromPayScreen()">Change</a>
                                            </div>

                                            <div class="rounded-shadow-box">
                                                <table class="table mb-0">
                                                    <tr>
                                                        <th>Name</th>

                                                        <td class="grey-text large-text" id="payRecipientName">{{ $transactions ? $transactions->recipient->recipient_first_name . ' ' . $transactions->recipient->recipient_last_name : 'Name' }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Email Address</th>

                                                        <td class="grey-text large-text" id="payRecipientEmail">{{ $transactions ? $transactions->recipient->recipient_email : 'email@mail.co' }}</td>
                                                    </tr>
                                                </table>

                                                <table id="payRecipientData" class="table mb-0">
                                                    @if($transactions)
                                                        @foreach($transactions->recipient->transactionField as $trf)
                                                            <tr>
                                                                <th>{{ $trf->field_name }}</th>

                                                                <td class="grey-text text-right">{{ $trf->field_value }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h2 class="mb-3">Choose your transfer type</h2>

                                <div class="">
                                    <div class="custom-radio d-lg-flex">
                                        @foreach($fees as $fee)
                                            @if($fee->type == 'manual')
                                                @php
                                                    $id = 'bank';
                                                @endphp
                                            @elseif($fee->type == 'credit')
                                                @php
                                                    $id = 'credit';
                                                @endphp
                                            @elseif($fee->type == 'debit')
                                                @php
                                                    $id = 'debit';
                                                @endphp
                                            @elseif($fee->type == 'zelle')
                                                @php
                                                    $id = 'zelle';
                                                @endphp
                                            @else
                                                @php
                                                    $id = 'manual';
                                                @endphp
                                            @endif

                                            <div class="mr-lg-5 mb-2">
                                                <input type="radio" id="{{ $id }}" name="transfer_type" value="{{ $fee->type }}" data-rate-percentage="{{ $fee->percentage }}" {{ $transactions ? ($fee->type == $transactions->fees_type ? 'selected' : '') : '' }}>

                                                <label for="{{ $id }}" class="box-radio" >
                                                    <h5 class="fw-bold">{{ $transfer[$fee->type] }}</h5>

                                                    <p class="mb-0">Should arrive in seconds.</p>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="d-md-flex mt-3">
                                    <button type="button" id="payContinueBtn" class="mr-lg-4 btn btn-primary btn-fixwidth text-uppercase mb-3" data-recipient-data="">Finish and pay</button>

                                    <a href="{{ route('user.send.enterpayment') }}" class=" btn btn-outline-secondary btn-fixwidth text-uppercase" style="padding-top: 10px;">Cancel this transfer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>

        <div class="container bank-transfer-details d-none" id="bankTransferDetailDiv">
            <div class="Bank-transfer-details p-4">
                <div class="row ">
                    <div class="col-md-8 m-auto">
                        <div class="Ourbank-details-transfer">
                            <h3>Our bank details for this transfer</h3>

                            <div class="Ourbank-details-transfer-inner">
                                <p>
                                    You'll need to do this next bit manually. Tell your bank to make a payment using the details below. We need to receive our money.
                                </p>

                                <a href="javascript:void(0)" onclick="payAnotherWay()">Pay another way</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 m-auto">
                        <div class="Bank-transfer-details-inner">
                            <div class="top-boxs">
                                <h2 class="mb-3 dashboard-title">Bank transfer details </h2>
                            </div>

                            <div class="details-inner-topbox">
                                <div class="details-inner-title">
                                    <h2>Transfer</h2>
                                </div>

                                <div class="details-inner-text">
                                    <div class="details-inner-box">

                                        <div class="details-inner-left">
                                            <div class="inner-boxs">
                                                <p>Payee name</p>

                                                <h6>Egogram</h6>
                                            </div>

                                            <div class="inner-boxs">
                                                <p>Amount to send</p>

                                                <h6>
                                                    <span id="bankTransferDetailAmount">1,000</span>
                                                    <span id="bankTransferDetailCurrencyCode">CHF</span>
                                                </h6>
                                            </div>

                                            <div id="bankTransferDetailData">

                                            </div>
                                        </div>

                                        <div class="details-inner-right">
                                            <div class="inner-boxs">
                                                <p>Use this reference</p>

                                                <h6 id="user_uniq_id">P24487797</h6>
                                            </div>

                                            <div class="inner-boxs">
                                                <p>Our bank address</p>

                                                <h6>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt</h6>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="details-inner-subbox">
                                        <p>EgoGram never takes money automatically from your account.</p>

                                        <p>You can use your bank's online banking of mobile app to make your bank transfer to EgoGram.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 Download-button m-auto">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-primary mb-3 w-100" id="successBankTransfer">I’ve made my bank transfer</button>
                            </div>

                            <div class="col-md-6">
                                <button class="btn btn-primary mb-3 w-100" id="laterBankTransfer">I’ll transfer my money later</button>
                            </div>

                            <div class="col-md-6 m-auto">
                                <button class="btn btn-red mb-3 w-100" id="cancelFullPayment">Cancel this transfer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container d-none" id="stripePayment">
            <h1>Stripe Payment Gateway Integration Example</h1>

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default credit-card-box">
                        <div class="panel-heading display-table" >
                            <div class="row display-tr" >
                                <h3 class="panel-title display-td" >Payment Details</h3>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Name on Card</label>

                                    <input class='form-control' size='4' type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 form-group card required'>
                                    <label class='control-label'>Card Number</label>

                                    <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label>

                                    <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                </div>

                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label>

                                    <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                </div>

                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label>

                                    <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg btn-block" id="payment-form-btn" type="button">Pay Now ($100)</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="zelleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Zelle information</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Zelle Email / Mobile number</label>

                        <input type="text" class="form-control" name="recipient_zelle_confirm" id="recipient_zelle_confirm">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" id="zelleConfirm" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('front/js/stripe.js') }}"></script>

    <script>
        $(document).ready(function() {
            var frontSideUploadProofFlag = 0;
            var backSideUploadProofFlag  = 0;

            calculateTransferAmount();
            $("input[name=transfer_type][value='" + $('#fees option:selected').val() + "']").prop("checked", true);

            $("#amount_send").on("change", function(){
                calculateTransferAmount();
            });

            $("#fees").on("change", function(){
                calculateTransferAmount();

                $("input[name=transfer_type][value='" + $(this).val() + "']").prop("checked", true);
            });

            $("input[name=transfer_type]").on("change", function(){
                $("#fees option[value='" + $(this).val() + "']").prop("selected", true);

                calculateTransferAmount();
            });

            $('#amountContinueBtn').click(function() {
                if($('#remain_amount').text() >= 1) {
                    if($.trim($('#userName').val()) == '') {
                        $('#tab-B').attr('href', '#pane-B');
                        $('#tab-B').attr('data-toggle', 'tab');
                        $('#tab-B').attr('role', 'tab');

                        $("#tab-B").trigger("click");
                    } else {
                        $('#changeYouScreenId').attr('onclick', 'changeYouScreenRecipient()');
                        $('#existUserName').text($('#userName').val());

                        $('#tab-B').attr('href', '#pane-B');
                        $('#tab-B').attr('data-toggle', 'tab');
                        $('#tab-B').attr('role', 'tab');

                        $('#tab-C').attr('href', '#pane-C');
                        $('#tab-C').attr('data-toggle', 'tab');
                        $('#tab-C').attr('role', 'tab');

                        $("#tab-C").trigger("click");
                    }
                } else {
                    alert('Converted amount cannot be less then 1');
                }
            });

            $('#you_dial_code').change(function() {
                $('#you_country').val($(this).val()).attr('selected');
            });

            $('#you_country').change(function() {
                $('#you_dial_code').val($(this).val()).attr('selected');
            });

            $('#youContinueBtn').click(function() {
                var checkYouData = checkYouSectionDataFilled();

                if(checkYouData) {
                    $('#tab-C').attr('href', '#pane-C');
                    $('#tab-C').attr('data-toggle', 'tab');
                    $('#tab-C').attr('role', 'tab');

                    $("#tab-C").trigger("click");
                }
            });

            $('#recipient_country').change(function() {
                selectRecipientCountry($(this).val());
            });

            $('#recipientContinueBtn').click(function() {
                if($('#recipient_country').val() == '') {
                    alert('Please select country');
                } else {
                    var checkRecipientData = checkRecipientSectionDataFilled();

                    if(checkRecipientData) {
                        $('#recipient_zelle_confirm').val($('#recipient_zelle').val());

                        $('.recipients-screen-2').addClass('d-none');
                        $('.recipients-screen-3').removeClass('d-none');

                        $('#tab-C').text('Verification');
                    }
                }
            });

            $('#recipientTransferReasonContinueBtn').click(function() {
                if({{ $user->is_proof_verified }} == {{ Config('constants.is_proof_verified.verified') }}) {
                    $('.recipients-screen-3').addClass('d-none');
                    $('.recipients-screen-4').addClass('d-none');
                    $('.recipients-screen-5').addClass('d-none');
                    $('.recipients-screen-6').removeClass('d-none');

                    $('#verificationContinueBtn').trigger('click');
                    $("#tab-E").trigger("click");
                } else {
                    $('.recipients-screen-3').addClass('d-none');
                    $('.recipients-screen-4').removeClass('d-none');
                }
            });

            $('#recipientsUploadProofContinueBtn').click(function() {
                // $('#load').addClass('active');
                // console.log('in');
                //Upload front image
                if($('#recipientUploadFrontInput').attr('data-front-proof-name') == '') {
                    var imgExt = $('#recipientUploadFrontInput').val().split('.').pop().toLowerCase();

                    if($('#recipientUploadFrontInput').val() == ""){
                        // alert('Please select front side image');
                    } else {
                        if($.inArray(imgExt, ['png','jpg','jpeg']) == -1) {
                            alert('Please select jpg, jpeg, png files only');
                        } else {
                            frontSideUploadProofFlag = 1;
                        }
                    }

                    if(frontSideUploadProofFlag == 1) {
                        var fd    = new FormData();
                        var files = $('#recipientUploadFrontInput')[0].files[0];

                        fd.append('file', files);

                        $.ajax({
                            url: "{{ route('user.send.uploadProof', 1) }}",
                            type: 'POST',
                            async: false,
                            data: fd,
                            headers: {
                               'X-CSRF-Token': $('#csrf_token').val()
                            },
                            cache : false,
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                // alert('File successfully uploaded.');

                                $('#recipientUploadFrontInput').attr('data-front-proof-name', data);

                                $('#recipientUploadFrontInput').val('');
                                frontSideUploadProofFlag = 0;
                            }
                        });
                    }
                }

                // Upload back image
                if($('#recipientUploadBackInput').attr('data-back-proof-name') == '') {
                    var imgExt = $('#recipientUploadBackInput').val().split('.').pop().toLowerCase();

                    if($('#recipientUploadBackInput').val() == ""){
                        // alert('Please select back side image');
                    } else {
                        if($.inArray(imgExt, ['png','jpg','jpeg']) == -1) {
                            alert('Please select jpg, jpeg, png files only');
                        } else {
                            backSideUploadProofFlag = 1;
                        }
                    }

                    if(backSideUploadProofFlag == 1) {
                        var fd    = new FormData();
                        var files = $('#recipientUploadBackInput')[0].files[0];

                        fd.append('file', files);

                        $.ajax({
                            url: "{{ route('user.send.uploadProof', 2) }}",
                            type: 'POST',
                            async: false,
                            data: fd,
                            headers: {
                               'X-CSRF-Token': $('#csrf_token').val()
                            },
                            cache : false,
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                // alert('File successfully uploaded.');

                                $('#recipientUploadBackInput').attr('data-back-proof-name', data);

                                $('#recipientUploadBackInput').val('');
                                backSideUploadProofFlag = 0;
                            }
                        });
                    }
                }

                if($('#recipientUploadFrontInput').attr('data-front-proof-name') == '' || $('#recipientUploadBackInput').attr('data-back-proof-name') == '') {
                    alert('Please upload both front side and back side id proof');
                } else {
                    if($('#isRecipientSelect').val() == '0') {
                        $('#verificationRecipientFirstName').text($('#recipient_first_name').val() + ' ' + $('#recipient_last_name').val());

                        $('#verificationRecipientData').empty();

                        $($('#recipientBankFieldAccordingToCountry :input')).each(function(ind, val) {
                            $('#verificationRecipientData').append(`
                                <tr>
                                    <th>` + $(val).attr('name') + `</th>

                                    <td class="grey-text text-right">` + $(val).val() + `</td>
                                </tr>
                            `);
                        });
                    }

                    $('.recipients-screen-5').addClass('d-none');
                    $('.recipients-screen-6').removeClass('d-none');

                    $('#verificationContinueBtn').trigger('click');
                }

                // $('#load').removeClass('active');
                // console.log('out');
            });

            $('#verificationContinueBtn').click(function() {
                $('#reviewYouSend').text($('#amount_send').val());
                $('#reviewYouSendCurrencyCode').text($('#amount_send_currency_code').text());

                $('#reviewTotalFee').text($('#fee_rate_amount').text());
                $('#reviewTotalFeeCurrencyCode').text($('#amount_send_currency_code').text());

                $('#reviewAmountConvert').text($('#remain_amount').text());
                $('#reviewAmountConvertCurrencyCode').text($('#amount_send_currency_code').text());

                $('#reviewRecipientGets').text($('#amount_get').val());
                $('#reviewRecipientGetsCurrencyCode').text($('#amount_get_currency_code').text());

                if($('#isRecipientSelect').val() == '0') {
                    $('#reviewRecipientName').text($('#recipient_first_name').val() + ' ' + $('#recipient_last_name').val());
                    $('#reviewRecipientEmail').text($('#recipient_email').val());

                    $('#reviewRecipientData').empty();

                    $($('#recipientBankFieldAccordingToCountry :input')).each(function(ind, val) {
                        $('#reviewRecipientData').append(`
                            <tr>
                                <th>` + $(val).attr('name') + `</th>

                                <td class="grey-text large-text">` + $(val).val() + `</td>
                            </tr>
                        `);
                    });
                }

                $('#tab-D').attr('href', '#pane-D');
                $('#tab-D').attr('data-toggle', 'tab');
                $('#tab-D').attr('role', 'tab');

                $("#tab-D").trigger("click");
            });

            $('#reviewContinueBtn').click(function() {
                $('#payYouSend').text($('#amount_send').val());
                $('#payYouSendCurrencyCode').text($('#amount_send_currency_code').text());

                $('#payTotalFee').text($('#fee_rate_amount').text());
                $('#payTotalFeeCurrencyCode').text($('#amount_send_currency_code').text());

                $('#payAmountConvert').text($('#remain_amount').text());
                $('#payAmountConvertCurrencyCode').text($('#amount_send_currency_code').text());

                $('#payRecipientGets').text($('#amount_get').val());
                $('#payRecipientGetsCurrencyCode').text($('#amount_get_currency_code').text());

                if($('#isRecipientSelect').val() == '0') {
                    $('#payRecipientName').text($('#recipient_first_name').val() + ' ' + $('#recipient_last_name').val());
                    $('#payRecipientEmail').text($('#recipient_email').val());

                    $('#payRecipientData').empty();

                    $($('#recipientBankFieldAccordingToCountry :input')).each(function(ind, val) {
                        $('#payRecipientData').append(`
                            <tr>
                                <th>` + $(val).attr('name') + `</th>

                                <td class="grey-text large-text">` + $(val).val() + `</td>
                            </tr>
                        `);
                    });
                }

                $('#tab-E').attr('href', '#pane-E');
                $('#tab-E').attr('data-toggle', 'tab');
                $('#tab-E').attr('role', 'tab');

                $("#tab-E").trigger("click");
            });

            $('#payContinueBtn').click(function() {
                if($("input[name=transfer_type]:checked").val() == 'manual') {
                    $('#bankTransferDetailPayeeName').text($('#you_first_name').val() + ' ' + $('#you_last_name').val());
                    $('#bankTransferDetailAmount').text($('#amount_send').val());
                    $('#bankTransferDetailCurrencyCode').text($('#amount_send_currency_code').text());

                    $('#bankTransferDetailData').empty();

                    $('#user_uniq_id').text('{{ $user->user_uniqu_id }}');

                    @if($user->bankField)
                        @foreach($user->bankField->bankFieldOption as $ubfo)
                            $('#bankTransferDetailData').append(`
                                <div class="inner-boxs">
                                    <p>{{ $ubfo->field_name }}</p>

                                    <h6>{{ $ubfo->field_value }}</h6>
                                </div>
                            `);
                        @endforeach
                    @endif

                    $('.sendmoney-tabs').addClass('d-none');
                    $('.bank-transfer-details').removeClass('d-none');
                } else if($("input[name=transfer_type]:checked").val() == 'credit') {
                    // alert('Credit Card');

                    $('#sendmoneyTabs').addClass('d-none');
                    $('#stripePayment').removeClass('d-none');
                } else if($("input[name=transfer_type]:checked").val() == 'debit') {
                    // alert('Debit Card');

                    $('#sendmoneyTabs').addClass('d-none');
                    $('#stripePayment').removeClass('d-none');
                } else if($("input[name=transfer_type]:checked").val() == 'zelle') {
                    $('#zelleModal').modal('show');
                }
            });

            $('#zelleConfirm').click(function() {
                if($('#recipient_zelle_confirm').val() != '') {
                    $('#user_uniq_id').text('{{ $user->user_uniqu_id }}');

                    $('#bankTransferDetailData').append(`
                        <div class="inner-boxs">
                            <p>Zelle Description</p>

                            <h6>{{ $zelle->zelle_description }}</h6>
                        </div>
                    `);

                    $('#zelleModal').modal('hide');

                    $('.sendmoney-tabs').addClass('d-none');
                    $('.bank-transfer-details').removeClass('d-none');
                } else {
                    alert('Please fill zelle details.');
                }
            });

            $('#successBankTransfer').click(function() {
                submitBankTransfer('pending');
            });

            $('#laterBankTransfer').click(function() {
                submitBankTransfer('later');
            });

            $('#uploadAnotherImageFront').click(function() {
                $('.image-upload-wrap-front').show();
                $('.file-upload-content-front').hide();

                $('#recipientUploadFrontInput').val('');
                $('#recipientUploadFrontInput').attr('data-front-proof-name', '');

                $('#recipientUploadFrontInput').trigger('click');
            });

            $('#uploadAnotherImageBack').click(function() {
                $('.image-upload-wrap-back').show();
                $('.file-upload-content-back').hide();

                $('#recipientUploadBackInput').val('');
                $('#recipientUploadBackInput').attr('data-back-proof-name', '');

                $('#recipientUploadBackInput').trigger('click');
            });

            $('#cancelFullPayment').click(function() {
                window.location.href = '{{ route('user.send.enterpayment') }}';
            });

            @if($transactions) {
                $('.recipients-screen-1').addClass('d-none');
                $('.recipients-screen-2').addClass('d-none');
                $('.recipients-screen-3').addClass('d-none');
                $('.recipients-screen-4').addClass('d-none');
                $('.recipients-screen-5').addClass('d-none');
                $('.recipients-screen-6').removeClass('d-none');

                $("#tab-E").trigger("click");
            }
            @endif

            //Stripe
            $("#payment-form-btn").click(function() {
                Stripe.setPublishableKey('{{ env('STRIPE_KEY') }}');
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            });
        });

        function stripeResponseHandler(status, response) {
            $.ajax({
                url: "{{ route('user.send.stripe.post') }}",
                type: 'POST',
                async: false,
                data: {
                    stripeToken: response['id'],
                },
                headers: {
                   'X-CSRF-Token': $('#csrf_token').val()
                },
                success: function(data) {
                    window.location.href = '{{ route('user.allActivity') }}';
                },
                error: function(jqXHR, exception) {
                    alert(jqXHR.responseJSON.message);
                }
            });
        }

        function submitBankTransfer(status) {
            var transaction_id = '';
            @if($transactions)
                transaction_id = {{ $transactions->id }};
            @endif

            var arrRecipientFieldData = [];
            if($('#recipientBankFieldAccordingToCountry').children().length > 0) {
                $($('#recipientBankFieldAccordingToCountry :input')).each(function(ind, val) {
                    arrRecipientFieldData.push({
                        field_name: $(val).attr('name'),
                        field_value: $(val).val(),
                    });
                });
            }

            var recipientZelle = $('#recipient_zelle_confirm').val();
            if($('#recipient_id').val() == '') {
                if($('#recipient_country').val() != {{ Config('constants.us_country_id') }}) {
                    recipientZelle = '';
                }
            }

            var sbmtData = {
                user_id                        : {{ $userId }},
                recipient_id                   : $('#recipient_id').val(),
                you_send                       : $('#amount_send').val(),
                send_currency_code             : $('#amount_send_currency_code').text(),
                fees_type                      : $('#fees').val(),
                fee_rate_amount                : $('#fee_rate_amount').text(),
                remain_amount                  : $('#remain_amount').text(),
                amount_get                     : $('#amount_get').val(),
                get_currency_code              : $('#amount_get_currency_code').text(),
                you_first_name                 : $('#you_first_name').val(),
                you_last_name                  : $('#you_last_name').val(),
                you_dob_day                    : $('#you_dob_day').val(),
                you_dob_month                  : $('#you_dob_month').val(),
                you_dob_year                   : $('#you_dob_year').val(),
                you_dial_code                  : $('#you_dial_code option:selected').text(),
                you_phone_number               : $('#you_phone_number').val(),
                you_country_id                 : $('#you_country').val(),
                you_address                    : $('#you_address').val(),
                // you_suburb                     : $('#you_suburb').val(),
                you_postcode                   : $('#you_postcode').val(),
                you_state                      : $('#you_state').val(),
                recipient_country_id           : $('#recipient_country').val(),
                recipient_email                : $('#recipient_email').val(),
                recipient_first_name           : $('#recipient_first_name').val(),
                recipient_last_name            : $('#recipient_last_name').val(),
                recipient_zelle                : recipientZelle,
                recipient_field_data           : arrRecipientFieldData,
                recipient_transfer_reason      : $('#recipient_transfer_reason').val(),
                recipient_upload_front_input   : $('#recipientUploadFrontInput').attr('data-front-proof-name'),
                recipient_upload_back_input    : $('#recipientUploadBackInput').attr('data-back-proof-name'),
                review_reference_for_recipient : $('#review_reference_for_recipient').val(),
                status                         : status,
                transaction_id                 : transaction_id,
            };

            $.ajax({
                url: "{{ route('user.send.submitBankTransfer') }}",
                type: 'POST',
                async: false,
                data: sbmtData,
                headers: {
                   'X-CSRF-Token': $('#csrf_token').val()
                },
                success: function(data) {
                    alert('Transfer successfull.');

                    window.location.href = '{{ route('user.allActivity') }}';
                }
            });

            return true;
        }

        function calculateTransferAmount() {
            // $('#load').addClass('active');
            // console.log('in');
            // return true;
            var amountSend = $('#amount_send').val();

            var fees     = $('#fees').val();
            var feesRate = $('#fees option:selected').attr('data-rate-percentage');

            var feeRateAmount      = amountSend * feesRate / 100;
            var finalFeeRateAmount = feeRateAmount.toFixed(2);

            var remainAmount      = amountSend - finalFeeRateAmount;
            var finalRemainAmount = remainAmount.toFixed(2);

            $.ajax({
                url: "{{ url('api/exchange_currency_rate') }}",
                type: 'POST',
                async: false,
                data: {
                    _token: '{{ csrf_field() }}',
                    amount: finalRemainAmount,
                    from_currency_code: $('#amount_send_currency_code').text(),
                    to_currency_code: $('#amount_get_currency_code').text(),
                },
                success: function(data) {
                    $('#amount_get').val(data.exchange);
                    $('#convert_rate').text(data.convertRate);
                }
            });

            $('.related_currency_code').text($('#amount_send_currency_code').text());

            $('#fee_rate_amount').text(finalFeeRateAmount);
            $('#remain_amount').text(finalRemainAmount);

            // Review screen data update
            $('#reviewYouSend').text(amountSend);
            $('#reviewYouSendCurrencyCode').text($('#amount_send_currency_code').text());

            $('#reviewTotalFee').text(finalFeeRateAmount);
            $('#reviewTotalFeeCurrencyCode').text($('#amount_send_currency_code').text());

            $('#reviewAmountConvert').text(finalRemainAmount);
            $('#reviewAmountConvertCurrencyCode').text($('#amount_send_currency_code').text());

            $('#reviewRecipientGets').text($('#amount_get').val());
            $('#reviewRecipientGetsCurrencyCode').text($('#amount_get_currency_code').text());

            // Pay screen data update
            $('#payYouSend').text(amountSend);
            $('#payYouSendCurrencyCode').text($('#amount_send_currency_code').text());

            $('#payTotalFee').text(finalFeeRateAmount);
            $('#payTotalFeeCurrencyCode').text($('#amount_send_currency_code').text());

            $('#payAmountConvert').text(finalRemainAmount);
            $('#payAmountConvertCurrencyCode').text($('#amount_send_currency_code').text());

            $('#payRecipientGets').text($('#amount_get').val());
            $('#payRecipientGetsCurrencyCode').text($('#amount_get_currency_code').text());

            // $('#load').removeClass('active');
            // console.log('out');
        }

        function changeYouScreen() {
            $('.you-screen-1').addClass('d-none');
            $('.you-screen-2').removeClass('d-none');
        }

        function changeYouScreenRecipient() {
            $("#tab-C").trigger("click");
        }

        function checkYouSectionDataFilled() {
            var you_first_name   = $('#you_first_name').val();
            var you_last_name    = $('#you_last_name').val();
            var you_phone_number = $('#you_phone_number').val();
            var you_address      = $('#you_address').val();
            var you_postcode     = $('#you_postcode').val();
            var you_state        = $('#you_state').val();

            var you_first_name_flage   = 0;
            var you_last_name_flage    = 0;
            var you_phone_number_flage = 0;
            var you_address_flage      = 0;
            var you_postcode_flage     = 0;
            var you_state_flage        = 0;

            if(you_first_name) {
                you_first_name_flage = 1;
            }

            if(you_last_name) {
                you_last_name_flage = 1;
            }

            if(you_phone_number) {
                you_phone_number_flage = 1;
            }

            if(you_address) {
                you_address_flage = 1;
            }

            if(you_postcode) {
                you_postcode_flage = 1;
            }

            if(you_state) {
                you_state_flage = 1;
            }

            if(you_first_name_flage == 1 && you_last_name_flage == 1 && you_phone_number_flage == 1 && you_address_flage == 1 && you_postcode_flage == 1 && you_state_flage == 1) {
                return true;
            } else {
                alert('Please fill proper data');

                return false;
            }
        }

        function changeRecipientsScreen1(text) {
            $('#isRecipientSelect').val('0');

            $('#sendRecipientText').text(text);

            var userCountryId = {{ $user->country }};
            if($.trim($('#userName').val()) == '') {
                userCountryId = $('#you_country').val();
            }

            $("#recipient_country option[value='" + userCountryId + "']").prop("selected", true);

            selectRecipientCountry(userCountryId);

            $('.recipients-screen-1').addClass('d-none');
            $('.recipients-screen-2').removeClass('d-none');
        }

        function checkRecipientSectionDataFilled() {
            var recipient_first_name = $('#recipient_first_name').val();
            var recipient_last_name  = $('#recipient_last_name').val();
            var recipient_email      = $('#recipient_email').val();
            // var recipient_zelle      = $('#recipient_zelle').val();

            var recipient_first_name_flage = 0;
            var recipient_last_name_flage  = 0;
            var recipient_email_flage      = 0;
            // var recipient_zelle_flage      = 0;

            if(recipient_first_name) {
                recipient_first_name_flage = 1;
            }

            if(recipient_last_name) {
                recipient_last_name_flage = 1;
            }

            if(recipient_email) {
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

                if(emailReg.test(recipient_email)) {
                    recipient_email_flage = 1;
                }
            }

            // if($('#recipient_country').val() == {{ Config('constants.us_country_id') }}) {
            //     if(recipient_zelle) {
            //         recipient_zelle_flage = 1;
            //     }
            // } else {
            //     recipient_zelle_flage = 1;
            // }

            var inputValueArrFlag = [];

            if($('#recipientBankFieldAccordingToCountry').children().length > 0) {
                $($('#recipientBankFieldAccordingToCountry :input')).each(function(ind, val) {
                    var inputValue = $(val).val();

                    if(inputValue) {
                        inputValueArrFlag.push(1);
                    } else {
                        inputValueArrFlag.push(0);
                    }
                });
            } else {
                alert('Please select valid country');

                return false;
            }

            if(recipient_first_name_flage == 1 && recipient_last_name_flage == 1 && recipient_email_flage == 1 /*&& recipient_zelle_flage == 1*/ && jQuery.inArray(0, inputValueArrFlag) == -1) {
                return true;
            } else {
                alert('Please fill proper data');

                return false;
            }
        }

        function recipientsUploadProof(text) {
            $('#recipient_upload_title_text').text(text);
            $('#recipient_upload_description_text').text(text);
            $('#recipient_upload_div_front_title_text').text(text);
            $('#recipient_upload_div_front_description_text').text(text);
            $('#recipient_upload_div_back_title_text').text(text);
            $('#recipient_upload_div_back_description_text').text(text);

            $('.recipients-screen-4').addClass('d-none');
            $('.recipients-screen-5').removeClass('d-none');
        }

        function recipientsChooseDifferentAccount() {
            $('#recipientUploadFrontInput').attr('data-front-proof-name', '');
            $('#recipientUploadBackInput').attr('data-back-proof-name', '');

            $('#recipientUploadFrontInput').val('');
            $('#recipientUploadBackInput').val('');

            $('.image-upload-wrap-front').show();
            $('.file-upload-content-front').hide();

            $('.image-upload-wrap-back').show();
            $('.file-upload-content-back').hide();

            $('.recipients-screen-5').addClass('d-none');
            $('.recipients-screen-4').removeClass('d-none');
        }

        function selectAnotherRecipient() {
            $('#recipientUploadFrontInput').attr('data-front-proof-name', '');
            $('#recipientUploadBackInput').attr('data-back-proof-name', '');

            $('.image-upload-wrap-front').show();
            $('.file-upload-content-front').hide();

            $('.image-upload-wrap-back').show();
            $('.file-upload-content-back').hide();

            $('.recipients-screen-6').addClass('d-none');
            $('.recipients-screen-1').removeClass('d-none');
        }

        function changeRecipientFromReviewScreen() {
            $('#recipientUploadFrontInput').attr('data-front-proof-name', '');
            $('#recipientUploadBackInput').attr('data-back-proof-name', '');

            $('.image-upload-wrap-front').show();
            $('.file-upload-content-front').hide();

            $('.image-upload-wrap-back').show();
            $('.file-upload-content-back').hide();

            $('#tab-D').removeAttr('href');
            $('#tab-D').removeAttr('data-toggle');
            $('#tab-D').removeAttr('role');

            $('#tab-C').attr('href', '#pane-C');
            $('#tab-C').attr('data-toggle', 'tab');
            $('#tab-C').attr('role', 'tab');

            $("#tab-C").trigger("click");

            $('.recipients-screen-6').addClass('d-none');
            $('.recipients-screen-1').removeClass('d-none');
        }

        function changeRecipientFromPayScreen() {
            $('#recipientUploadFrontInput').attr('data-front-proof-name', '');
            $('#recipientUploadBackInput').attr('data-back-proof-name', '');

            $('.image-upload-wrap-front').show();
            $('.file-upload-content-front').hide();

            $('.image-upload-wrap-back').show();
            $('.file-upload-content-back').hide();

            $('#tab-D').removeAttr('href');
            $('#tab-D').removeAttr('data-toggle');
            $('#tab-D').removeAttr('role');

            $('#tab-E').removeAttr('href');
            $('#tab-E').removeAttr('data-toggle');
            $('#tab-E').removeAttr('role');

            $('#tab-C').attr('href', '#pane-C');
            $('#tab-C').attr('data-toggle', 'tab');
            $('#tab-C').attr('role', 'tab');

            $("#tab-C").trigger("click");

            $('.recipients-screen-6').addClass('d-none');
            $('.recipients-screen-1').removeClass('d-none');
        }

        function selectRecipientCountry(countryId) {
            if(countryId == {{ Config('constants.us_country_id') }}) {
                $('#zelleDiv').show();
            } else {
                $('#zelleDiv').hide();
            }

            $.ajax({
                url: "{{ route('user.send.getBankFields') }}",
                type: 'POST',
                async: false,
                data: {
                    country_id: countryId,
                },
                headers: {
                   'X-CSRF-Token': $('#csrf_token').val()
                },
                success: function(data) {
                    if(data == '') {
                        $('#recipientBankFieldAccordingToCountry').empty();
                    } else {
                        $('#recipientBankFieldAccordingToCountry').empty();

                        $(data.bank_field_option).each(function(ind, val) {
                            var fieldType = ``;

                            switch(val.field_type) {
                                case 1:
                                    fieldType += `<input type="text" name="` + val.field_name + `" id="` + val.field_name + `" class="form-control">`;
                                    break;
                                case 2:
                                    fieldType += `<input type="number" name="` + val.field_name + `" id="` + val.field_name + `" class="form-control">`;
                                    break;
                                default:
                                    fieldType += `<input type="text" name="recipient_account_number" id="recipient_account_number" class="form-control">`;
                            }

                            $('#recipientBankFieldAccordingToCountry').append(`
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>` + val.field_name + `</label>

                                        `+ fieldType +`
                                    </div>
                                </div>
                            `);
                        });
                    }
                }
            });
        }

        function editTransferDetailFromReviewScreen() {
            $("#tab-A").trigger("click");
        }

        function editTransferDetailFromPayScreen() {
            $("#tab-A").trigger("click");
        }

        function goToVerificationScreen(recipient) {
            $('#isRecipientSelect').val('1');

            $('#payContinueBtn').attr('data-recipient-data', JSON.stringify(recipient));

            $('#recipient_zelle_confirm').val(recipient.recipient_zelle);

            // On recipient screen
            $('#reviewRecipientName').text(recipient.recipient_first_name + ' ' + recipient.recipient_last_name);
            $('#reviewRecipientEmail').text(recipient.recipient_email);

            $('#reviewRecipientData').empty();

            $(recipient.transaction_field).each(function(ind, val) {
                $('#reviewRecipientData').append(`
                    <tr>
                        <th>` + val.field_name + `</th>

                        <td class="grey-text large-text">` + val.field_value + `</td>
                    </tr>
                `);
            });

            // on pay screen
            $('#payRecipientName').text(recipient.recipient_first_name + ' ' + recipient.recipient_last_name);
            $('#payRecipientEmail').text(recipient.recipient_email);

            $('#payRecipientData').empty();

            $(recipient.transaction_field).each(function(ind, val) {
                $('#payRecipientData').append(`
                    <tr>
                        <th>` + val.field_name + `</th>

                        <td class="grey-text large-text">` + val.field_value + `</td>
                    </tr>
                `);
            });

            // On verification screen
            $('#verificationRecipientFirstName').text(recipient.recipient_first_name + ' ' + recipient.recipient_last_name);

            $('#verificationRecipientData').empty();

            $(recipient.transaction_field).each(function(ind, val) {
                $('#verificationRecipientData').append(`
                    <tr>
                        <th>` + val.field_name + `</th>

                        <td class="grey-text text-right">` + val.field_value + `</td>
                    </tr>
                `);
            });

            $('.recipients-screen-1').addClass('d-none');
            $('.recipients-screen-3').removeClass('d-none');

            $('#recipient_id').val(recipient.id);

            $('#tab-C').text('Verification');
        }

        function payAnotherWay() {
            $('#bankTransferDetailDiv').addClass('d-none');
            $('#sendmoneyTabs').removeClass('d-none');
        }
    </script>
@endsection
