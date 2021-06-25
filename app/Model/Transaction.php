<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
    protected $fillable = [
        'id',
        'user_id',
        'recipient_id',
        'you_send',
        'send_currency_code',
        'fees_type',
        'fee_rate_amount',
        'fee_rate_usd',
        'remain_amount',
        'amount_get',
        'get_currency_code',
        'recipient_transfer_reason',
        'recipient_upload_front_input',
        'recipient_upload_back_input',
        'review_reference_for_recipient',
        'status',
        'accepted_date',
        'received_date',
        'complete_date',
        'cancel_date',
        'refund_date',
        'on_hold',
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function recipient() {
        return $this->hasOne(Recipient::class, 'id', 'recipient_id');
    }

    public function getCurrencyCode() {
        return $this->hasOne(Country::class, 'currency_code', 'get_currency_code');
    }

    public function sendCurrencyCode() {
        return $this->hasOne(Country::class, 'currency_code', 'send_currency_code');
    }
}
