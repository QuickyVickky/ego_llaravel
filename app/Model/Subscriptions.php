<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriptions extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id','email','is_subscribed'
    ];
}
