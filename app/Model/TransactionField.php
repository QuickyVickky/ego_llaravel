<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TransactionField extends Model {
    protected $fillable = [
        'id',
        'recipient_id',
        'field_name',
        'field_value',
    ];
}
