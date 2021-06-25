@extends('admin.layouts.master')
@section('title','Subscriptions |')

@section('breadcrumbs')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>Subscribe</span></li>
        </ol>
    </nav>
@endsection

@section('content')

    <div class="row layout-top-spacing">
        <div id="tableCheckbox" class="col-lg-12 col-12 layout-spacing">
            <div class="row">
                <div class="col-sm-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                    <h4>Subscribe</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4 mt-4">
                                <div class="table-responsive">
                                    <table
                                        class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                                        <caption>List of all Subscribe</caption>
                                        <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th class="text-center">Subscribed</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($subscriptions as $subscription)
                                            <tr>
                                                <td>{{ $subscription->email }}</td>
                                                <td class="project-state">
                                                    @if($subscription->is_subscribed)
                                                        <span class="badge badge-success">Yes</span>
                                                    @else
                                                        <span class="badge badge-danger">No</span>
                                                    @endif
                                                </td>
                                                <td class="project-actions text-center">
                                                    <form id="destroy-form"
                                                          action="{{ route('subscriptions.destroy',$subscription->id) }}"
                                                          method="POST">
                                                        <div class="btn-group btn-group-sm">
                                                            <a class="btn btn-info btn-sm"
                                                               href="{{ route('subscriptions.edit',$subscription->id) }}">
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
                                                <td colspan="5" class="text-center"> Record not found.!</td>
                                            </tr>
                                        @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    @if(!empty($subscriptions))
                                        <div class="clearfix">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" role="status" aria-live="polite">
                                                        Showing {{ $subscriptions->firstItem() }}
                                                        to {{ $subscriptions->lastItem() }}
                                                        of {{ $subscriptions->total() }}
                                                        entries
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers">
                                                        {{ $subscriptions->links() }}
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
        </div>
    </div>
@endsection
