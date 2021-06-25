<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankFields extends Model {
    use SoftDeletes;

    protected $fillable = ['id', 'country_id', 'title'];

    protected $hidden = [
        'deleted_at',
    ];

    public function country() {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function bankFieldOption() {
        return $this->hasMany(BankFieldOption::class, 'bank_field_id', 'id');
    }

    public static function filedTypes() {
        return $types = ['text' => 'Text', 'number' => 'Number', 'select' => 'Select', 'radio' => 'Radio', 'check' => 'Check Box'];
    }
}
