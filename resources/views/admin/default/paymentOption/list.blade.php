@extends('admin.layouts.master')
@section('title','Payment Options |')
@section('css')

@endsection

@section('breadcrumbs')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">Default</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>Payment Options</span></li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="row">
                <div class="col-sm-6">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                    <h4>Payment Options</h4>
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
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($paymentOptions as $option)
                                        <tr>
                                            <td>{{ $option->name }}</td>

                                            <td class="text-center">
                                                @if($option->is_active)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">InActive</span>
                                                @endif
                                            </td>

                                            <td class="project-actions text-center">
                                                <form id="destroy-form" action="{{ route('payment_option.destroy',$option->id) }}" method="POST">
{{--                                                    <div class="btn-group btn-group-sm">--}}
                                                        <a class="btn btn-info btn-sm" href="{{ route('payment_option.edit',$option->id) }}">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
