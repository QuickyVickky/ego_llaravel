@extends('admin.layouts.master')
@section('title','Zelle |')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/table/datatable/dt-global_style.css') }}">

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
            <li class="breadcrumb-item active" aria-current="page"><span>Zelle</span></li>
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
                            <h4>Zelle</h4>
                        </div>

                        {{-- <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                            <a class="btn btn-primary  m-2 btn-rounded float-right"
                               href="{{ route('zelle.create') }}">Create Zelle
                                <i data-feather="plus-circle"></i>
                            </a>
                        </div> --}}
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="feeDataTable" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Created At</th>
                                <th style="width: 20%" class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>{{ $zelle->zelle_description }}</td>
                                <td>{{ date('d-m-Y',strtotime($zelle->created_at)) }}</td>
                                <td class="project-actions text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a class="btn btn-info btn-sm edit-btn" href="{{ route('zelle.edit', $zelle->id) }}" title="Edit">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
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
        $('#feeDataTable').DataTable({
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
                    'aTargets': [2],
                }
            ],
        });
    </script>
@endsection
