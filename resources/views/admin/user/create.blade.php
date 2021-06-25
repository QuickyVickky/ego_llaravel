@extends('admin.layouts.master')

@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('banner.index') }}">User</a></li>
                <li class="breadcrumb-item active">New User</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

@endsection

@section('content')

    <div class="row">
        <div class="col-sm-6">
        <form method="post" action="{{ route('banner.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">New User</h3>
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
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control  @error('description') is-invalid @enderror" rows="3"
                                  placeholder="Enter description"></textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="path">Path</label>
                        <input type="text" name="path" class="form-control @error('path') is-invalid @enderror" id="path" placeholder="Enter path">
                        @error('path')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="parent_id">Image</label>
                        <div class="custom-file">
                            <input type="file" name="images[]" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group clearfix pt-15" >
                        <label for="check"></label>
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" name="is_active" id="checkboxPrimary1" checked>
                            <label for="checkboxPrimary1">Is Active</label>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a class="btn btn-secondary" href="{{ route('banner.index') }}">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-info float-right">Save</button>
                </div>
            </div>
        </form>
        </div>
    </div>
@endsection
