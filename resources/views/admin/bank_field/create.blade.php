@extends('admin.layouts.master')
@section('title','Create Bank Fields |')
@section('css')
    <style>
        .removeFields {
            position: absolute;
            right: 4px;
            top: 3px;
        }
    </style>
@endsection

@section('breadcrumbs')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('bank_field.index') }}">Bank Fields</a>
            </li>
            <li class="breadcrumb-item active">Create Bank Fields</li>
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
                                    <h4>Create a Bank Fields</h4>
                                </div>
                            </div>
                        </div>

                        <div class="widget-content widget-content-area">
                            <form method="post" action="{{ route('bank_field.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group required">
                                            <label for="title">Title</label>

                                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old("title") }}" />

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
                                                        <option value="{{ $country['id'] }}" {{ old('country_id') == $country['id'] ? 'selected' : '' }}>{{ $country['name'] }}</option>
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

                                <div class="card mb-5">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group required">
                                                    <label for="fields.0.type">Fields Type</label>

                                                    <div style="position: relative;">
                                                        <select style="-webkit-appearance: none !important;" name="fields[0][type]" class="form-control @error('fields.0.type') is-invalid @enderror" id="fields.0.type">
                                                            @foreach($bankFieldType as $key => $field)
                                                                <option value="{{ $key }}">{{ $field }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div style="position: absolute;position: absolute;top: 15px;right: 5px;">
                                                            <i class="fas fa-angle-down"></i>
                                                        </div>
                                                    </div>

                                                    @error('fields.0.type')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group required">
                                                    <label for="fields.0.name">Fields Name</label>

                                                    <input type="text" name="fields[0][name]" class="form-control @error('fields.0.name') is-invalid @enderror" id="fields.0.name"/>

                                                    @error('fields.0.name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group required">
                                                    <label for="fields.0.value">Fields Value</label>

                                                    <input type="text" name="fields[0][value]" class="form-control @error('fields.0.value') is-invalid @enderror" id="fields.0.value"/>

                                                    @error('fields.0.value')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="appendFields"></div>

                                <div class="row mb-5">
                                    <div class="col-sm-12">
                                        <a class="btn btn-dark" href="javascript:void(0)" id="addField" data-counter="0">
                                            <i data-feather="plus-circle"></i> Add Field
                                        </a>
                                    </div>
                                </div>

                                <a class="btn btn-dark" href="{{ route('bank_field.index') }}">Cancel</a>

                                <button type="submit" class="btn btn-info float-right">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="collapse" id="requiredFiled">
        <div class="card mb-5" id="card_0">
            <div class="card-body">
                <a href="javascript:void(0)" class="removeFields" data-counter="0" onclick="$(this).parents('.card').remove()">
                    <img src="{{ asset('front/images/cross.svg') }}" class="ml-2" height="30">
                </a>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group required">
                            <label for="fields.0.type" class="fieldTypeLabel">Fields Type</label>

                            <div style="position: relative;">
                                <select style="-webkit-appearance: none !important;" name="fields[0][type]" class="form-control fieldType @error('fields.0.type') is-invalid @enderror" id="fields.0.type">
                                    @foreach($bankFieldType as $key => $field)
                                        <option value="{{ $key }}">{{ $field }}</option>
                                    @endforeach
                                </select>
                                <div style="position: absolute;position: absolute;top: 15px;right: 5px;">
                                                                    <i class="fas fa-angle-down"></i>
                                                                </div>
                            </div>

                            @error('fields.0.type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group required">
                            <label for="fields.0.name" class="fieldNameLabel">Fields Name</label>

                            <input type="text" name="fields[0][name]" class="form-control fieldName @error('fields.0.name') is-invalid @enderror" id="fields.0.name"/>

                            @error('fields.0.name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group required">
                            <label for="fields.0.value" class="fieldPlaceholderLabel">Fields Value</label>

                            <input type="text" name="fields[0][value]" class="form-control fieldPlaceholder @error('fields.0.value') is-invalid @enderror" id="fields.0.value"/>

                            @error('fields.0.value')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $("#addField").click(function () {

                var counter = parseInt($(this).attr('data-counter'));
                var newCounter = (counter + 1);
                $("#requiredFiled .card").attr('data-counter',newCounter);


                /* Type */
                var fieldTypeLabel = "fields."+newCounter+".type";
                var fieldTypeName = "fields["+newCounter+"][type]";
                $("#requiredFiled .fieldTypeLabel").attr('for',fieldTypeLabel);
                $("#requiredFiled .fieldType").attr('id',fieldTypeLabel);
                $("#requiredFiled .fieldType").attr('name',fieldTypeName);


                /* Key */
                // var fieldKeyLabel = "fields."+newCounter+".key";
                // var fieldKeyName = "fields["+newCounter+"]['key']";
                // $("#requiredFiled .fieldKeyLabel").attr('for',fieldKeyLabel);
                // $("#requiredFiled .fieldKey").attr('id',fieldKeyLabel);
                // $("#requiredFiled .fieldKey").attr('name',fieldKeyName);

                /* Name */
                var fieldNameLabel = "fields."+newCounter+".name";
                var fieldName = "fields["+newCounter+"][name]";
                $("#requiredFiled .fieldPlaceholderLabel").attr('for',fieldNameLabel);
                $("#requiredFiled .fieldName").attr('id',fieldNameLabel);
                $("#requiredFiled .fieldName").attr('name',fieldName);


                /* Placeholder */
                var fieldPlaceholderLabel = "fields."+newCounter+".value";
                var fieldPlaceholder = "fields["+newCounter+"][value]";
                $("#requiredFiled .fieldPlaceholderLabel").attr('for',fieldPlaceholderLabel);
                $("#requiredFiled .fieldPlaceholder").attr('id',fieldPlaceholderLabel);
                $("#requiredFiled .fieldPlaceholder").attr('name',fieldPlaceholder);


                $("#requiredFiled .card .removeFields").attr('data-counter',newCounter);
                var html = $("#requiredFiled").html();
                $("#appendFields").append(html).hide().fadeIn(1000);
                $("html, body").animate({scrollTop: $(document).height()}, 1000);
                $(this).attr('data-counter',newCounter);
            });
        });
    </script>
@endsection
