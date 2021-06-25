<?php

use App\Model\Country;
use App\Model\JWT;
use App\Model\User;
use App\Services\CustomService;
use Carbon\Carbon;
use App\Events\AlertEvent;
use App\Events\AlertEventUserWeb;
use Illuminate\Support\Facades\Log;


function pushNotificationToAdmin($title, $text1, $PUSHER_APP_CHANNELNAME, $PUSHER_APP_EVENTNAME, $icon='', $image='', $linkurl='') {
    try {
    event(new AlertEvent($title, $text1, $PUSHER_APP_CHANNELNAME, $PUSHER_APP_EVENTNAME, $icon, $image, $linkurl));
    } catch(\Exception $e) { }
    return true;
}

function pushNotificationToUser($title,$text1, $PUSHER_APP_CHANNELNAME, $PUSHER_APP_EVENTNAME, $user_id=0, $icon='',$image='',$linkurl='') {
    try {
    event(new AlertEventUserWeb($title, $text1, $PUSHER_APP_CHANNELNAME, $PUSHER_APP_EVENTNAME, $user_id,  $icon, $image, $linkurl));
    } catch(\Exception $e) { }
    return true;
}

function pushNotificationToUserApp($title,$text1='',$customer_id=0,$data=[]) {
        try {
        $userData = User::where('id', $customer_id)->where('type', Config::get('constants.userType.user'))->first(['device_token']);
        if($title=='' || empty($userData)){
            return ['success' => false, 'data' => [], 'msg' => ''];
        }
        
            $data = [
                "to" => @$userData->device_token,
                "notification" =>
                    [
                        "title" => $title,
                        "body" => $text1,
                        "sound" => true,
                        
                    ],
                "data" => [
                    "user_id" => $customer_id,
                    "custom_data" => $data,
                    ],
                ];

                $dataString = json_encode($data);

            $headers = [
                'Authorization: key=' . Config::get('constants.GOOGLE_FCM_SERVER_KEY') . '',
                'Content-Type: application/json',
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
            $result = curl_exec($ch);
            curl_close($ch);
        
            return ['success' => true, 'data' => ['result' => $result, 'data' => $data ], 'msg' => '' ];
        } catch (\Exception $e) {
            Log::error($e);
            return ['success' => false, 'data' => [], 'msg' => 'Error' ];
        } 
}


function responseMediaLink($file, $dirfolder) {
    $fileResponseLink = asset('images/default.png');
    if (strpos($file, 'http') !== false) {
        $fileResponseLink = $file;
    } else {
        if ($file != "" || $file != NULL) {
            $fileResponseLink = asset('/storage') . '/' . $dirfolder . '/' . $file;
        }
    }

    return $fileResponseLink;
}

function getCountry() {
    $country = Country::where("is_active", 1)->get();

    $arrCountry = [];
    foreach ($country as $cntry) {
        $varCountry = [
            'id'        => $cntry->id,
            'name'      => $cntry->name,
            'code'      => $cntry->code,
            'dial_code' => $cntry->dial_code,
        ];

        array_push($arrCountry, $varCountry);
    }

    return $arrCountry;
}

function getCurrency() {
    $dir = 'currency-flag';

    $currency = Country::where('type', 2)->where("is_active", 1)->get();

    $arrCurrency = [];
    foreach ($currency as $crncy) {
        $varCurrency = [
            'id'              => $crncy->id,
            'currency_name'   => $crncy->currency_name,
            'currency_symbol' => $crncy->currency_symbol,
            'currency_code'   => $crncy->currency_code,
            'currency_flag'   => responseMediaLink($crncy->currency_flag, $dir),
        ];

        array_push($arrCurrency, $varCurrency);
    }

    return $arrCurrency;
}

function uploadFile($file, $dir, $filecount = null) {
    $fileName = time() . $filecount . '.' . $file->getClientOriginalExtension();

    Storage::disk('public')->putFileAs($dir, $file, $fileName);

    return $fileName;
}

function uploadAjaxFile($file, $dir, $filecount = null) {
    $fileExt  = pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileName = time() . $filecount . '.' . $fileExt;

    move_uploaded_file($file['tmp_name'], "storage/" . $dir . "/" . $fileName);

    return $fileName;
}

function convertToDayDateTimeString($timestamp) {
    $dateTime = '';
    if ($timestamp) {
        $dateTime = Carbon::parse($timestamp)->toDayDateTimeString();
    }

    return $dateTime;
}

function getnewToken() {
    error_reporting(0);

    $header  = '{"typ":"JWT","alg":"HS256"}';
    $payload = "Egogram";
    $JWT     = new JWT;

    return $JWT->encode($header, $payload, date('Y-m-d H:i:s'));
}

function convertInDateFormat($timestamp) {
    $date = '';
    if ($timestamp) {
        $date = Carbon::parse($timestamp)->format('d/m/Y');
    }

    return $date;
}

function sendOTP($mobileNumber) {
    $otp = '111111';

    if (env('APP_ENV') != 'local') {
        if (env('app.APP_ENV') != 'production') {
            $mobileNumber = "+919409230217";
        }

        $otp         = $this->generateOTP();
        $msg         = "Dear user, Your OTP for Egogram is " . $otp . ".";
        $smsResponse = (new CustomService())->sendMessage($msg, $mobileNumber);

        if (isset($smsResponse) && $smsResponse['ErrorMessage'] != "Success") {
            Log::error("sendOtpFor failed:", [$smsResponse]);

            return response()->json([
                'success' => false,
                'message' => $smsResponse['ErrorMessage'],
            ]);
        }
    }

    return $otp;
}

function generateOTP() {
    return mt_rand(100000, 999999);
}

function userUniqId() {
    return strtoupper(uniqid());
}

function generateStringToken() {
    return Str::random(60);
}

function sendResetEmail($email, $token) {
    $user = User::select('first_name', 'last_name', 'email')->where('email', $email)->first();

    $link = route('user.password.reset', [
        $token,
        "email" => $user->email,
    ]);

    try {
        Mail::send('emails.forgot_password', ["user" => $user, "link" => $link], function ($message) use ($user) {
            $message->to($user['email'], $user['first_name'] . ' ' . $user['last_name'])
                ->subject("Your reset password link");
        });

        return true;
    } catch (\Exception $e) {
        return false;
    }
}

function exchangeCurrencyValue($amount, $from_currency_code, $to_currency_code) {
    $exchange = ExchangeRate::convert($amount, $from_currency_code, $to_currency_code, Carbon::now());

    $convertRate = ExchangeRate::exchangeRate($from_currency_code, $to_currency_code);

    $data = [
        'exchange'    => round($exchange, 2),
        'convertRate' => round($convertRate, 2),
    ];

    return $data;
}