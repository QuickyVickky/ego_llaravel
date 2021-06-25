<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Fees extends Model {
    protected $fillable = [
        'type',
        'percentage',
        'is_zelle',
    ];
}
