@extends('admin.layouts.master')

@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Configuration</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Configuration</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-sm-12">
            <a class="btn btn-primary btn-sm" href="{{ route('configure.create') }}">
                <i class="fas fa-plus"></i> New Configuration
            </a>
        </div>
    </div>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Configuration</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body p-0" style="display: block;">
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th>Key</th>
                    <th>Value</th>
                    <th style="width: 20%" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($configurations as $configuration)
                    <tr>
                        <td>{{ $configuration->key }}</td>
                        <td>{{ $configuration->value }}</td>
                        <td class="project-actions text-center">
                            <form id="destroy-form" action="{{ route('configure.destroy',$configuration->id) }}" method="POST">
                            <div class="btn-group btn-group-sm">
                                <a class="btn btn-info btn-sm" href="{{ route('configure.edit',$configuration->id) }}">
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
                        <td colspan="5" class="text-center"> Record not found.!</td>
                    </tr>
                @endforelse

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        @if(!empty($configurations))
            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" role="status" aria-live="polite">
                            Showing {{ $configurations->firstItem() }} to {{ $configurations->lastItem() }} of {{ $configurations->total() }}
                            entries
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers">
                            {{ $configurations->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
