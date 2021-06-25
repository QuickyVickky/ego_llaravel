<?php

namespace App\Console\Commands;

use App\Model\User;
use Illuminate\Console\Command;

class OTPExpiration extends Command
{
    protected $signature = 'expiring:otp';
    protected $description = 'Expiring otp when validity is over.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            $this->info('================== Job start ==================');
            $toDay = date('Y-m-d H:i:s');
            //send OTP date time is less then or equal to current time
            $users = User::whereNotNull("otp")->whereNotNull("otp_time")->get();

            if (!empty($users) && count($users) > 0) {

                foreach ($users as $user) {
                    $this->info('--------------------------------');
                    $this->info('user id: ' . $user->id);
                    $otpDateTime = date("Y-m-d H:i:s",strtotime('+2 minutes',strtotime($user->otp_time)));
                    if($otpDateTime <= $toDay) {
                        $user->otp = null;
                        $user->otp_time = null;
                        $user->save();

                        $this->info('OTP Status: Expired');
                        $this->info('--------------------------------');
                    }else{

                        $this->info('OTP Status: Active');
                        $this->info('--------------------------------');
                    }


                }
            } else {
                $this->info('no any OTP expired Yet.');
            }
            $this->info('================== Job end ==================');
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage() . "Cause".$e->getTraceAsString());
        }
    }
}
