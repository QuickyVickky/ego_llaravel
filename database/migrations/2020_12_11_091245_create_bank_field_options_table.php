<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankFieldOptionsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('bank_field_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bank_field_id');
            $table->boolean('field_type')->default(1)->comment = '1: Textbox, 2: Number, 3: Selectbox, 4: Radio button, 5: Checkbox';
            $table->string('field_name')->nullable();
            $table->string('field_value')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('bank_field_options');
    }
}
