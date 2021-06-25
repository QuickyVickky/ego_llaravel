@extends('user.master')
@section('title','Re upload proofs')

@section('styles')
    <style>
        @media (min-width: 1024px) {
            .card .card-header {
              display: none;
            }

            .card .collapse {
              display: block;
            }
        }

        #navbarCollapse {
            display: none !important;
        }


    </style>
@endsection

@section('content')
    @include('user.send_header')
    <div class="dashboard-body">
        <div class="sendmoney-tabs">
            <div class="sidebar">
                <ul id="tabs" class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Verification</a>
                    </li>
                </ul>
            </div>

            <div id="content" class="sm-content tab-content" role="tablist">
                <div class="card-body">
                    <h2 class="mb-3" id="recipient_upload_title_text">Proof</h2>

                    <p class="grey-text">Upload a photo or scan of your proof.</p>

                    <div class="row  mt-2">
                        <div class="col-lg-5 col-md-6 mb-3">
                            <div class="file-upload">
                                <div class="image-upload-wrap image-upload-wrap-front">
                                    <input class="file-upload-input" name="recipientUploadFrontInput" id="recipientUploadFrontInput" type='file' onchange="readURLFront(this);" accept="image/*" data-front-proof-name=""/>

                                    <div class="drag-text">
                                        <img src="{{ asset('images/upload.svg') }}" class="mb-3" height="50" alt="">

                                        <p class="mb-3">Upload the front side of your proof</p>
                                    </div>

                                    <div class="text-center">
                                        <button class="file-upload-btn btn btn-dark text-uppercase pl-5 pr-5" type="button" onclick="$('#recipientUploadFrontInput').trigger( 'click' )">Upload</button>
                                    </div>
                                </div>

                                <div class="file-upload-content file-upload-content-front">
                                    <img class="file-upload-image file-upload-image-front" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                        <span class="image-title image-title-front">Uploaded Image</span>

                                        <div>
                                            <a href="#" id="uploadAnotherImageFront" style="color: #255F99;">Uploaded another image</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-6">
                            <div class="file-upload">
                                <div class="image-upload-wrap image-upload-wrap-back">
                                    <input class="file-upload-input" name="recipientUploadBackInput" id="recipientUploadBackInput" type='file' onchange="readURLBack(this);" accept="image/*" data-back-proof-name=""/>

                                    <div class="drag-text">
                                        <img src="{{ asset('images/upload.svg') }}" class="mb-3" height="50" alt="">

                                        <p class="mb-3">Upload the back side of your proof</p>
                                    </div>

                                    <div class="text-center">
                                        <button class="file-upload-btn btn btn-dark text-uppercase pl-5 pr-5" type="button" onclick="$('#recipientUploadBackInput').trigger( 'click' )">Upload</button>
                                    </div>
                                </div>

                                <div class="file-upload-content file-upload-content-back">
                                    <img class="file-upload-image file-upload-image-back" src="#" alt="your image" />

                                    <div class="image-title-wrap">
                                        <span class="image-title image-title-back">Uploaded Image</span>

                                        <div>
                                            <a href="#" id="uploadAnotherImageBack" style="color: #255F99;">Uploaded another image</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" id="recipientsUploadProofContinueBtn" class="btn btn-primary text-uppercase btn-fixwidth" style="margin-top: 3rem!important;">Continue</button>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('front/js/stripe.js') }}"></script>

    <script>
        $(document).ready(function() {
            var frontSideUploadProofFlag = 0;
            var backSideUploadProofFlag  = 0;

            $('#recipientsUploadProofContinueBtn').click(function() {
                //Upload front image
                if($('#recipientUploadFrontInput').attr('data-front-proof-name') == '') {
                    var imgExt = $('#recipientUploadFrontInput').val().split('.').pop().toLowerCase();

                    if($('#recipientUploadFrontInput').val() == ""){
                        // alert('Please select front side image');
                    } else {
                        if($.inArray(imgExt, ['png','jpg','jpeg']) == -1) {
                            alert('Please select jpg, jpeg, png files only');
                        } else {
                            frontSideUploadProofFlag = 1;
                        }
                    }

                    if(frontSideUploadProofFlag == 1) {
                        var fd    = new FormData();
                        var files = $('#recipientUploadFrontInput')[0].files[0];

                        fd.append('file', files);

                        $.ajax({
                            url: "{{ route('user.send.uploadProof', 1) }}",
                            type: 'POST',
                            async: false,
                            data: fd,
                            headers: {
                               'X-CSRF-Token': $('#csrf_token').val()
                            },
                            cache : false,
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                // alert('File successfully uploaded.');

                                $('#recipientUploadFrontInput').attr('data-front-proof-name', data);

                                $('#recipientUploadFrontInput').val('');
                                frontSideUploadProofFlag = 0;
                            }
                        });
                    }
                }

                // Upload back image
                if($('#recipientUploadBackInput').attr('data-back-proof-name') == '') {
                    var imgExt = $('#recipientUploadBackInput').val().split('.').pop().toLowerCase();

                    if($('#recipientUploadBackInput').val() == ""){
                        // alert('Please select back side image');
                    } else {
                        if($.inArray(imgExt, ['png','jpg','jpeg']) == -1) {
                            alert('Please select jpg, jpeg, png files only');
                        } else {
                            backSideUploadProofFlag = 1;
                        }
                    }

                    if(backSideUploadProofFlag == 1) {
                        var fd    = new FormData();
                        var files = $('#recipientUploadBackInput')[0].files[0];

                        fd.append('file', files);

                        $.ajax({
                            url: "{{ route('user.send.uploadProof', 2) }}",
                            type: 'POST',
                            async: false,
                            data: fd,
                            headers: {
                               'X-CSRF-Token': $('#csrf_token').val()
                            },
                            cache : false,
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                // alert('File successfully uploaded.');

                                $('#recipientUploadBackInput').attr('data-back-proof-name', data);

                                $('#recipientUploadBackInput').val('');
                                backSideUploadProofFlag = 0;
                            }
                        });
                    }
                }

                if($('#recipientUploadFrontInput').attr('data-front-proof-name') == '' || $('#recipientUploadBackInput').attr('data-back-proof-name') == '') {
                    alert('Please upload both front side and back side id proof');
                } else {
                    var sbmtData = {
                        user_id                      : {{ $userId }},
                        transaction_id               : {{ $transactionId }},
                        recipient_upload_front_input : $('#recipientUploadFrontInput').attr('data-front-proof-name'),
                        recipient_upload_back_input  : $('#recipientUploadBackInput').attr('data-back-proof-name'),
                    };

                    $.ajax({
                        url: "{{ route('user.submitReUploadProofs') }}",
                        type: 'POST',
                        async: false,
                        data: sbmtData,
                        headers: {
                           'X-CSRF-Token': $('#csrf_token').val()
                        },
                        success: function(data) {
                            alert('Proofs uploaded successfully.');

                            window.location.href = '{{ route('user.allActivity') }}';
                        }
                    });

                    return true;
                }
            });

            $('#uploadAnotherImageFront').click(function() {
                $('.image-upload-wrap-front').show();
                $('.file-upload-content-front').hide();

                $('#recipientUploadFrontInput').val('');
                $('#recipientUploadFrontInput').attr('data-front-proof-name', '');

                $('#recipientUploadFrontInput').trigger('click');
            });

            $('#uploadAnotherImageBack').click(function() {
                $('.image-upload-wrap-back').show();
                $('.file-upload-content-back').hide();

                $('#recipientUploadBackInput').val('');
                $('#recipientUploadBackInput').attr('data-back-proof-name', '');

                $('#recipientUploadBackInput').trigger('click');
            });
        });





        function recipientsUploadProof(text) {
            $('#recipient_upload_title_text').text(text);
            $('#recipient_upload_description_text').text(text);
            $('#recipient_upload_div_front_title_text').text(text);
            $('#recipient_upload_div_front_description_text').text(text);
            $('#recipient_upload_div_back_title_text').text(text);
            $('#recipient_upload_div_back_description_text').text(text);

            $('.recipients-screen-4').addClass('d-none');
            $('.recipients-screen-5').removeClass('d-none');
        }

        function recipientsChooseDifferentAccount() {
            $('#recipientUploadFrontInput').attr('data-front-proof-name', '');
            $('#recipientUploadBackInput').attr('data-back-proof-name', '');

            $('#recipientUploadFrontInput').val('');
            $('#recipientUploadBackInput').val('');

            $('.image-upload-wrap-front').show();
            $('.file-upload-content-front').hide();

            $('.image-upload-wrap-back').show();
            $('.file-upload-content-back').hide();

            $('.recipients-screen-5').addClass('d-none');
            $('.recipients-screen-4').removeClass('d-none');
        }
    </script>
@endsection
