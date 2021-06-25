<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PaymentOption extends Model
{
    protected $fillable = ['id','name','is_active'];

    static function getAll(){
        return PaymentOption::where("is_active",true)->pluck('name','id')->toArray();
    }
}
