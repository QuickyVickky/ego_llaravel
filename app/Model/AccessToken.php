<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccessToken extends Model {
    protected $table      = 'access_tokens';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'user_id',
        'accesstoken',
        'created_at',
        'updated_at',
    ];
}
