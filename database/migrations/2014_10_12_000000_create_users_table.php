<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->default(0);
            $table->unsignedBigInteger('customer_id')->unique()->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('google_id')->nullable();
            $table->enum('type', ['admin', 'user', 'recipient'])->default('user');
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('occupation', 50)->nullable();
            $table->string('reference')->nullable();
            $table->integer('otp')->nullable();
            $table->dateTime('otp_time')->nullable();
            $table->string('image', '255')->default('profile.png');
            $table->string('front_proof')->nullable();
            $table->string('back_proof')->nullable();
            $table->tinyInteger('is_proof_verified')->default(0)->comment = '0: Not Verified, 1: Verified';
            $table->string('user_uniqu_id')->nullable();
            $table->rememberToken();
            $table->tinyInteger('device_type')->default(1)->comment = '1: Android, 2: iOS';
            $table->string('device_token', 2000)->nullable();
            $table->tinyInteger('is_verified')->default(0)->comment = '0: Not Verified, 1: Verified';
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
        Schema::dropIfExists('users');
    }
}
