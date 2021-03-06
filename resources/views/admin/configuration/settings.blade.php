                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             @extends('admin.layouts.master')
@section('title','Setting |')
@section('breadcrumbs')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span><a
                        href="{{ route('coupon.index') }}">Settings</a></span></li>
            <li class="breadcrumb-item active">Edit Settings</li>
        </ol>
    </nav>
@endsection

@section('content')

    <form method="post" action="{{ route('settings.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="row layout-top-spacing">
            <div class="col-lg-12 col-12 layout-spacing">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                        <h4>Manage Site Settings</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="value">Facebook</label>
                                            <input type="text" name="settings[facebook]"
                                                   class="form-control @error('value') is-invalid @enderror" id="value"
                                                   placeholder="Enter value"
                                                   @if(isset($settings['facebook'])) value="{{ $settings['facebook'] }}" @endif>
                                            @error('value')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="value">Twitter</label>
                                            <input type="text" name="settings[twitter]"
                                                   class="form-control @error('value') is-invalid @enderror" id="value"
                                                   placeholder="Enter value"
                                                   @if(isset($settings['twitter'])) value="{{ $settings['twitter'] }}" @endif>
                                            @error('value')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="value">Linkedin</label>
                                            <input type="text" name="settings[linkedin]"
                                                   class="form-control" id="value"
                                                   placeholder="Enter value"
                                                   @if(isset($settings['linkedin'])) value="{{ $settings['linkedin'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="value">Instagram</label>
                                            <input type="text" name="settings[instagram]"
                                                   class="form-control" id="value" placeholder="Enter value"
                                                   @if(isset($settings['instagram'])) value="{{ $settings['instagram'] }}" @endif>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="value">Whatsapp</label>
                                            <input type="text" name="settings[whatsapp]"
                                                   class="form-control" id="value" placeholder="Enter value"
                                                   @if(isset($settings['whatsapp'])) value="{{ $settings['whatsapp'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="value">Pinterest</label>
                                            <input type="text" name="settings[pinterest]"
                                                   class="form-control" id="value" placeholder="Enter value"
                                                   @if(isset($settings['pinterest'])) value="{{ $settings['pinterest'] }}" @endif>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-info float-right">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row layout-top-spacing">
            <div class="col-lg-12 col-12 layout-spacing">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                        <h4>Global SEO Info</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="value">Title</label>
                                            <input type="text" name="settings[meta_title]"
                                                   class="form-control" id="value"
                                                   placeholder="Enter value"
                                                   @if(isset($settings['meta_title'])) value="{{ $settings['meta_title'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="value">Keywords</label>
                                            <input type="text" name="settings[meta_keywords]"
                                                   class="form-control" id="value"
                                                   placeholder="Enter value"
                                                   @if(isset($settings['meta_keywords'])) value="{{ $settings['meta_keywords'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="value">Descriptions</label>

                                            <textarea name="settings[meta_descriptions]" class="textarea"
                                                      placeholder="Place some text here"
                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">@if(isset($settings['meta_descriptions'])){{ $settings['meta_descriptions'] }}@endif</textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info float-right">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
