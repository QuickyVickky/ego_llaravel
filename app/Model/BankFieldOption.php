<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankFieldOption extends Model {
    use SoftDeletes;

    protected $fillable = [
        'id',
        'bank_field_id',
        'field_type',
        'field_name',
        'field_value',
    ];

    protected $hidden = [
        'deleted_at',
    ];
}
