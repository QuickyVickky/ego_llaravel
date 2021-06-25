@extends('admin.layouts.master')
@section('title','Edit Zelle |')

@section('css')

@endsection

@section('breadcrumbs')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('zelle.index') }}">Zelle</a></li>
            <li class="breadcrumb-item active">Edit zelle</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="row layout-top-spacing justify-content-center" id="app">
        <div class="col-xl-8 col-lg-10 col-12 layout-spacing">
            <div class="row">
                <div class="col-sm-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Edit zelle</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form method="post" action="{{ route('zelle.update', [$zelle->id]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group required">
                                            <label for="zelle_description">Zelle description</label>

                                            <input type="text" name="zelle_description" class="form-control @error('zelle_description') is-invalid @enderror" id="zelle_description" placeholder="Enter zelle description" value="{{ old('zelle_description', $zelle->zelle_description) }}">
                                            @error('zelle_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <a class="btn btn-dark" href="{{ route('zelle.index') }}">Cancel</a>

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
