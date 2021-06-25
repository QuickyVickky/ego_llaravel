@extends('admin.layouts.master')
@section('title','Store |')
@section('css')

@endsection

@section('breadcrumbs')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>Stores</span></li>
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
                                    <h4>Stores</h4>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                    <a class="btn btn-primary  m-2 btn-rounded float-right"
                                       href="{{ route('store.create') }}">Create Store
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
                                        <th>Created at</th>
                                        <th style="width: 8%" class="text-center">Status</th>
                                        <th style="width: 20%" class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($stores as $store)
                                        <tr>
                                            <td>{{ $store->name }}</td>
                                            <td>{{ $store->email }}</td>
                                            <td>
                                                {{ $store->address1 }},
                                                @if(!empty($store->address2)){{ $store->address2 }},@endif
                                                {{ $store->city }},
                                                {{ $store->state }},
                                                {{ $store->country }} - {{ $store->zipcode }}
                                            </td>
                                            <td>{{ $store->mobile }}</td>
                                            <td>{{ date('d-m-Y',strtotime($store->created_at)) }}</td>
                                            <td class="project-state">
                                                @if($store->is_active)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">InActive</span>
                                                @endif
                                            </td>
                                            <td class="project-actions text-center">
                                                <form id="destroy-form"
                                                      action="{{ route('store.destroy',$store->id) }}" method="POST">
                                                    <div class="btn-group btn-group-sm">
                                                        <a class="btn btn-info btn-sm"
                                                           href="{{ route('store.edit',$store->id) }}">
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
                            @if(!empty($stores))
                                <div class="clearfix">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" role="status" aria-live="polite">
                                                Showing {{ $stores->firstItem() }} to {{ $stores->lastItem() }}
                                                of {{ $stores->total() }}
                                                entries
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers">
                                                {{ $stores->links() }}
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
