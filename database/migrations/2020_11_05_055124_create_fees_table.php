<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesTable extends Migration {

    public function up() {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['manual', 'debit', 'credit', 'zelle'])->default('manual');
            $table->float('percentage', 8, 2)->default('0.0');
            $table->tinyInteger('is_zelle')->default(0)->comment = '0: Not zelle, 1: Zelle';
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('fees');
    }
}
