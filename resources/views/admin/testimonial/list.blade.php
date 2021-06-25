@extends('admin.layouts.master')
@section('title','Testimonials |')

@section('breadcrumbs')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>Testimonial</span></li>
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
                                    <h4>Testimonials</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4 mt-4">
                                <div class="table-responsive">
                                    <table
                                        class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                                        <caption>List of all Contact</caption>
                                        <thead>
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th>Designation</th>
                                        <th>Comment</th>
                                        <th class="text-center">image</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                        </thead>
                                        <tbody>
                                        @forelse ($testimonials as $testimonial)
                                            <tr>
                                                <td>{{ $testimonial->name }}</td>
                                                <td>{{ $testimonial->company_name }}</td>
                                                <td>{{ $testimonial->designation }}</td>
                                                <td>{{ $testimonial->comment }}</td>
                                                <td>
                                                    @if($testimonial->image == 'profile.png')
                                                        <img src="{{ asset('public/images/'.$testimonial->image) }}" class="img-size-50">
                                                    @else
                                                        <img src="{{ Storage::disk()->url($testimonial->image) }}" class="img-size-50">
                                                        {{--                                <img src="{{ Storage::url('images/testimonial/'.$testimonial->image) }}" class="img-size-50">--}}
                                                    @endif
                                                </td>
                                                <td class="project-state">
                                                    @if($testimonial->status)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">InActive</span>
                                                    @endif
                                                </td>

                                                <td class="project-actions text-center">
                                                    <form id="destroy-form" action="{{ route('testimonial.destroy',$testimonial->id) }}" method="POST">
                                                        <div class="btn-group btn-group-sm">
                                                            <a class="btn btn-info btn-sm" href="{{ route('testimonial.edit',$testimonial->id) }}">
                                                                <i class="fas fa-pencil-alt"></i> Edit
                                                            </a>

                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i>Delete</button>
                                                        </div>

                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center"> Record not found.!</td>
                                            </tr>
                                        @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    @if(!empty($testimonials))
                                        <div class="clearfix">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" role="status" aria-live="polite">
                                                        Showing {{ $testimonials->firstItem() }} to {{ $testimonials->lastItem() }} of {{ $testimonials->total() }}
                                                        entries
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers">
                                                        {{ $testimonials->links() }}
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
