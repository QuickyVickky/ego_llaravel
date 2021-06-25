@extends('admin.layouts.master')
@section('title','Edit Fees |')
@section('css')

@endsection

@section('breadcrumbs')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('bank_field.index') }}">Bank Fields</a></li>
            <li class="breadcrumb-item active">Edit Bank Fields</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="row layout-top-spacing" id="app">
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="row">
                <div class="col-sm-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                    <h4>Edit a Bank Field</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form method="post" action="{{ route('bank_field.update', [$bankField->id]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group required">
                                            <label for="title">Title</label>

                                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old("title", $bankField->title) }}" />

                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group required">
                                            <label for="country_id">Country</label>

                                            <div style="position: relative;">
                                                <select style="-webkit-appearance: none !important;" class="form-control @error('country_id') is-invalid @enderror" name="country_id">
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country['id'] }}" {{ old('country_id', $bankField->country_id) == $country['id'] ? 'selected' : '' }}>{{ $country['name'] }}</option>
                                                    @endforeach
                                                </select>
                                                <div style="position: absolute;position: absolute;top: 15px;right: 5px;">
                                                                    <i class="fas fa-angle-down"></i>
                                                                </div>
                                            </div>

                                            @error('country_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                @foreach($bankFieldOption as $bfokey => $bfo)
                                    <div class="card mb-5">
                                        <div class="card-body">
                                            <div class="row">
                                                <input type="hidden" name="fields[{{ $bfokey }}][bfoid]" value="{{ $bfo->id }}">

                                                <div class="col-sm-4">
                                                    <div class="form-group required">
                                                        <label for="fields.{{ $bfokey }}.type">Fields Type</label>

                                                        <div style="position: relative;">
                                                            <select style="-webkit-appearance: none !important;" name="fields[{{ $bfokey }}][type]" class="form-control @error('fields.$bfokey.type') is-invalid @enderror" id="fields.{{ $bfokey }}.type">
                                                                @foreach($bankFieldType as $key => $field)
                                                                    <option value="{{ $key }}" {{ $key == $bfo->field_type ? 'selected' : '' }}>{{ $field }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div style="position: absolute;position: absolute;top: 15px;right: 5px;">
                                                                    <i class="fas fa-angle-down"></i>
                                                                </div>
                                                        </div>

                                                        @error('fields.$bfokey.type')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group required">
                                                        <label for="fields.{{ $bfokey }}.name">Fields Name</label>

                                                        <input type="text" name="fields[{{ $bfokey }}][name]" class="form-control @error('fields.$bfokey.name') is-invalid @enderror" id="fields.{{ $bfokey }}.name" value="{{ old('fields.$bfokey.name', $bfo->field_name) }}" />

                                                        @error('fields.$bfokey.name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group required">
                                                        <label for="fields.{{ $bfokey }}.value">Fields Value</label>

                                                        <input type="text" name="fields[{{ $bfokey }}][value]" class="form-control @error('fields.$bfokey.value') is-invalid @enderror" id="fields.{{ $bfokey }}.value" value="{{ old('fields.$bfokey.value', $bfo->field_value) }}"/>

                                                        @error('fields.$bfokey.value')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <a class="btn btn-dark" href="{{ route('bank_field.index') }}">Cancel</a>

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
