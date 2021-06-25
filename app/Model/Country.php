<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {
	protected $fillable = [
		'id',
		'name',
		'code',
		'dial_code',
		'currency_name',
		'currency_symbol',
		'currency_code',
		'currency_flag',
		'type',
		'is_active',
		'created_at',
		'updated_at',
	];
}
