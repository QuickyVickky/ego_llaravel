@extends('admin.layouts.master')
@section('title','Transaction |')

@section('css')
    <link href="{{ asset('admin/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/apps/invoice.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/elements/avatar.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />

    <style>
        /* The Modal (background) */
        .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
          margin: auto;
          display: block;
          width: 80%;
          max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
          margin: auto;
          display: block;
          width: 80%;
          max-width: 700px;
          text-align: center;
          color: #ccc;
          padding: 10px 0;
          height: 150px;
        }

        /* Add Animation */
        .modal-content, #caption {
          -webkit-animation-name: zoom;
          -webkit-animation-duration: 0.6s;
          animation-name: zoom;
          animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
          from {-webkit-transform:scale(0)}
          to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
          from {transform:scale(0)}
          to {transform:scale(1)}
        }

        /* The Close Button */
        .close-pop {
          position: absolute;
          top: 15px;
          right: 35px;
          color: #f1f1f1;
          font-size: 40px;
          font-weight: bold;
          transition: 0.3s;
        }

        .close-pop:hover,
        .close-pop:focus {
          color: #bbb;
          text-decoration: none;
          cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
          .modal-content {
            width: 100%;
          }
        }

        .sender_info .in-heading{
            color: #1b55e2;
            font-weight: 600;
            margin-bottom: 15px;
        }
        .sender_info .in-heading .inv-subtitle{
            margin-bottom: 0;
            font-weight: 700;
            font-size: 14px;
        }


        @media only screen and (max-width: 768px){
            .sender_info{
                margin: 15px 0;
            }
            }
        }
    </style>
@endsection

@section('breadcrumbs')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">Transaction</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>Transaction detail</span></li>
        </ol>
    </nav>
@endsection

@section('content')

    <div class="row invoice layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="doc-container">
                <div class="invoice-container">
                    <div class="invoice-inbox">
                        <div class="invoice-header-section" style="display: block;">
                            <h4 class="inv-number">Transaction detail
                                <span style="color: #000">#{{ $data['id'] }}</span>
                            </h4>
                        </div>

                        <div class="content-section  animated animatedFadeInUp fadeInUp row">
                            <div class="inv--head-section col-md-3 col-12" style="margin-bottom: unset;">
                                <div class="">
                                    <h4 class="in-heading">Sender</h4>

                                    <div class="">
                                        <p class="inv-customer-name" style="color: #1b55e2;margin-bottom: 0;font-weight: 700;">
                                            {{ $data['sender_name'] }}
                                        </p>
                                        <p class="inv-street-addr" style="margin-bottom: 0;font-weight: 600;margin-bottom: 2px;font-size: 13px;">
                                            {{ $data['sender_address'] }}
                                        </p>
                                        <p class="inv-email-address" style="margin-bottom: 0;">
                                            {{ $data['sender_email'] }}
                                        </p>
                                        <p class="inv-email-address" style="margin-bottom: 0;">
                                            {{ $data['sender_phone'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5 sender_info">
                                <h6 class="in-heading">Sender Info</h6>

                                <div class="row">
                                    <div class="col-sm-5 col-12 payment-trans-col-sm-6">
                                        <p class=" inv-subtitle" style="font-weight: 700;font-size: 14px;">User Reference ID</p>
                                    </div>

                                    <div class="col-sm-7 col-12 payment-trans-col-sm-6">
                                        <p class="" style="margin-bottom: 0;">{{ $data['user_uniqu_id'] }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-5 col-12 payment-trans-col-sm-6">
                                        <p class=" inv-subtitle" style="font-weight: 700;font-size: 14px;">Is Proof Verified?</p>
                                    </div>

                                    <div class="col-sm-7 col-12 payment-trans-col-sm-6">
                                        <p class="" style="margin-bottom: 0;">
                                            @if($data['is_proof_verified'] == Config('constants.is_proof_verified.verified'))
                                                <span class="badge outline-badge-success">Verified</span>
                                            @else
                                                <span class="badge outline-badge-danger" onclick="changeVerifiedStatus({{ $data['id'] }}, {{ $data['user_id'] }})" style="cursor: pointer;">
                                                    Not Verified
                                                </span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="avatar avatar-xl">
                                            <img alt="avatar" id="frontImg" src="{{ $data['recipient_upload_front_input'] }}" class="rounded" style="cursor: pointer;">
                                        </div>

                                        <div class="" style="margin: auto;">
                                            <p class="mt-2">Front side proof</p>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 back_side_img_center">
                                        <div class="avatar avatar-xl">
                                            <img alt="avatar" id="backImg" src="{{ $data['recipient_upload_back_input'] }}" class="rounded" style="cursor: pointer;">
                                        </div>

                                        <div class="" style="margin: auto;">
                                            <p class="mt-2">Back side proof</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row inv--product-table-section col-12">
                                <div class="col-12">
                                    <form method="post" action="{{ route('admin.changeTransactionStatus') }}">
                                        @csrf

                                        <input type="hidden" name="transaction_id" value="{{ $data['id'] }}">
                                        <input type="hidden" name="user_id" value="{{ $data['user_id'] }}">

                                        <div class="table-responsive">
                                            <table class="table" style="margin-bottom: unset;">
                                                <thead class="">
                                                    <tr>
                                                        <th scope="col">Transfer Type</th>
                                                        <th scope="col">Transfer Amount</th>
                                                        <th scope="col">Received Amount</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td>{{ Config('constants.FeesType.'.$data['fee_type']) }}</td>
                                                        <td>{{ $data['transfer_amount'] }}</td>
                                                        <td>{{ $data['recieved_amount'] }}</td>
                                                        <td>
                                                            <select class="form-control" id="exampleFormControlSelect1" name="transaction_status">
                                                                @foreach($data['transactionStatus'] as $key => $ts)
                                                                    <option value="{{ $key }}" {{ $key == $data['status'] ? 'selected' : '' }}>{{ $ts }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            @if($data['status'] != 'complete' && $data['status'] != 'refund' && $data['is_proof_verified'] == Config('constants.is_proof_verified.verified'))
                                                                <button class="btn btn-success btn-sm">Submit</button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="row col-12">
                                <div class="inv--detail-section col-md-3 col-12 ">
                                    <div class="align-self-center">
                                        <div class="company-info">
                                            <h4 class="in-heading">Reciever</h4>
                                        </div>
                                    </div>

                                    <div class="align-self-center order-2">
                                        <p class="inv-customer-name">{{ $data['recipient_name'] }}</p>
                                        <p class="inv-email-address">{{ $data['recipient_email'] }}</p>
                                    </div>
                                </div>

                                <div class="col-md-5 col-12 order-sm-0 order-1">
                                    <div class="inv--payment-info">
                                        <div class="row">
                                            <div class="col-sm-12 col-12">
                                                <h6 class=" inv-title">Receiver Bank Info</h6>
                                            </div>
                                        </div>

                                        @if($data['recipient_zelle'])
                                            <div class="row">
                                                <div class="col-sm-5 col-12 payment-trans-col-sm-6">
                                                    <p class=" inv-subtitle" style="margin-bottom: 0;">Zelle info</p>
                                                </div>

                                                <div class="col-sm-7 col-12 payment-trans-col-sm-6">
                                                    <p class="" style="margin-bottom: 0;">{{ $data['recipient_zelle'] }}</p>
                                                </div>
                                            </div>
                                        @endif

                                        @foreach($data['arrBankField'] as $abf)
                                            <div class="row">
                                                <div class="col-sm-5 col-12 payment-trans-col-sm-6">
                                                    <p class=" inv-subtitle" style="margin-bottom: 0;">{{ $abf['field_name'] }}</p>
                                                </div>

                                                <div class="col-sm-7 col-12 payment-trans-col-sm-6">
                                                    <p class="" style="margin-bottom: 0;">{{ $abf['field_value'] }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-md-4 col-12 order-sm-1 order-0 text-left">
                                    <div class="inv--payment-info" style="margin-bottom: unset;">
                                        <div class="row">
                                            <div class="col-sm-12 col-12">
                                                <h6 class=" inv-title">Extra Info</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="inv--total-amounts">
                                        <div class="row">
                                            <div class="col-sm-5 col-12">
                                                <p class="" style="margin-bottom: 0;">Transfer Reason</p>
                                            </div>

                                            <div class="col-sm-7 col-12">
                                                <p class="" style="margin-bottom: 0;">{{ $data['recipient_transfer_reason'] }}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-5 col-12">
                                                <p class="" style="margin-bottom: 0;">Reference</p>
                                            </div>

                                            <div class="col-sm-5 col-12">
                                                <p class="" style="margin-bottom: 0;">{{ $data['review_reference_for_recipient'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal" style="z-index: 9999;">
        <span class="close-pop">&times;</span>
        <img class="modal-content" id="img01">
    </div>

@endsection

@section('js')
    {{-- <script src="{{ asset('admin/assets/js/apps/invoice.js') }}"></script> --}}
    <script src="{{ asset('admin/plugins/sweetalerts/sweetalert2.min.js') }}"></script>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var imgFront = document.getElementById("backImg");
        var imgBack = document.getElementById("frontImg");
        var modalImg = document.getElementById("img01");

        imgFront.onclick = function(){
          modal.style.display = "block";
          modalImg.src = this.src;
        }

        imgBack.onclick = function(){
          modal.style.display = "block";
          modalImg.src = this.src;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close-pop")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        function changeVerifiedStatus(transactionId, userId) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, verified it!',
                cancelButtonText: 'No, rejected!',
                padding: '2em'
            }).then(function(result) {
                var url = "{{ url('backend/change-proof-verified-status') }}";

                if (result.value) {
                    window.location.href = url + '/' + transactionId + '/' + userId + '/' + "{{ Config('constants.is_proof_verified.verified') }}";
                } else if (result.dismiss === swal.DismissReason.cancel) {
                    window.location.href = url + '/' + transactionId + '/' + userId + '/' + "{{ Config('constants.is_proof_verified.notVerified') }}";
                }
            });
        }
    </script>
@endsection
