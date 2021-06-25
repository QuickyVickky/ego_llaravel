<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('countries', function (Blueprint $table) {
			$table->id();
			$table->string('name')->unique();
			$table->string('code');
			$table->string('dial_code');
			$table->string('currency_name')->nullable();
			$table->string('currency_symbol')->nullable();
			$table->string('currency_code');
			$table->string('currency_flag')->nullable();
			$table->boolean('type')->default(1)->comment = "1: Country, 2: Currency";
			$table->boolean('is_active')->default(1);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('countries');
	}
}
