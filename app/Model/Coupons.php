<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupons extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name','code','type','method','amount','description',
        'start_date_time','end_date_time','max_total_usage',
        'maximum_discount_amount','is_active'
    ];

    public function getStartDateTimeAttribute($value)
    {
        return $this->start_date_time = date('d-m-Y H:i:s', strtotime($value));
    }

    public function getEndDateTimeAttribute($value)
    {
        return $this->end_date_time = date('d-m-Y H:i:s', strtotime($value));
    }

    protected $dates = [
        'start_date_time',
        'end_date_time',
    ];

}
