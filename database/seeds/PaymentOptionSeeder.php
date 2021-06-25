<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentOptions = ['bank_transfer','bill_payment','airtime_top_up','store','cash'];
        foreach ($paymentOptions as $option)
            DB::table('payment_options')->insert([
                'name' => $option,
            ]);
    }
}
