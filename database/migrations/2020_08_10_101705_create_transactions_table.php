<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('recipient_id')->nullable();
            $table->double('you_send', 8, 2);
            $table->string('send_currency_code', 10);
            $table->enum('fees_type', ['manual', 'credit', 'debit'])->default('manual');
            $table->double('fee_rate_amount', 8, 2);
            $table->double('fee_rate_usd', 8, 2)->default(0)->nullable();
            $table->double('remain_amount', 8, 2);
            $table->double('amount_get', 8, 2);
            $table->string('get_currency_code', 10);
            $table->string('recipient_transfer_reason')->nullable();
            $table->string('recipient_upload_front_input')->nullable();
            $table->string('recipient_upload_back_input')->nullable();
            $table->string('review_reference_for_recipient')->nullable();
            $table->enum('status', ['later', 'pending', 'accepted', 'received', 'complete', 'cancel', 'refund'])->default('pending');
            $table->timestamp('accepted_date')->nullable();
            $table->timestamp('received_date')->nullable();
            $table->timestamp('complete_date')->nullable();
            $table->timestamp('cancel_date')->nullable();
            $table->timestamp('refund_date')->nullable();
            $table->tinyInteger('on_hold')->default(0)->comment = '0: Not on hold, 1: Hold';
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('transactions');
    }
}
