@extends('user.master')
@section('title','recipients')

@section('styles')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')
@include('user.send_header')

<main class="dashboard-body">
    <div class="container p-5">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <form action="{{ route('user.updateProfile') }}" method="post" id="updateProfileForm" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">

                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <div>
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' name="image" id="imageUpload" accept=".png, .jpg, .jpeg" />

                                        <label for="imageUpload">
                                            <img src="{{ asset('images/edit.svg') }}" style="padding-top: 8px;">
                                        </label>
                                    </div>

                                    <div class="avatar-preview">
                                        <img class="profile-user-img img-responsive img-circle" id="imagePreview" src="{{ $user->image }}" alt="User profile picture">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="personal-information-title mt-4">
                                <div class="icon">
                                    <img src="{{ asset('images/user-info.svg') }}">
                                </div>

                                <h2 class="dashboard-title">
                                    <span>Personal information</span>
                                    <button disabled>
                                        <img src="{{ asset('images/edit-icon.svg') }}">

                                        <span>Edit</span>
                                    </button>
                                </h2>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">First name</label>

                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Last name</label>

                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>

                                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Date of birth</label>

                                <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $user->date_of_birth }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Gender</label>

                                <select name="gender" id="gender" class="form-control">
                                    @foreach($gender as $key => $value)
                                        <option value="{{ $key }}" {{ $key == $user->gender ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Phone</label>

                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="personal-information-title mt-4">
                                <div class="icon">
                                    <img src="{{ asset('images/Personal-address.svg') }}">
                                </div>

                                <h2 class=" dashboard-title">
                                    <span>Personal address</span>

                                    <button disabled>
                                        <img src="{{ asset('images/edit-icon.svg') }}">

                                        <span>Edit</span>
                                    </button>
                                </h2>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Country</label>

                                <select name="country" id="country" class="form-control" disabled>
                                    @foreach($country as $cntry)
                                        <option value="{{ $cntry['id'] }}" {{ $cntry['id'] == $user->country ? 'selected' : '' }}>{{ $cntry['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">State</label>

                                <input type="text" class="form-control" id="state" name="state" value="{{ $user->state }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Address</label>

                                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Postal code</label>

                                <input type="text" class="form-control" id="zipcode" name="zipcode" value="{{ $user->zipcode }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3"></div>

                        <div class="col-md-6">
                            <button type="button" id="updateProfile" class="mt-4 btn btn-primary text-uppercase w-100">Confirm</button>
                        </div>

                        <div class="col-md-3"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@section('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(document).ready(function() {
            $("#date_of_birth").datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
                yearRange: '1900:+0',
                maxDate: new Date()
            });

            $("#imageUpload").change(function(data){
                var imageFile = data.target.files[0];
                var reader = new FileReader();
                reader.readAsDataURL(imageFile);

                reader.onload = function(evt){
                    $('#imagePreview').attr('src', evt.target.result);
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
            });

            $('#updateProfile').click(function() {
                var first_name    = $('#first_name').val();
                var last_name     = $('#last_name').val();
                var email         = $('#email').val();
                var date_of_birth = $('#date_of_birth').val();
                var phone         = $('#phone').val();
                var state         = $('#state').val();
                var address       = $('#address').val();
                var zipcode       = $('#zipcode').val();

                var first_name_flage    = 0;
                var last_name_flage     = 0;
                var email_flage         = 0;
                var date_of_birth_flage = 0;
                var phone_flage         = 0;
                var state_flage         = 0;
                var address_flage       = 0;
                var zipcode_flage       = 0;

                if(first_name) {
                    first_name_flage = 1;
                }

                if(last_name) {
                    last_name_flage = 1;
                }

                if(email) {
                    email_flage = 1;
                }

                if(date_of_birth) {
                    date_of_birth_flage = 1;
                }

                if(phone) {
                    phone_flage = 1;
                }

                if(state) {
                    state_flage = 1;
                }

                if(address) {
                    address_flage = 1;
                }

                if(zipcode) {
                    zipcode_flage = 1;
                }

                if(first_name_flage == 1 && last_name_flage == 1 && email_flage == 1 && date_of_birth_flage == 1 && phone_flage == 1 && state_flage == 1 && address_flage == 1 && zipcode_flage == 1) {
                    $('#updateProfileForm').submit();
                } else {
                    alert('Please fill all data');

                    return false;
                }
            });
        });
    </script>
@endsection