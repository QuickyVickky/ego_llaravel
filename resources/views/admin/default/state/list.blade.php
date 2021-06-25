@extends('admin.layouts.master')
@section('title','States |')
@section('css')

@endsection

@section('breadcrumbs')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">Default</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>States</span></li>
        </ol>
    </nav>
@endsection

@section('content')

    <div class="row layout-top-spacing">
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="row">
                <div class="col-sm-8">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                    <h4>Filter</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form name="filter-form" method="get" action="{{ route('state.index') }}"
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
                                        <a class="btn btn-secondary" href="{{ route('state.index') }}">Refresh</a>
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
                <div class="col-sm-8">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                    <h4>Countries</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table
                                    class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                                    <caption>List of all Payment Option</caption>
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Country Code</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($states as $state)
                                        <tr>
                                            <td>{{ $state->name }}</td>
                                            <td>{{ $state->code }}</td>
                                            <td>{{ $state->country_code }}</td>

                                            <td class="text-center">
                                                @if($state->is_active)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">InActive</span>
                                                @endif
                                            </td>

                                            <td class="project-actions text-center">
                                                <form id="destroy-form"
                                                      action="{{ route('country.destroy',$state->id) }}"
                                                      method="POST">
                                                    {{--                                                    <div class="btn-group btn-group-sm">--}}
                                                    <a class="btn btn-info btn-sm"
                                                       href="{{ route('country.edit',$state->id) }}">
                                                        <i class="fas fa-pencil-alt"></i> Edit
                                                    </a>

                                                    @csrf
                                                    @method('delete')
                                                    {{--                                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i>Delete</button>--}}
                                                    {{--                                                    </div>--}}

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

                            <div class="row">
                                <div class="col-sm-12">
                                    @if(!empty($states))
                                        <div class="clearfix">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-5">
                                                    <div class="dataTables_info" role="status" aria-live="polite">
                                                        Showing {{ $states->firstItem() }}
                                                        to {{ $states->lastItem() }}
                                                        of {{ $states->total() }}
                                                        entries
                                                    </div>
                                                </div>

                                            <div class="col-sm-6 col-md-7">
                                                <div class="dataTables_paginate paging_simple_numbers">
                                                    {{ $states->onEachSide(2)->links() }}
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
        </div>
    </div>

@endsection
