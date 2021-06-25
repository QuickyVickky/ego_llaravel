@extends('user.master')
@section('title','recipients')
@section('content')
@include('user.send_header')

<div class="dashboard-body">
    <div class="container p-5">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <h2 class="mb-3 dashboard-title">Add a recipients</h2>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Bank account Country</label>

                            <div class="form-inner">
                                <select class="form-control" name="recipient_country" id="recipient_country" style="padding-left: .75rem;">
                                    <option value="">Select country</option>
                                    @foreach($country as $cntry)
                                        <option value="{{ $cntry['id'] }}">{{ $cntry['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Account holder Email Address</label>

                            <input type="text" class="form-control" name="recipient_email" id="recipient_email">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Account holder First Name</label>

                            <input type="email" class="form-control" name="recipient_first_name" id="recipient_first_name">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Account holder Last Name</label>

                            <input type="email" class="form-control" name="recipient_last_name" id="recipient_last_name">
                        </div>
                    </div>

                    <div id="zelleDiv" class="col-md-6">
                        <div class="form-group">
                            <label for="">Zelle Email / Mobile number</label>

                            <input type="text" name="recipient_zelle" id="recipient_zelle" class="form-control">
                        </div>
                    </div>
                </div>

                <h2 class=" mt-4 mb-3 dashboard-title">Recipients Bank details</h2>

                <div class="row" id="recipientBankFieldAccordingToCountry">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <button type="button" id="recipientContinueBtn" class="mt-4 btn btn-primary text-uppercase w-100">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#recipient_country').change(function() {
                selectRecipientCountry($(this).val());
            });

            $('#recipientContinueBtn').click(function() {
                if($('#recipient_country').val() == '') {
                    alert('Please select country');
                } else {
                    var checkRecipientData = checkRecipientSectionDataFilled();

                    if(checkRecipientData) {
                        var arrRecipientFieldData = [];
                        if($('#recipientBankFieldAccordingToCountry').children().length > 0) {
                            $($('#recipientBankFieldAccordingToCountry :input')).each(function(ind, val) {
                                arrRecipientFieldData.push({
                                    field_name: $(val).attr('name'),
                                    field_value: $(val).val(),
                                });
                            });
                        }

                        var recipientZelle = '';
                        if($('#recipient_country').val() == {{ Config('constants.us_country_id') }}) {
                            recipientZelle = $('#recipient_zelle').val();
                        }

                        var sbmtData = {
                            recipient_country_id : $('#recipient_country').val(),
                            recipient_email      : $('#recipient_email').val(),
                            recipient_first_name : $('#recipient_first_name').val(),
                            recipient_last_name  : $('#recipient_last_name').val(),
                            recipient_zelle      : recipientZelle,
                            recipient_field_data : arrRecipientFieldData,
                        };

                        $.ajax({
                            url: "{{ route('user.front.insertRecipient') }}",
                            type: 'POST',
                            async: false,
                            data: sbmtData,
                            headers: {
                               'X-CSRF-Token': $('#csrf_token').val()
                            },
                            success: function(data) {
                                window.location.href = '{{ route('user.front.recipient') }}';
                            }
                        });
                    }
                }
            });
        });

        function selectRecipientCountry(countryId) {
            if(countryId == {{ Config('constants.us_country_id') }}) {
                $('#zelleDiv').show();
            } else {
                $('#zelleDiv').hide();
            }

            $.ajax({
                url: "{{ route('user.send.getBankFields') }}",
                type: 'POST',
                async: false,
                data: {
                    country_id: countryId,
                },
                headers: {
                   'X-CSRF-Token': $('#csrf_token').val()
                },
                success: function(data) {
                    if(data == '') {
                        $('#recipientBankFieldAccordingToCountry').empty();
                    } else {
                        $('#recipientBankFieldAccordingToCountry').empty();

                        $(data.bank_field_option).each(function(ind, val) {
                            var fieldType = ``;

                            switch(val.field_type) {
                                case 1:
                                    fieldType += `<input type="text" name="` + val.field_name + `" id="` + val.field_name + `" class="form-control">`;
                                    break;
                                case 2:
                                    fieldType += `<input type="number" name="` + val.field_name + `" id="` + val.field_name + `" class="form-control">`;
                                    break;
                                default:
                                    fieldType += `<input type="text" name="recipient_account_number" id="recipient_account_number" class="form-control">`;
                            }

                            $('#recipientBankFieldAccordingToCountry').append(`
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>` + val.field_name + `</label>

                                        `+ fieldType +`
                                    </div>
                                </div>
                            `);
                        });
                    }
                }
            });
        }

        function checkRecipientSectionDataFilled() {
            var recipient_first_name = $('#recipient_first_name').val();
            var recipient_last_name  = $('#recipient_last_name').val();
            var recipient_email      = $('#recipient_email').val();
            var recipient_zelle      = $('#recipient_zelle').val();

            var recipient_first_name_flage = 0;
            var recipient_last_name_flage  = 0;
            var recipient_email_flage      = 0;
            var recipient_zelle_flage      = 0;

            if(recipient_first_name) {
                recipient_first_name_flage = 1;
            }

            if(recipient_last_name) {
                recipient_last_name_flage = 1;
            }

            if(recipient_email) {
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

                if(emailReg.test(recipient_email)) {
                    recipient_email_flage = 1;
                }
            }

            if($('#recipient_country').val() == {{ Config('constants.us_country_id') }}) {
                if(recipient_zelle) {
                    recipient_zelle_flage = 1;
                }
            } else {
                recipient_zelle_flage = 1;
            }

            var inputValueArrFlag = [];

            if($('#recipientBankFieldAccordingToCountry').children().length > 0) {
                $($('#recipientBankFieldAccordingToCountry :input')).each(function(ind, val) {
                    var inputValue = $(val).val();

                    if(inputValue) {
                        inputValueArrFlag.push(1);
                    } else {
                        inputValueArrFlag.push(0);
                    }
                });
            } else {
                alert('Please select valid country');

                return false;
            }

            if(recipient_first_name_flage == 1 && recipient_last_name_flage == 1 && recipient_email_flage == 1 && jQuery.inArray(0, inputValueArrFlag) == -1) {
                return true;
            } else {
                alert('Please fill proper data');

                return false;
            }
        }
    </script>
@endsection