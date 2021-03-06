                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             @extends('admin.layouts.master')
@section('title','Promo codes |')
@section('css')
    <link href="{{ asset('/public/admin/plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset('/public/admin/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/public/admin/plugins/noUiSlider/nouislider.min.css') }}" rel="stylesheet" type="text/css">
    <!-- END THEME GLOBAL STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('/public/admin/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/public/admin/plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/public/admin/plugins/noUiSlider/custom-nouiSlider.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/public/admin/plugins/bootstrap-range-Slider/bootstrap-slider.css') }}" rel="stylesheet"
          type="text/css">
    <!--  END CUSTOM STYLE FILE  -->

@endsection

@section('breadcrumbs')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span><a href="{{ route('coupon.index') }}">Promo Codes</a></span>
            </li>
            <li class="breadcrumb-item active">Edit Promo Code</li>
        </ol>
    </nav>
@endsection

@section('content')

    <div class="row layout-top-spacing">
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="row">
                <div class="col-sm-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                    <h4>Edit Promo Code</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form method="post" action="{{ route('coupon.update',$coupon->id) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   id="name" placeholder="Enter name" value="{{ $coupon->name }}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="code">Code</label>
                                            <input type="text" name="code"
                                                   class="form-control @error('code') is-invalid @enderror"
                                                   id="code" placeholder="Enter code" value="{{ $coupon->code }}">
                                            @error('code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="type">Type</label>
                                            <select name="type" class="form-control @error('type') is-invalid @enderror"
                                                    id="type">
                                                <option value="flat" @if($coupon->type == 'flat')selected @endif>Flat
                                                </option>
                                                <option value="percentage"
                                                        @if($coupon->type == 'percentage')selected @endif>
                                                    Percentage
                                                </option>
                                            </select>
                                            @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="method">Method</label>
                                            <select name="method"
                                                    class="form-control @error('method') is-invalid @enderror"
                                                    id="method">
                                                <option value="coupons"
                                                        @if($coupon->method == 'coupons')selected @endif>
                                                    Coupons
                                                </option>
                                                <option value="vouchers"
                                                        @if($coupon->method == 'vouchers')selected @endif>
                                                    Vouchers
                                                </option>
                                            </select>
                                            @error('method')
                                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="amount">Amount</label>
                                            <input type="number" name="amount"
                                                   class="form-control @error('amount') is-invalid @enderror"
                                                   id="amount" placeholder="Enter amount" value="{{ $coupon->amount }}">
                                            @error('amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="start_date_time">Start Date Time</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                </div>
                                                <input name="start_date_time"
                                                    class="form-control flatpickr flatpickr-input active dateTimeFlatpickr @error('start_date_time') is-invalid @enderror"
                                                    type="text" placeholder="Enter start date time"
                                                    readonly="readonly"
                                                    value="{{ $coupon->start_date_time }}">
                                            </div>

                                            @error('start_date_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="start_date_time">End Date Time</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                </div>
                                                <input name="end_date_time"
                                                    class="form-control flatpickr flatpickr-input active dateTimeFlatpickr @error('end_date_time') is-invalid @enderror"
                                                    type="text" placeholder="Enter End date time"
                                                    readonly="readonly"
                                                    value="{{ $coupon->end_date_time }}">
                                            </div>

                                            @error('end_date_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="max_total_usage">Maximum Total Usage</label>
                                            <input type="number" name="max_total_usage"
                                                   class="form-control @error('max_total_usage') is-invalid @enderror"
                                                   id="max_total_usage" placeholder="Enter maximum total usage"
                                                   value="{{ $coupon->max_total_usage }}"/>
                                            @error('max_total_usage')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="maximum_discount_amount">Maximum Discount Amount</label>
                                            <input type="number" name="maximum_discount_amount"
                                                   class="form-control @error('maximum_discount_amount') is-invalid @enderror"
                                                   id="maximum_discount_amount"
                                                   placeholder="Enter maximum discount amount"
                                                   value="{{ $coupon->maximum_discount_amount }}">
                                            @error('maximum_discount_amount')
                                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-5">
                                        <div class="form-check pl-0">
                                            <div class="custom-control custom-checkbox checkbox-info">
                                                <input type="checkbox" name="is_active" class="custom-control-input"
                                                       id="hChkbox" @if($coupon->is_active == 1) checked @endif>
                                                <label class="custom-control-label" for="hChkbox">Is Active</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description"
                                                      class="form-control  @error('description') is-invalid @enderror"
                                                      rows="3"
                                                      placeholder="Enter description">{{ $coupon->description }}</textarea>
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <a class="btn btn-dark" href="{{ route('coupon.index') }}">
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

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('/public/admin/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('/public/admin/plugins/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('/public/admin/plugins/noUiSlider/nouislider.min.js') }}"></script>

    <script src="{{ asset('/public/admin/plugins/flatpickr/custom-flatpickr.js') }}"></script>
    <script src="{{ asset('/public/admin/plugins/noUiSlider/custom-nouiSlider.js') }}"></script>
    <script src="{{ asset('/public/admin/plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js') }}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        var defaultDate = $(".dateTimeFlatpickr").val();
        var f2 = flatpickr($(".dateTimeFlatpickr"), {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            minDate: "today",
            defaultDate:defaultDate
        });
    </script>
@endsection
