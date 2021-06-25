@extends('admin.layouts.master')

@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Configuration</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('configure.index') }}">Configuration</a></li>
                <li class="breadcrumb-item active">New Configuration</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

@endsection

@section('content')

    <div class="row">
        <div class="col-sm-6">
        <form method="post" action="{{ route('configure.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">New Configuration</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                                title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body" style="display: block;">

                    <div class="form-group">
                        <label for="key">Key</label>
                        <input type="text" name="key" class="form-control @error('key') is-invalid @enderror" id="key" placeholder="Enter key">
                        @error('key')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="value">Value</label>
                        <input type="text" name="value" class="form-control @error('value') is-invalid @enderror" id="value" placeholder="Enter value">
                        @error('value')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a class="btn btn-secondary" href="{{ route('configure.index') }}">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-info float-right">Save</button>
                </div>
            </div>
        </form>
        </div>
    </div>
@endsection
