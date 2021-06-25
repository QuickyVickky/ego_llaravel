@extends('admin.layouts.master')
@section('title','Edit Profile |')
@section('css')

    <link href="{{ asset('admin/assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/dropify/dropify.min.css') }}">

    <link href="{{ asset('admin/plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset('admin/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/plugins/noUiSlider/nouislider.min.css') }}" rel="stylesheet" type="text/css">
    <!-- END THEME GLOBAL STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('admin/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/plugins/noUiSlider/custom-nouiSlider.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/plugins/bootstrap-range-Slider/bootstrap-slider.css') }}" rel="stylesheet"
          type="text/css">
@endsection

@section('breadcrumbs')

    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('account.profile') }}">My Profile</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">Edit Profile</a></li>
        </ol>
    </nav>

@endsection

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <form action="{{ route('account.profile.update') }}" method="post" enctype="multipart/form-data"
                  id="general-info" class="section general-info">
                @csrf
                <div class="account-content">
                    <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll"
                         data-offset="-100">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">

                                <div class="info">
                                    <h6 class="">General Information</h6>
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-12 col-md-4">
                                                    <div class="upload mt-4 pr-md-4">
                                                        <input type="file" name="image" id="input-file-max-fs"
                                                               class="dropify"
                                                               data-default-file="@if($user->image == 'profile.png') {{ asset('images/'.$user->image) }} @else {{ Storage::url($user->image) }} @endif"
                                                               data-max-file-size="2M"/>
                                                        <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>
                                                            Upload Picture</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <div class="form-group required">
                                                                    <label for="first_name">First Name</label>
                                                                    <input type="text" name="first_name"
                                                                           class="form-control mb-4  @error('first_name') is-invalid @enderror" id="first_name"
                                                                           placeholder="First Name"
                                                                           value="{{ old('first_name',$user->first_name) }}">
                                                                </div>
                                                                @error('first_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-sm-4">
                                                                <div class="form-group required">
                                                                    <label for="last_name">Last Name</label>
                                                                    <input type="text" name="last_name"
                                                                           class="form-control mb-4  @error('last_name') is-invalid @enderror" id="last_name"
                                                                           placeholder="Last Name"
                                                                           value="{{ old('last_name',$user->last_name) }}">
                                                                </div>
                                                                @error('last_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-sm-4">
                                                                <div class="form-group required">
                                                                    <label for="email">Email</label>
                                                                    <input type="text" name="email"
                                                                           class="form-control mb-4 @error('email') is-invalid @enderror" id="last_name"
                                                                           placeholder="Email address"
                                                                           value="{{ old('email',$user->email) }}">
                                                                </div>
                                                                @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group required">
                                                                    <label for="phone">Phone</label>
                                                                    <input type="text" name="phone"
                                                                           class="form-control mb-4 @error('phone') is-invalid @enderror" id="phone"
                                                                           placeholder="phone number"
                                                                           value="{{ old('phone',$user->phone) }}">
                                                                </div>
                                                                @error('phone')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-xl-4 col-md-4 col-sm-6 col-6">
                                                                <div class="form-group">
                                                                    <label for="gender">Gender</label>
                                                                    <select name="gender" id="gender" class="form-control">
                                                                        <option name="male" @if($user->gender == 'male') selected @endif>Male</option>
                                                                        <option name="female" @if($user->gender == 'female') selected @endif>FeMale</option>
                                                                    </select>
                                                                    @error('gender')
                                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-4">
                                                                <label class="dob-input">Date of Birth</label>
                                                                <input name="date_of_birth"
                                                                       class="form-control mb-4 flatpickr flatpickr-input active dateTimeFlatpickr @error('date_of_birth') is-invalid @enderror"
                                                                       type="text"
                                                                       placeholder="Enter date of birth (2020-06-08)"
                                                                       readonly="readonly"
                                                                       value="{{ old('date_of_birth', $user->date_of_birth) }}">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group required">
                                                                    <label for="address1">Address1</label>
                                                                    <textarea name="address1"
                                                                              class="form-control  @error('address1') is-invalid @enderror" rows="3"
                                                                              placeholder="Enter address1">{{ old('address1',$user->address1) }}</textarea>
                                                                    @error('address1')
                                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="address2">Address2</label>
                                                                    <textarea name="address2"
                                                                              class="form-control  @error('address2') is-invalid @enderror" rows="3"
                                                                              placeholder="Enter address2">{{ old('address2',$user->address2) }}</textarea>
                                                                    @error('address2')
                                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-4">
                                                                <div class="form-group required">
                                                                    <label for="city">City</label>
                                                                    <input type="text" name="city"
                                                                           class="form-control  @error('city') is-invalid @enderror" rows="3"
                                                                           placeholder="Enter city" value="{{ old('city',$user->city) }}"/>
                                                                    @error('city')
                                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group required">
                                                                    <label for="state">State</label>
                                                                    <input type="text" name="state"
                                                                           class="form-control  @error('state') is-invalid @enderror" rows="3"
                                                                           placeholder="Enter state"  value="{{ old('state',$user->state) }}" />
                                                                    @error('state')
                                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group required">
                                                                    <label for="country">Country</label>
                                                                    <input type="text" name="country"
                                                                           class="form-control  @error('country') is-invalid @enderror" rows="3"
                                                                           placeholder="Enter country" value="india" value="{{ old('country',$user->country) }}"/>
                                                                    @error('country')
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
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="account-settings-footer">
                    <div class="as-footer-container">
                        <a id="multiple-reset" class="btn btn-dark" href="{{ route('account.profile') }}">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{ asset('admin/plugins/dropify/dropify.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/blockui/jquery.blockUI.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/users/account-settings.js')}}"></script>

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('admin/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('admin/plugins/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('admin/plugins/noUiSlider/nouislider.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/flatpickr/custom-flatpickr.js') }}"></script>
    <script src="{{ asset('admin/plugins/noUiSlider/custom-nouiSlider.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js') }}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        var defaultDate = $(".dateTimeFlatpickr").val();
        var f2 = flatpickr($(".dateTimeFlatpickr"), {
            enableTime: true,
            dateFormat: "Y-m-d",
            maxDate: "today",
            defaultDate: defaultDate
        });
    </script>
@endsection
