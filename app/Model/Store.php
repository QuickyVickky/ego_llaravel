<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'id','name','email','description','mobile','address1','address2','city','state','country','zipcode','is_active','image'
    ];
}
