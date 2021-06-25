@extends('user.master')
@section('title','recipients')

@section('styles')
@endsection

@section('content')
@include('user.send_header')

<main class="dashboard-body">
    @if($arrRecipient)
        <div class="container">
            <div class="your-recipients p-4">
                <div class="row ">
                    <div class="top-boxs">
                        <h2 class="mb-3 dashboard-title">Your Recipients </h2>
                    </div>

                    <div class="accordion" id="faq">
                        @foreach($arrRecipient as $ar)
                            <div class="card">
                                <div class="card-header" id="faqhead{{ $ar['id'] }}">
                                    <a href="#" class="btn btn-header-link " data-toggle="collapse" data-target="#faq{{ $ar['id'] }}" aria-expanded="false" aria-controls="faq{{ $ar['id'] }}">
                                        <div class="accordion-box p-3 ">
                                            <div class="accordion-box-left">
                                                <span>{{ $ar['recipient_first_name'][0].$ar['recipient_last_name'][0] }}</span>

                                                <img src="{{ $ar['recipient_currency_flag'] }}" class="india-img" style="max-width: 21px;">
                                            </div>

                                            <div class="accordion-box-right">
                                                <h3>{{ $ar['recipient_first_name'] . ' ' . $ar['recipient_last_name'] }}</h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div id="faq{{ $ar['id'] }}" class="collapse" aria-labelledby="faqhead{{ $ar['id'] }}" data-parent="#faq">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label for="">Email</label>

                                                    <input type="email" class="form-control"  placeholder="{{ $ar['recipient_email'] }}">
                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="">Account holder name</label>

                                                    <input type="email" class="form-control"  placeholder="{{ $ar['recipient_first_name'] . ' ' . $ar['recipient_last_name'] }}">
                                                </div>
                                            </div>

                                            @foreach($ar['arrTransactioField'] as $atf)
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">{{ $atf['field_name'] }}</label>

                                                        <input type="email" class="form-control"  placeholder="{{ $atf['field_value'] }}">
                                                    </div>
                                                </div>
                                            @endforeach

                                            <div class="col-md-12">
                                                <div class="send-money">
                                                    <div class="send-money-btn">
                                                        <a href="{{ route('user.send.enterpayment') }}" class="btn btn-primary mb-3" style="padding-top: 10px;">Send money</a>
                                                    </div>

                                                    <div class="send-money-btn">
                                                        <button class="btn outdefault mb-3" onclick="deleteRecipient({{ $ar['id'] }})">Delete recipients</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="accordion-footer">
                        <div class="accordion-footer-btn">
                            <a href="{{ route('user.front.addRecipient') }}" class="btn btn-primary mb-3" style="padding-top: 10px;">Add a recipients</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="no-activity">
            <div class="no-activity-inner">
                <div class="activity-inner-img">
                    <img src=" {{ asset('front/images/Recipients-img.svg') }}">
                </div>

                <div class="activity-inner-text">
                    <p>Add one of your bank account or <br>Start by adding a recipients </p>

                    <a href="{{ route('user.front.addRecipient') }}" id="AddRecipients" class="btn btn-primary btn-fixwidth text-uppercase" style="padding-top: 10px;">Add a recipients</a>
                </div>
            </div>
        </div>
    @endif
</main>

@section('scripts')
    <script>
        function deleteRecipient(recipientId) {
            $.ajax({
                url: "{{ route('user.front.deleteRecipient') }}",
                type: 'POST',
                async: false,
                data: {
                    recipientId: recipientId,
                },
                headers: {
                   'X-CSRF-Token': $('#csrf_token').val()
                },
                success: function(data) {
                    window.location.href = '{{ route('user.front.recipient') }}';
                }
            });
        }
    </script>
@endsection