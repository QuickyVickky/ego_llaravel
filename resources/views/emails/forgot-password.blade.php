@component('mail::message')
    # Hello,

    <p>
        Need a new password?

        Coming right up. To get a new password for your TransferWise account, just click the button below.

        <a href="{{ $data['link'] }}" style="">Get a new password</a>

        If you didn’t ask for a new password, you can ignore this email. Your current password will still work.
    </p>
@endcomponent
