<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zelle extends Model {
    use SoftDeletes;

    protected $fillable = [
        'id',
        'zelle_description',
    ];
}
