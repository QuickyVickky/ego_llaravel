@extends('user.master')
@section('title','All Activity')

@section('styles')
    <style>
        .card .card-header {
            display: block;
        }

        .collapse:not(.show) {
            display: none;
        }

        .opacity {
            opacity: .65;
        }
    </style>
@endsection

@section('content')
    @include('user.send_header')

    <main class="dashboard-body">
        @if($newArray)
            @foreach($newArray as $na)
                <div class="activity-details">
                    <div class="day-row">
                        <span>{{ $na['created_at'] }}</span>
                    </div>

                    <div class="transaction-block">
                        <div class="accordion" id="faq">
                            @foreach($na['transaction'] as $trns)
                                <div class="card">
                                    <div class="card-header {{ $trns['status'] == 'cancel' || $trns['status'] == 'refund' ? 'opacity' : '' }}" id="faqhead{{ $trns['id'] }}">
                                        <a href="#" class="btn btn-header-link " data-toggle="collapse" data-target="#faq{{ $trns['id'] }}" aria-expanded="false" aria-controls="faq{{ $trns['id'] }}">
                                            <div class="row no-gutters p-3 pl-lg-4 border-bottom">
                                                <div class="col-md-1">
                                                    <div class="send-icon">
                                                        @if($trns['status'] == 'later')
                                                            <img src="{{ asset('images/info.svg') }}" alt="info" />
                                                        @else
                                                            <img src="{{ asset('images/send-arrow.svg') }}" alt="send-arrow" />
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md">
                                                    <div class="d-wrap">
                                                        <label class="small text-grey">To</label>

                                                        <h5 class="fw-bold mb-0">{{ $trns['name'] }}</h5>
                                                    </div>
                                                </div>

                                                <div class="col-md">
                                                    <div class="d-wrap">
                                                        <label class="small text-grey"></label>
                                                        <h5 class="fw-bold mb-0"></h5>
                                                    </div>
                                                </div>

                                                <div class="col-md">
                                                    <div class="d-wrap">
                                                        <label class="small text-grey">STATUS</label>
                                                        <h5 class="fw-bold text-success mb-0">{{ $trns['status'] }}</h5>
                                                    </div>
                                                </div>

                                                <div class="col-md">
                                                    <div class="d-wrap">
                                                        {{-- <label class="small text-grey">{{ $trns['get_currency_code'] }}</label>

                                                        <h5 class="fw-bold text-primary mb-0">{{ $trns['get_amount'] }}</h5> --}}

                                                        <h5 class="fw-bold text-primary mb-0">
                                                            <label class="small text-grey">{{ $trns['get_currency_code'] }}</label>

                                                            {{ $trns['get_amount'] }}
                                                        </h5>

                                                        <h6 class="fsmall text-grey mb-0">
                                                            <label class="small text-grey">{{ $trns['send_currency_code'] }} {{ $trns['send_amount'] }}</label>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div id="faq{{ $trns['id'] }}" class="collapse" aria-labelledby="faqhead{{ $trns['id'] }}" data-parent="#faq">
                                        @if($trns['status'] == 'later')
                                            <div class="card-body" style="padding-left: 115px;">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="sending-paused">
                                                            <img src="{{ asset('images/paused.svg') }}">

                                                            <h3>Sending paused</h3>
                                                        </div>

                                                        <div class="sending-paused-button">
                                                            <a href="{{ route('user.send.enterpayment', $trns['id']) }}" id="howToPayBtn" class="btn btn-outline submit-btn">Choose how to pay</a>

                                                            <button type="button" id="paidBtn" class="btn btn-primary submit-btn" style="margin-bottom: 15px;" data-transaction-id="{{ $trns['id'] }}">I've now paid</button>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="dropdown Cancelled-dropdown">
                                                            <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <img src="{{ asset('images/More Square.svg') }}">
                                                            </a>

                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                                <a class="dropdown-item" href="javascript:void(0)">
                                                                    <img src="{{ asset('images/Paper.svg') }}">

                                                                    <span id="viewtransferDetail" data-toggle="modal" data-target="#transferDetailModal" data-id="{{ $trns['id'] }}" data-transaction-info="{{ json_encode($trns) }}">View transfer details</span>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <button type="button" id="cancelBtn" class="btn btn-outline Cancel-transfer" data-toggle="modal" data-target="#CancelTransfer" data-id="{{ $trns['id'] }}">Cancel transfer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="card-body">
                                                <div class="timeline ">
                                                    <div class="timeline-item {{ $trns['panding_date'] ? 'active' : '' }}">
                                                        <div class="timeline-left">
                                                            <header>You set up your transfer</header>

                                                            <p>{{ $trns['panding_date'] }}</p>
                                                        </div>

                                                        <div class="timeline-right">
                                                            <i class="far fa-check-circle"></i>
                                                        </div>
                                                    </div>

                                                    <div class="timeline-item {{ $trns['accepted_date'] ? 'active' : '' }}">
                                                        <div class="timeline-left">
                                                            <header>Your money’s on it’s way to us</header>

                                                            <p>{{ $trns['accepted_date'] }}</p>
                                                        </div>

                                                        <div class="timeline-right">
                                                            <i class="far fa-check-circle"></i>
                                                        </div>
                                                    </div>

                                                    <div class="timeline-item {{ $trns['received_date'] ? 'active' : '' }}">
                                                        <div class="timeline-left">
                                                            <header>We received your {{ $trns['send_amount'] . ' ' . $trns['send_currency_code'] }}</header>

                                                            <p>{{ $trns['received_date'] }}</p>
                                                        </div>

                                                        <div class="timeline-right">
                                                            <i class="far fa-check-circle"></i>
                                                        </div>
                                                    </div>

                                                    @if($trns['status'] == 'cancel' || $trns['status'] == 'refund')
                                                        @if($trns['cancel_date'])
                                                            <div class="timeline-item {{ $trns['cancel_date'] ? 'active' : '' }}">
                                                                <div class="timeline-left">
                                                                    <header>We canceled your pay out of {{ $trns['get_amount'] . ' ' . $trns['get_currency_code'] }}</header>

                                                                    <p>{{ $trns['cancel_date'] }}</p>
                                                                </div>

                                                                <div class="timeline-right">
                                                                    <i class="far fa-check-circle"></i>
                                                                </div>
                                                            </div>
                                                        @endif

                                                        @if($trns['refund_date'])
                                                            <div class="timeline-item {{ $trns['refund_date'] ? 'active' : '' }}">
                                                                <div class="timeline-left">
                                                                    <header>We refunded your {{ $trns['send_amount'] . ' ' . $trns['send_currency_code'] }}</header>

                                                                    <p>{{ $trns['refund_date'] }}</p>
                                                                </div>

                                                                <div class="timeline-right">
                                                                    <i class="far fa-check-circle"></i>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @else
                                                        <div class="timeline-item {{ $trns['complete_date'] ? 'active' : '' }}">
                                                            <div class="timeline-left">
                                                                <header>We pay out your {{ $trns['get_amount'] . ' ' . $trns['get_currency_code'] }}</header>

                                                                <p>{{ $trns['complete_date'] }}</p>
                                                            </div>

                                                            <div class="timeline-right">
                                                                <i class="far fa-check-circle"></i>
                                                            </div>
                                                        </div>

                                                        <div class="timeline-item {{ $trns['complete_date'] ? 'active' : '' }}">
                                                            <div class="timeline-left">
                                                                <header>{{ $trns['recipient_name'] }} receive your {{ $trns['get_amount'] . ' ' . $trns['get_currency_code'] }}</header>

                                                                <p>{{ $trns['complete_date'] }}</p>
                                                            </div>

                                                            <div class="timeline-right">
                                                                <i class="far fa-check-circle"></i>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    @if($trns['status'] == 'later' || $trns['status'] == 'pending' || $trns['status'] == 'accepted' || $trns['status'] == 'received')
                                                        <div class="timeline-footer">
                                                            {{-- <button class="btn cancel-transfer" id="cancel-transfer" data-transaction-id="{{ $trns['id'] }}">Cancel transfer</button> --}}

                                                            <button type="button" id="cancelBtn" class="btn cancel-transfer" data-toggle="modal" data-target="#CancelTransfer" data-id="{{ $trns['id'] }}">Cancel transfer</button>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="no-activity">
                <div class="no-activity-inner">
                    <div class="activity-inner-img">
                        <img src=" {{ asset('front/images/No-Activity.svg') }}">
                    </div>

                    <div class="activity-inner-text">
                        <p>This is where you’ll see your activity and transactions. <br>Choose how you’d like to get started.</p>

                        <a href="{{ route('user.send.enterpayment') }}" class="btn btn-primary btn-fixwidth text-uppercase">Send money</a>
                    </div>
                </div>
            </div>
        @endif

        <!-- paginations -->
        {{-- <div class="text-right">
            <div class="pagination">
                {{ $transactions->links() }}
                <div class="current mr-1">2</div>
                <span class="mr-1">of </span> <span class="mr-1">19</span> <a href=""> <i class="fa fa-angle-right ml-2"></i></a>
            </div>
        </div> --}}

        {{-- @if(!empty($transactions))
            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers">
                    {{ $transactions->links() }}
                </div>
            </div>
        @endif --}}
    </main>

    <div class="modal fade" id="CancelTransfer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cancel Transfer #<span id="transferId" data-transaction-id=""></span></h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="pay-box">
                        <div class="custom-radio d-lg-flex">
                            <div class="mr-lg-12 mb-2">
                                <input type="radio" id="bankPay" name="bank_pay" value="1" checked>

                                <label for="bankPay" class="box-radio">
                                    <img src="{{ asset('images/IconlyBulkTick Square.svg') }}">

                                    <h5 class="fw-bold">I paid</h5>
                                </label>
                            </div>
                        </div>

                        <div class="custom-radio d-lg-flex">
                            <div class="mr-lg-12 mb-2">
                                <input type="radio" id="bankPay1" name="bank_pay" value="2">

                                <label for="bankPay1" class="box-radio">
                                    <img src="{{ asset('images/IconlyBulkTickCross.svg') }}">

                                    <h5 class="fw-bold">I didn't pay</h5>
                                </label>
                            </div>
                        </div>

                        <div id="paidDataDiv">
                            <div class="custom-title mb-3">
                                <h6>Where would you like us to refund the money?</h6>
                            </div>

                            <div class="custom-radio d-lg-flex">
                                <div class="mb-2">
                                    <input type="radio" id="bank" name="transfer_type" value="manual" data-rate-percentage="20" checked>

                                    <label for="bank" class="box-radio">
                                        <h5 class="fw-bold">An existing account</h5>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="text-center Cancel-transfer-button">
                            <button type="button" id="cancelTransferBtn" class="btn btn-outline">Cancel transfer</button>
                        </div>
                    </div>
                </div>

                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="modal fade" id="transferDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="top-boxs">
                        <h2 class="mb-3 dashboard-title">Bank transfer details </h2>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="details-inner-connt">
                        <div class="details-inner-title">
                            <h2>Transfer #<span id="transactionTransferId" data-transaction-id=""></span></h2>
                        </div>

                        <div class="details-inner-text">
                            <div class="details-inner-box">
                                <h5>Transfer Overview</h5>

                                <div class="details-inner-left">
                                    <div class="inner-boxs">
                                        <p>From</p>

                                        <h6 id="fromName">User one</h6>
                                    </div>
                                </div>

                                <div class="details-inner-right">
                                    <div class="inner-boxs">
                                        <p>Amount sent</p>

                                        <h6>
                                            <span id="transferOverviewAmountSent">1000</span>
                                            <span id="transferOverviewAmountSentCurrencyCode">USD</span>
                                        </h6>
                                    </div>

                                    <div class="inner-boxs">
                                        <p>Converts to</p>

                                        <h6>
                                            <span id="transferOverviewAmountGet">100,000</span>
                                            <span id="transferOverviewAmountGetCurrencyCode">INR</span>
                                        </h6>
                                    </div>

                                    <div class="inner-boxs">
                                        <p>Fee</p>

                                        <h6>
                                            <span id="transferOverviewFee">100</span>
                                            <span id="transferOverviewFeeCurrencyCode">USD</span>
                                        </h6>
                                    </div>
                                </div>
                            </div>

                            <div class="details-inner-box border-0">
                                <h5>Recipient details</h5>

                                <div class="details-inner-right">
                                    <div class="inner-boxs">
                                        <p>To</p>

                                        <h6 id="toName">User two</h6>
                                    </div>

                                    <div class="inner-boxs">
                                        <p>Email</p>

                                        <h6 id="transferOverviewRecipientEmail">example@gmail.com</h6>
                                    </div>

                                    <div id="transferOverviewRecipientData">
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="details-inner-box border-0">
                                <h5>EgoGram's bank details</h5>

                                <div class="details-inner-left">
                                    <div class="inner-boxs">
                                        <p>To</p>

                                        <h6>EgoGram</h6>
                                    </div>z

                                    <div class="inner-boxs">
                                        <p>Account Number</p>

                                        <h6>19478151053039</h6>
                                    </div>
                                </div>

                                <div class="details-inner-right">
                                    <div class="inner-boxs">
                                        <p>IFSC Code</p>

                                        <h6>BARC0INBBIR</h6>
                                    </div>

                                </div>
                            </div> --}}

                            <div class="text-center Download-button">

                                <a href="javascript:void(0)" class="btn btn-primary mb-3" id="downloadBankTransferPdf" data-transaction-info="" style="justify-content: center;width: 50%;">
                                    <img src="{{ asset('images/Download.svg') }}" >

                                    <span>Download</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-shape">
                        <img src="{{ asset('images/bottom-shape.svg') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('input[name=bank_pay]').change(function() {
                if($(this).val() == 1) {
                    $('#paidDataDiv').show();
                } else {
                    $('#paidDataDiv').hide();
                }
            });

            $('#cancelTransferBtn').click(function() {
                $.ajax({
                    url: "{{ route('user.send.cancelTransfer') }}",
                    type: 'POST',
                    async: false,
                    data: {
                        transaction_id: $('#transferId').attr('data-transaction-id'),
                    },
                    headers: {
                       'X-CSRF-Token': $('#csrf_token').val()
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });

            $('#paidBtn').click(function() {
                $.ajax({
                    url: "{{ route('user.send.paidTransfer') }}",
                    type: 'POST',
                    async: false,
                    data: {
                        transaction_id: $(this).attr('data-transaction-id'),
                    },
                    headers: {
                       'X-CSRF-Token': $('#csrf_token').val()
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });

            $('#cancel-transfer').click(function() {
                $.ajax({
                    url: "{{ route('user.send.cancelTransfer') }}",
                    type: 'POST',
                    async: false,
                    data: {
                        transaction_id: $(this).attr('data-transaction-id'),
                    },
                    headers: {
                       'X-CSRF-Token': $('#csrf_token').val()
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });

            // $('#downloadBankTransferPdf').click(function() {
            //     $.ajax({
            //         url: "{{ route('user.downloadBankTransferPdf') }}",
            //         type: 'POST',
            //         async: false,
            //         data: {
            //             transaction_data: $(this).data('transaction-info'),
            //         },
            //         headers: {
            //            'X-CSRF-Token': $('#csrf_token').val()
            //         },
            //         // xhrFields: {
            //         //     responseType: 'blob'
            //         // },
            //         success: function(response) {
            //             console.log(response);
            //             // alert('Download successfull.');

            //             var blob = new Blob([response]);
            //             var link = document.createElement('a');
            //             link.href = window.URL.createObjectURL(blob);
            //             link.download = "Sample.pdf";
            //             link.click();
            //         }
            //     });
            // });
        });

        $(document).on("click", "#cancelBtn", function () {
            var transactionId = $(this).data('id');

            $("#transferId").text(transactionId);
            $("#transferId").attr('data-transaction-id', transactionId);
        });

        $(document).on("click", "#viewtransferDetail", function () {
            var transactionData = $(this).data('transaction-info');

            var link = "{{ route('user.downloadBankTransferPdf') }}";

            $('#downloadBankTransferPdf').attr('data-transaction-info', JSON.stringify(transactionData));
            $('#downloadBankTransferPdf').attr('href', link+'/'+JSON.stringify(transactionData.id));

            $('#fromName').text(transactionData.user_name);

            $('#transferOverviewAmountSent').text(transactionData.you_send);
            $('#transferOverviewAmountSentCurrencyCode').text(transactionData.send_currency_code);

            $('#transferOverviewAmountGet').text(transactionData.amount_get);
            $('#transferOverviewAmountGetCurrencyCode').text(transactionData.get_currency_code);

            $('#transferOverviewFee').text(transactionData.fee_rate_amount);
            $('#transferOverviewFeeCurrencyCode').text(transactionData.send_currency_code);

            $('#toName').text(transactionData.recipient_name);
            $('#transferOverviewRecipientEmail').text(transactionData.recipient_email);

            $('#transferOverviewRecipientData').empty();

            $(transactionData.transaction_field).each(function(ind, val) {
                $('#transferOverviewRecipientData').append(`
                    <div class="inner-boxs">
                        <p>` + val.field_name + `</p>

                        <h6>` + val.field_value + `</h6>
                    </div>
                `);
            });


            var transactionId = $(this).data('id');

            $("#transactionTransferId").text(transactionId);
            $("#transactionTransferId").attr('data-transaction-id', transactionId);
        });
    </script>
@endsection