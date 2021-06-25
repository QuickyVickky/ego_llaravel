@extends('admin.layouts.master')
@section('title','Bank Info Create |')
@section('css')
    <link href="{{ asset('admin/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumbs')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('store.index') }}">Store</a></li>
            <li class="breadcrumb-item active">Create Store</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="row layout-top-spacing" id="app">
{{--        <template>--}}
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="row">
                <div class="col-sm-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                    <h4>Create a new store</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form method="post" action="{{ route('store.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group required">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control @error('type') is-invalid @enderror" id="name" placeholder="Enter name" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group required">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" value="{{ old('email') }}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group required">
                                            <label for="code">Mobile</label>
                                            <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" id="code" placeholder="Enter mobile" value="{{ old('mobile') }}">
                                            @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group required">
                                            <label for="code">Address1</label>
                                            <textarea name="address1" class="form-control @error('address1') is-invalid @enderror" placeholder="Enter Address" id="address1">{{ old('address1') }}</textarea>
                                            @error('address1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="code">Address2</label>
                                            <textarea name="address2" class="form-control @error('address2') is-invalid @enderror" placeholder="Enter Address" id="address2">{{ old('address2') }}</textarea>
                                            @error('address2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group required">
                                            <label for="type">Country</label>
                                            <select name="country" id="country" v-model="country" class="form-control @error('country') is-invalid @enderror">
                                                <option value="">Select Country</option>
                                                @foreach (\App\Model\Country::all() as $country)
                                                    <option value="{{ $country->code }}">
                                                       {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group required">
                                            <label for="state">State</label>
                                            <select name="state" id="state" class="form-control @error('state') is-invalid @enderror">
                                                <option v-for="state in states" :key="state.id" v-text="state.name"></option>
                                            </select>
                                            @error('state')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group required">
                                            <label for="city">City</label>
                                            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" id="city" value="{{ old('city') }}"/>
                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group required">
                                            <label for="zipcode">Zip code</label>
                                            <input type="text" name="zipcode" id="zipcode" class="form-control @error('zipcode') is-invalid @enderror" value="{{ old('zipcode') }}"/>
                                            @error('zipcode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-2 mb-3">
                                        <div class="form-check pl-0">
                                            <div class="custom-control custom-checkbox checkbox-info">
                                                <input type="checkbox" name="is_active" class="custom-control-input" id="hChkbox">
                                                <label class="custom-control-label" for="hChkbox">Is Active</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-sm-12">
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
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="custom-file-container" data-upload-id="myFirstImage">
                                            <label>Store Image <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file" >
                                                <input type="file" name="image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>

                                </div>
                                <a class="btn btn-dark" href="{{ route('store.index') }}">Cancel</a>
                                <button type="submit" class="btn btn-info float-right">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--        </template>--}}
    </div>

@endsection

@section('js')

    <script src="{{ asset('admin/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('admin/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            //First upload
            var firstUpload = new FileUploadWithPreview('myFirstImage');
        });

    </script>

    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        new Vue({
            el: '#app',
            data: {
                country:'',
                states:[],
            },
            mounted() {

            },
            methods:{
                getStates(countryCode){
                    try{
                        axios.get('/api/states/'+countryCode)
                            .then(response => {
                                console.log("response",response.data.Data);
                                this.states = response.data.Data;
                            });
                    }catch (e) {
                        console.log('Error:',e.message);
                    }
                }
            },
            watch:{
                country:function () {
                    // console.log("country",this.country);
                    this.getStates(this.country);
                }
            }
        })
    </script>
@endsection
