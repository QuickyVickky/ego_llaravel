@extends('admin.layouts.master')
@section('title','Coupons |')
@section('css')

@endsection

@section('breadcrumbs')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>Promo Codes</span></li>
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
                                    <h4>Filter</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form name="filter-form" method="get" action="{{ route('coupon.index') }}"
                                  enctype="multipart/form-data">
                                <div class="card-body p-0" style="display: block;">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="title" class="form-control" id="title"
                                                           placeholder="Search title" value="{{ old('name') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="name">Status</label>
                                                    <select class="form-control" name="status">
                                                        <option value="">-- Select status --</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">InActive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="float-right">
                                        <a class="btn btn-secondary" href="{{ route('coupon.index') }}">Refresh</a>
                                        <button type="submit" class="btn btn-info">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row layout-top-spacing">
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="row">
                <div class="col-sm-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                    <h4>Promo Codes</h4>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                    <a class="btn btn-primary  m-2 btn-rounded float-right"
                                       href="{{ route('coupon.create') }}">Create Promo Code
                                        <i data-feather="plus-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table
                                    class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                                    <caption>List of all promo codes</caption>
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Code</th>
                                        <th>type</th>
                                        <th>Method</th>
                                        <th>Amount</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Max Usage</th>
                                        <th>Max Discount</th>
                                        {{--                    <th style="width: 30%">Description</th>--}}
                                        <th style="width: 8%" class="text-center">Status</th>
                                        <th style="width: 20%" class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($coupons as $coupon)
                                        <tr>
                                            <td>{{ $coupon->name }}</td>
                                            <td>{{ $coupon->code }}</td>
                                            <td>{{ $coupon->type }}</td>
                                            <td>{{ $coupon->method }}</td>
                                            <td>{{ $coupon->amount }}</td>
                                            <td>{{ $coupon->start_date_time }}</td>
                                            <td>{{ $coupon->end_date_time }}</td>
                                            <td>{{ $coupon->max_total_usage }}</td>
                                            <td>{{ $coupon->maximum_discount_amount }}</td>

                                            <td class="project-state">
                                                @if($coupon->is_active)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">InActive</span>
                                                @endif
                                            </td>
                                            <td class="project-actions text-center">
                                                <form id="destroy-form" action="{{ route('coupon.destroy',$coupon->id) }}" method="POST">
                                                    <div class="btn-group btn-group-sm">
                                                        <a class="btn btn-info btn-sm"
                                                           href="{{ route('coupon.edit',$coupon->id) }}">
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
                            @if(!empty($coupons))
                                <div class="clearfix">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" role="status" aria-live="polite">
                                                Showing {{ $coupons->firstItem() }} to {{ $coupons->lastItem() }}
                                                of {{ $coupons->total() }}
                                                entries
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers">
                                                {{ $coupons->links() }}
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
