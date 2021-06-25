@extends('admin.layouts.master')
@section('title','User |')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/table/datatable/dt-global_style.css') }}">

    <style>
        table .badge-success, table .badge-primary, table .badge-warning, table .badge-danger, table .badge-info, table .badge-secondary, table .badge-dark, .btn {
            will-change: unset;
        }

        .table > tbody > tr > td .usr-img-frame img {
            height: 100%;
        }
    </style>
@endsection

@section('breadcrumbs')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>User</span></li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                            <h4>Users</h4>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="userDataTable" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Id</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Country</th>
                                <th>Join Date</th>
                                <th>Total transactions</th>
                                <th>Last transaction date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="usr-img-frame mr-2 rounded-circle">
                                                @if($user->image == 'profile.png')
                                                    <img alt="profile" src="{{ asset('images/'.$user->image) }}" class="img-fluid rounded-circle">
                                                @else
                                                    <img src="{{ asset('storage/user/'.$user->image) }}" class="img-fluid rounded-circle">
                                                @endif
                                            </div>

                                            <p class="align-self-center mb-0">{{ $user->first_name }}</p>
                                        </div>
                                    </td>
                                    <td>{{ $user->user_uniqu_id }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->countryData->dial_code . ' ' . $user->phone }}</td>
                                    <td>{{ $user->countryData->name }}</td>
                                    <td>{{ date('d-m-Y',strtotime($user->created_at)) }}</td>
                                    <td>{{ count($user->transaction) }}</td>
                                    <td>{{ count($user->transaction) > 0 ? date('d-m-Y',strtotime($user->transaction[0]->complete_date)) : '' }}</td>
                                    <td class="project-actions text-center">

                                        <div class="btn-group  mb-4 mr-2" role="group">
                                            <a class="btn btn-info btn-sm" href="{{ route('user.recipient',$user->id) }}" title="View Recipients">
                                                <i class="fas fa-eye"></i>
                                            </a>
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

    <script>
        $('#userDataTable').DataTable({
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
    </script>
@endsection
