<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankDetail extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id','user_id','country_id','type','bank_info','is_active'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function country(){
        return $this->belongsTo(Country::class,'country_id');
    }
}
