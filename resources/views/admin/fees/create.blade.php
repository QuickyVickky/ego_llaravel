@extends('admin.layouts.master')
@section('title','Create Fees |')
@section('css')
    <link href="{{ asset('admin/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />

    <style>
        .invalid-feedback {
            display: unset;
        }
    </style>
@endsection

@section('breadcrumbs')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('fees.index') }}">Fees</a></li>
            <li class="breadcrumb-item active">Create Fees</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="row layout-top-spacing justify-content-center" id="app">
{{--        <template>--}}
        <div class="col-xl-8 col-lg-10 col-12 layout-spacing">
            <div class="row">
                <div class="col-sm-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Create a new fee</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form method="post" action="{{ route('fees.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group required">
                                            <label for="type">Type</label>
                                            <div style="position: relative;">
                                                <select name="type" style="-webkit-appearance: none !important;" class="form-control @error('type') is-invalid @enderror" id="type">
                                                    @foreach($transfer as $key => $value)
                                                        <option value="{{ $key }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                                <div style="position: absolute;position: absolute;top: 15px;right: 5px;">
                                                    <i class="fas fa-angle-down"></i>
                                                </div>
                                            </div>
                                            @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group required">
                                            <label for="percentage">Fees</label>
                                            <input type="number" name="percentage" class="form-control @error('percentage') is-invalid @enderror" id="email" placeholder="Enter fees in percentage" value="{{ old('percentage') }}">
                                            @error('percentage')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <a class="btn btn-dark" href="{{ route('fees.index') }}">Cancel</a>
                                <button type="submit" class="btn btn-info float-right">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--        </template>--}}
    </div>

@endsection

@section('js')

@endsection
