<?php

return [
    'emptyData'              => new \stdClass(),
    'validResponse'          => [
        'success'    => true,
        'statusCode' => 200,
    ],
    'invalidResponse'        => [
        'success'    => false,
        'statusCode' => 400,
    ],
    'invalidToken'           => [
        'success'    => false,
        'statusCode' => 401,
        'message'    => 'Unauthorized',
    ],

    'TRANSFERWISE_API_TOKEN' => '7cbacba8-7663-4816-8ca3-a1a47be20370',

    "TWILIO_SID"             => "AC2e8be4a79a51dbb7105abb0b2a746912",
    "TWILIO_AUTH_TOKEN"      => "d8dd2f46d06df0b4536dd162f3095bb1",
    "TWILIO_NUMBER"          => "+12184299137",

    'FeesType'               => [
        'manual' => 'Manual Bank Transfer',
        'credit' => 'Credit Card',
        'debit'  => 'Debit Card',
        'zelle'  => 'Zelle',
    ],

    'day'                    => [
        1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31,
    ],

    'month'                  => [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December',
    ],

    'insertMonth'            => [
        'January'   => 1,
        'February'  => 2,
        'March'     => 3,
        'April'     => 4,
        'May'       => 5,
        'June'      => 6,
        'July'      => 7,
        'August'    => 8,
        'September' => 9,
        'October'   => 10,
        'November'  => 11,
        'December'  => 12,
    ],

    'yearStart'              => 1900,

    'account_type'           => ['Savings', 'Current'],

    'transfer_reason'        => [
        'Reason-1',
        'Reason-2',
        'Reason-3',
        'Reason-4',
        'Reason-5',
    ],

    'bankFieldType'          => [
        1 => 'Text box',
        2 => 'Number',
        // 3 => 'Select box',
        // 4 => 'Radio button',
        // 5 => 'Check box',
    ],

    'transactionStatus'      => [
        'pending'  => 'Pending',
        'later'    => 'Later',
        'accepted' => 'Accepted',
        'received' => 'Received',
        'complete' => 'Completed',
        'cancel'   => 'Canceled',
        'refund'   => 'Refunded',
    ],

    'gender'                 => [
        'male'   => 'Male',
        'female' => 'Female',
    ],

    'is_proof_verified'      => [
        'notVerified' => 0,
        'verified'    => 1,
    ],

    'on_hold'                => [
        'notHold' => 0,
        'hold'    => 1,
    ],

    'us_country_id'          => 230,

    'is_zelle'               => [
        'notZelle' => 0,
        'Zelle'    => 1,
    ],

    'userType'               => [
        'admin' => 'admin',
        'user'    => 'user',
    ],

    "GOOGLE_FCM_SERVER_KEY"      => "d8dd2fvjv46d05655jfgfgfgh6df0b4536dd162f3095bb1itytyutyumvnvn",


];
