@extends('admin.layouts.master')
@section('title','Payment Options |')
@section('css')
@endsection

@section('breadcrumbs')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span><a href="{{ route('coupon.index') }}">Payment Options</a></span>
            </li>
            <li class="breadcrumb-item active">Edit Payment Options</li>
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
                                    <h4>Edit Payment Options</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form method="post" action="{{ route('payment_option.update',$paymentOption->id) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   id="name" placeholder="Enter name" value="{{ $paymentOption->name }}" readonly>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-12 mb-5">
                                        <div class="form-check pl-0">
                                            <div class="custom-control custom-checkbox checkbox-info">
                                                <input type="checkbox" name="is_active" class="custom-control-input"
                                                       id="hChkbox" @if($paymentOption->is_active == 1) checked @endif>
                                                <label class="custom-control-label" for="hChkbox">Is Active</label>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <a class="btn btn-dark" href="{{ route('payment_option.index') }}">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-info float-right">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
