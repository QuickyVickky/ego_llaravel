<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipient extends Model {
    use SoftDeletes;

    protected $fillable = [
        'id',
        'user_id',
        'recipient_country_id',
        'recipient_email',
        'recipient_first_name',
        'recipient_last_name',
        'recipient_zelle',
    ];

    public function transactionField() {
        return $this->hasMany(TransactionField::class, 'recipient_id', 'id');
    }

    public function countryData() {
        return $this->hasOne(Country::class, 'id', 'recipient_country_id');
    }
}
