@extends('admin.layouts.master')
@section('title','Transaction |')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/daterangepicker.css') }}">

    <style>
        table .badge-success, table .badge-primary, table .badge-warning, table .badge-danger, table .badge-info, table .badge-secondary, table .badge-dark, .btn {
            will-change: unset;
        }
    </style>
@endsection

@section('breadcrumbs')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>Transaction</span></li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="row layout-top-spacing">
        <div id="tableCheckbox" class="col-lg-12 col-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="widget-header">
                    <form class="row" method="post" id="transactionFilterForm" action="{{ route('transaction.filter') }}">
                        @csrf

                        <div class="col-xl-3 col-md-3 col-sm-3 col-3">
                            <h4>Transactions</h4>
                        </div>

                        <div class="col-xl-3 col-md-3 col-sm-3 col-3">
                            <select class="form-control" name="transaction_status" onchange="this.form.submit()">
                                <option value="">All Status</option>
                                @foreach(Config('constants.transactionStatus') as $key => $ts)
                                    <option value="{{ $key }}" {{ $key == $transactionStatus ? 'selected' : '' }}>{{ $ts }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xl-3 col-md-3 col-sm-3 col-3">
                            <select class="form-control" name="fee_type" onchange="this.form.submit()">
                                <option value="">All Type</option>
                                @foreach(Config('constants.FeesType') as $key => $ft)
                                    <option value="{{ $key }}" {{ $key == $feeType ? 'selected' : '' }}>{{ $ft }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xl-3 col-md-3 col-sm-3 col-3">
                            <input class="form-control" type="text" id="transaction_date" name="transaction_date" placeholder="Select date" value="{{ $dateRange }}" autocomplete="off">
                        </div>
                    </form>
                </div>

                <div class="table-responsive">
                    <table id="transactionDataTable" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>User Name</th>
                                <th>Phone</th>
                                <th>Transfer Amount</th>
                                <th>Fees</th>
                                <th>Received Amount</th>
                                <th>Transfer Type</th>
                                <th>Status</th>
                                <th>Transfer Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ $transaction->user->first_name . ' ' . $transaction->user->last_name }}</td>
                                    <td>{{ $transaction->user->countryData->dial_code . ' ' . $transaction->user->phone }}</td>
                                    <td>{{ $transaction->you_send . ' ' . $transaction->send_currency_code}}</td>
                                    <td>{{ $transaction->fee_rate_amount . ' ' . $transaction->send_currency_code}}</td>
                                    <td>{{ $transaction->amount_get . ' ' . $transaction->get_currency_code }}</td>
                                    <td>
                                        @switch($transaction->fees_type)
                                            @case('manual')
                                                <span class="badge outline-badge-primary">
                                                    {{ Config('constants.FeesType.'.$transaction->fees_type) }}
                                                </span>
                                                @break
                                            @case('credit')
                                                <span class="badge outline-badge-dark">
                                                    {{ Config('constants.FeesType.'.$transaction->fees_type) }}
                                                </span>
                                                @break
                                            @case('debit')
                                                <span class="badge outline-badge-dark">
                                                    {{ Config('constants.FeesType.'.$transaction->fees_type) }}
                                                </span>
                                                @break
                                            @case('zelle')
                                                <span class="badge outline-badge-warning">
                                                    {{ Config('constants.FeesType.'.$transaction->fees_type) }}
                                                </span>
                                                @break
                                            @default
                                                <span class="badge outline-badge-primary">
                                                    {{ Config('constants.FeesType.'.$transaction->fees_type) }}
                                                </span>
                                        @endswitch
                                    </td>
                                    <td>
                                        @switch($transaction->status)
                                            @case('pending')
                                                <span class="badge badge-warning">
                                                    {{ Config('constants.transactionStatus.'.$transaction->status) }}
                                                </span>
                                                @break
                                            @case('later')
                                                <span class="badge badge-dark">
                                                    {{ Config('constants.transactionStatus.'.$transaction->status) }}
                                                </span>
                                                @break
                                            @case('accepted')
                                                <span class="badge badge-info">
                                                    {{ Config('constants.transactionStatus.'.$transaction->status) }}
                                                </span>
                                                @break
                                            @case('received')
                                                <span class="badge badge-info">
                                                    {{ Config('constants.transactionStatus.'.$transaction->status) }}
                                                </span>
                                                @break
                                            @case('complete')
                                                <span class="badge badge-success">
                                                    {{ Config('constants.transactionStatus.'.$transaction->status) }}
                                                </span>
                                                @break
                                            @case('cancel')
                                                <span class="badge badge-danger">
                                                    {{ Config('constants.transactionStatus.'.$transaction->status) }}
                                                </span>
                                                @break
                                            @case('refund')
                                                <span class="badge badge-danger">
                                                    {{ Config('constants.transactionStatus.'.$transaction->status) }}
                                                </span>
                                                @break
                                            @default
                                                <span class="badge badge-warning">
                                                    {{ Config('constants.transactionStatus.'.$transaction->status) }}
                                                </span>
                                        @endswitch

                                        @if($transaction->status == 'pending' && $transaction->user->is_proof_verified == Config('constants.is_proof_verified.notVerified'))
                                            <span class="badge outline-badge-danger">
                                                Not Verified
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{ date('d-m-Y', strtotime($transaction->created_at))  }}</td>
                                    <td class="project-actions text-center">
                                        <div class="btn-group btn-group-sm">
                                            @if($transaction->status != 'later')
                                                <a class="btn btn-info btn-sm" href="{{ route('transaction.show',$transaction->id) }}" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('admin/plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('admin/assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/daterangepicker.min.js') }}"></script>

    <script>
        $('#transactionDataTable').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "aaSorting": [],
            "aoColumnDefs": [
                {
                    'bSortable': false,
                    'aTargets': [8],
                }
            ],
        });

        $('#transaction_date').daterangepicker({
            maxDate: new Date(),
            autoUpdateInput: false
        }, function(start, end, label) {
            $('#transaction_date').val(start.format('YYYY/MM/DD') + ' - ' + end.format('YYYY/MM/DD'));
            $( "#transactionFilterForm" ).submit();
        });

        $('#transaction_date').on('cancel.daterangepicker', function(ev, picker) {
            $('#transaction_date').val('');
            $( "#transactionFilterForm" ).submit();
        });
    </script>
@endsection
