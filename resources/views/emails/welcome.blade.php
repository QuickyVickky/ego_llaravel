@component('mail::message')
    # WELCOME {{ config('app.name') }}

    <p>Thank you for registering with {{config('app.url')}}</p>

    @component('mail::button', ['url' => config('app.url'), 'color'=>'black'])
        Go to Site
    @endcomponent

    @lang('Regards'),<br>
    {{ config('app.name') }}
    @endlang
@endcomponent
