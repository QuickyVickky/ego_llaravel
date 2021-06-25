<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserBankDetail extends Model {
    protected $fillable = [
        'id',
        'user_id',
        'field_name',
        'field_value',
    ];
}
