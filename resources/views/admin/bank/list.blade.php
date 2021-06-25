@extends('admin.layouts.master')
@section('title','Bank Info |')
@section('css')

@endsection

@section('breadcrumbs')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>Bank Info</span></li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="row">
                <div class="col-sm-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                    <h4>Bank Info</h4>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                    <a class="btn btn-primary  m-2 btn-rounded float-right"
                                       href="{{ route('bank.create') }}">Create Bank
                                        <i data-feather="plus-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table
                                    class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                                    <caption>List of all store</caption>
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Country</th>
                                        <th>Bank Details</th>
                                        <th>Created At</th>
                                        <th style="width: 8%" class="text-center">Status</th>
                                        <th style="width: 20%" class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($banks as $bank)
                                        <tr>
                                            <td>{{ $bank->id }}</td>
                                            <td>{{ $bank->country->name }}</td>
                                            <td>
                                                {{ $bank->bank_info }}
                                            </td>
                                            <td>{{ date('d-m-Y',strtotime($bank->created_at)) }}</td>
                                            <td class="project-state">
                                                @if($bank->is_active)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">InActive</span>
                                                @endif
                                            </td>
                                            <td class="project-actions text-center">
                                                <form id="destroy-form"
                                                      action="{{ route('store.destroy',$bank->id) }}" method="POST">
                                                    <div class="btn-group btn-group-sm">
                                                        <a class="btn btn-info btn-sm"
                                                           href="{{ route('store.edit',$bank->id) }}">
                                                            <i class="fas fa-pencil-alt"></i> Edit
                                                        </a>

                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm" type="submit"><i
                                                                class="fas fa-trash"></i>Delete
                                                        </button>
                                                    </div>

                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11" class="text-center"> Record not found.!</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            @if(!empty($banks))
                                <div class="clearfix">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" role="status" aria-live="polite">
                                                Showing {{ $banks->firstItem() }} to {{ $banks->lastItem() }}
                                                of {{ $banks->total() }}
                                                entries
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers">
                                                {{ $banks->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
