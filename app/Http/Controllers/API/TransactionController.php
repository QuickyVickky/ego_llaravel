<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\BankFields;
use App\Model\Fees;
use App\Model\Recipient;
use App\Model\Transaction;
use App\Model\TransactionField;
use App\Model\User;
use App\Model\UserBankDetail;
use App\Model\Zelle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller {
    public function enterPayment($transactionId = null, Request $request) {
        $currency = getCurrency();
        $country  = getCountry();

        $transfer        = Config('constants.FeesType');
        $account_type    = Config('constants.account_type');
        $transfer_reason = Config('constants.transfer_reason');

        $day       = Config('constants.day');
        $month     = Config('constants.month');
        $yearStart = Config('constants.yearStart');
        $yearEnd   = date('Y');

        $arrivingDate = Carbon::parse(Carbon::now()->addDays(2))->format('F d, Y');

        $userId = $request->get('auth_user_id');

        $user = User::with([
            'bankField' => function ($query) {
                $query->with('bankFieldOption');
            },
        ])
            ->where('id', $userId)
            ->first();

        $userCountry = $user->country;

        $fees = Fees::where(function ($queryFee) use ($userCountry) {
            if ($userCountry != Config('constants.us_country_id')) {
                $queryFee->where('is_zelle', Config('constants.is_zelle.notZelle'));
            }
        })
            ->get();

        $zelle = Zelle::first();

        $arrFee = [];
        foreach ($fees as $fee) {
            $varFee = [
                'id'         => $fee->id,
                'type'       => $fee->type,
                'name'       => $transfer[$fee->type],
                'percentage' => $fee->percentage,
            ];

            array_push($arrFee, $varFee);
        }

        $recipient = Recipient::with('transactionField', 'countryData')->where('user_id', $userId)->get();

        $transactions = [];
        if ($transactionId) {
            $transactions = Transaction::with([
                'user'      => function ($queryCountry) {
                    $queryCountry->with('countryData');
                },
                'recipient' => function ($queryRecipient) {
                    $queryRecipient->with('transactionField');
                },
                'sendCurrencyCode',
                'getCurrencyCode',
            ])
                ->where('id', $transactionId)
                ->orderBy('created_at', 'desc')
                ->first();

            $transactions->recipient_upload_front_input = responseMediaLink($transactions->recipient_upload_front_input, 'id-proof');
            $transactions->recipient_upload_back_input  = responseMediaLink($transactions->recipient_upload_back_input, 'id-proof');
        }

        $data = [
            'currency'        => $currency,
            'country'         => $country,
            'fees'            => $arrFee,
            'arrivingDate'    => $arrivingDate,
            'day'             => $day,
            'month'           => $month,
            'yearStart'       => $yearStart,
            'yearEnd'         => $yearEnd,
            'account_type'    => $account_type,
            'transfer_reason' => $transfer_reason,
            'userId'          => $userId,
            'user'            => $user,
            'recipient'       => $recipient,
            'transactions'    => $transactions,
            'zelle'           => $zelle,
        ];

        return response()->json([
            'success' => Config('constants.validResponse.success'),
            'message' => 'Got enter payment data successfully.',
            'data'    => $data,
        ], Config('constants.validResponse.statusCode'));
    }

    public function allActivity(Request $request) {
        $fromDate = '';
        $toDate   = '';

        if ($request->from_date != '' && $request->to_date != '') {
            $fromDate = Carbon::parse($request->from_date)->startOfDay()->toDateTimeString();
            $toDate   = Carbon::parse($request->to_date)->endOfDay()->toDateTimeString();
        }

        $transactions = Transaction::whereHas('recipient', function ($q) {
            $q->with('transactionField');
        })
            ->with([
                'user' => function ($queryCountry) {
                    $queryCountry->with('countryData');
                },
                'sendCurrencyCode',
                'getCurrencyCode',
            ])
            ->where('user_id', $request->get('auth_user_id'))
            ->where(function ($query) use ($fromDate, $toDate) {
                if ($fromDate != '' && $toDate != '') {
                    $query->whereBetween('created_at', [$fromDate, $toDate]);
                }
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $arrTransactions = [];
        foreach ($transactions as $trns) {
            $arrTransactionField = [];
            foreach ($trns->recipient->transactionField as $tf) {
                $varTransactionField = [
                    'field_name'  => $tf->field_name,
                    'field_value' => $tf->field_value,
                ];

                array_push($arrTransactionField, $varTransactionField);
            }

            $varTransactions = [
                'id'                 => $trns->id,
                'name'               => $trns->recipient->recipient_first_name . ' ' . $trns->recipient->recipient_last_name,
                'status'             => $trns->status,
                'send_currency_code' => $trns->send_currency_code,
                'you_send'           => $trns->you_send,
                'send_amount'        => $trns->sendCurrencyCode->currency_symbol . ' ' . $trns->you_send,
                'get_currency_code'  => $trns->get_currency_code,
                'amount_get'         => $trns->amount_get,
                'get_amount'         => $trns->getCurrencyCode->currency_symbol . ' ' . $trns->amount_get,
                'recipient_name'     => $trns->recipient->recipient_first_name . ' ' . $trns->recipient->recipient_last_name,
                'created_at'         => Carbon::parse($trns->created_at)->format('d-m-Y'),
                'panding_date'       => convertToDayDateTimeString($trns->created_at),
                'accepted_date'      => convertToDayDateTimeString($trns->accepted_date),
                'received_date'      => convertToDayDateTimeString($trns->received_date),
                'complete_date'      => convertToDayDateTimeString($trns->complete_date),
                'cancel_date'        => convertToDayDateTimeString($trns->cancel_date),
                'refund_date'        => convertToDayDateTimeString($trns->refund_date),
                'user_name'          => $trns->user->first_name . ' ' . $trns->user->last_name,
                'fee_rate_amount'    => number_format((float) $trns->fee_rate_amount, 2, '.', ''),
                'recipient_email'    => $trns->recipient->recipient_email,
                'transaction_field'  => $arrTransactionField,
            ];

            array_push($arrTransactions, $varTransactions);
        }

        // Make arrTransactions as TransactionDate's Groupwise
        $newArray = [];
        foreach ($arrTransactions as $key => $value) {
            $exists = 0;
            $i      = 0;

            $createdAt = $value['created_at'];
            $data      = $value;

            foreach ($newArray as $key2 => $value2) {
                if ($createdAt == $value2['created_at']) {
                    $newArray[$key2]['transaction'][] = $data;
                    $exists                           = 1;
                }
                $i++;
            }

            if ($exists == 0) {
                $newArray[$i]['created_at']    = $createdAt;
                $newArray[$i]['transaction'][] = $data;
            }
        }

        return response()->json([
            'success' => Config('constants.validResponse.success'),
            'message' => 'Got all activity successfully.',
            'data'    => $newArray,
        ], Config('constants.validResponse.statusCode'));
    }

    public function getBankFields(Request $request) {
        $bankFields = BankFields::with('bankFieldOption')->where('country_id', $request->country_id)->first();

        if (!$bankFields) {
            $data = Config('constants.emptyData');
        } else {
            $arrBankFieldOption = [];
            foreach ($bankFields->bankFieldOption as $bfo) {
                $varBankFieldOption = [
                    'id'          => $bfo->id,
                    'field_type'  => $bfo->field_type,
                    'field_name'  => $bfo->field_name,
                    'field_value' => $bfo->field_value,
                ];

                array_push($arrBankFieldOption, $varBankFieldOption);
            }

            $data = [
                'id'                => $bankFields->id,
                'country_id'        => $bankFields->country_id,
                'title'             => $bankFields->title,
                'bank_field_option' => $arrBankFieldOption,
            ];
        }

        return response()->json([
            'success' => Config('constants.validResponse.success'),
            'message' => 'Got all bank fields successfully.',
            'data'    => $data,
        ], Config('constants.validResponse.statusCode'));
    }

    public function submitBankTransfer(Request $request) {
        if ($request->you_first_name != '') {
            User::where('id', $request->get('auth_user_id'))->update([
                'first_name'    => $request->you_first_name,
                'last_name'     => $request->you_last_name,
                'date_of_birth' => Carbon::parse($request->date_of_birth)->format('Y-m-d'),
                'phone'         => $request->you_phone_number,
                // 'country'       => $request->you_country_id,
                'address'       => $request->you_address,
                'zipcode'       => $request->you_postcode,
                'state'         => $request->you_state,
            ]);

            foreach ($request->user_bank_detail as $ubd) {
                UserBankDetail::create([
                    'user_id'     => $request->get('auth_user_id'),
                    'field_name'  => $ubd['field_name'],
                    'field_value' => $ubd['field_value'],
                ]);
            }
        }

        $recipientId = $request->recipient_id;
        if ($recipientId == '') {
            $recipient = Recipient::create([
                'user_id'              => $request->get('auth_user_id'),
                'recipient_country_id' => $request->recipient_country_id,
                'recipient_email'      => $request->recipient_email,
                'recipient_first_name' => $request->recipient_first_name,
                'recipient_last_name'  => $request->recipient_last_name,
                'recipient_zelle'      => $request->recipient_zelle,
            ]);

            $recipientId = $recipient->id;

            foreach ($request->recipient_field_data as $rfd) {
                TransactionField::create([
                    'recipient_id' => $recipientId,
                    'field_name'   => $rfd['field_name'],
                    'field_value'  => $rfd['field_value'],
                ]);
            }
        } else {
            Recipient::where('id', $recipientId)->update([
                'recipient_zelle' => $request->recipient_zelle,
            ]);
        }

        if ($request->transaction_id == '') {
            $transaction = Transaction::create([
                'user_id'                        => $request->get('auth_user_id'),
                'recipient_id'                   => $recipientId,
                'you_send'                       => $request->you_send,
                'send_currency_code'             => $request->send_currency_code,
                'fees_type'                      => $request->fees_type,
                'fee_rate_amount'                => $request->fee_rate_amount,
                'remain_amount'                  => $request->remain_amount,
                'amount_get'                     => $request->amount_get,
                'get_currency_code'              => $request->get_currency_code,
                'recipient_transfer_reason'      => $request->recipient_transfer_reason,
                'recipient_upload_front_input'   => $request->recipient_upload_front_input,
                'recipient_upload_back_input'    => $request->recipient_upload_back_input,
                'review_reference_for_recipient' => $request->review_reference_for_recipient,
                'status'                         => $request->status,
            ]);
        } else {
            $transaction = Transaction::where('id', $request->transaction_id)->update([
                'user_id'                        => $request->get('auth_user_id'),
                'recipient_id'                   => $recipientId,
                'you_send'                       => $request->you_send,
                'send_currency_code'             => $request->send_currency_code,
                'fees_type'                      => $request->fees_type,
                'fee_rate_amount'                => $request->fee_rate_amount,
                'remain_amount'                  => $request->remain_amount,
                'amount_get'                     => $request->amount_get,
                'get_currency_code'              => $request->get_currency_code,
                'recipient_transfer_reason'      => $request->recipient_transfer_reason,
                'recipient_upload_front_input'   => $request->recipient_upload_front_input,
                'recipient_upload_back_input'    => $request->recipient_upload_back_input,
                'review_reference_for_recipient' => $request->review_reference_for_recipient,
                'status'                         => $request->status,
            ]);
        }


        pushNotificationToAdmin("New Transaction", "New Transaction has been Done.", env("APP_NAME"), env("APP_NAME"), $icon='', $image='', $linkurl='');

        return response()->json([
            'success' => Config('constants.validResponse.success'),
            'message' => 'Bank transfer data submitted successfully.',
            'data'    => Config('constants.emptyData'),
        ], Config('constants.validResponse.statusCode'));
    }

    public function cancelTransfer(Request $request) {
        Transaction::where('id', $request->transaction_id)->update([
            'status'      => 'cancel',
            'cancel_date' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        pushNotificationToAdmin("Transaction Cancelled", "Transaction has been Cancelled.", env("APP_NAME"), env("APP_NAME"), $icon='', $image='', $linkurl='');

        return response()->json([
            'success' => Config('constants.validResponse.success'),
            'message' => 'Bank transfer canceled successfully.',
            'data'    => Config('constants.emptyData'),
        ], Config('constants.validResponse.statusCode'));
    }

    public function paidTransfer(Request $request) {
        Transaction::where('id', $request->transaction_id)->update([
            'status'     => 'pending',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        pushNotificationToAdmin("Transaction", "Bank Transfer Transaction has been Paid.", env("APP_NAME"), env("APP_NAME"), $icon='', $image='', $linkurl='');

        return response()->json([
            'success' => Config('constants.validResponse.success'),
            'message' => 'Bank transfer paid successfully.',
            'data'    => Config('constants.emptyData'),
        ], Config('constants.validResponse.statusCode'));
    }

    public function getCancelTransferDetail(Request $request) {
        $userData = User::with('userBankDetail')->where('id', $request->get('auth_user_id'))->first();

        $arrUserBankDetail = [];
        foreach ($userData->userBankDetail as $ubf) {
            $varUserBankDetail = [
                'id'          => $ubf->id,
                'field_name'  => $ubf->field_name,
                'field_value' => $ubf->field_value,
            ];

            array_push($arrUserBankDetail, $varUserBankDetail);
        }

        $data = [
            'id'               => $userData->id,
            'first_name'       => $userData->first_name,
            'last_name'        => $userData->last_name,
            'email'            => $userData->email,
            'google_id'        => $userData->google_id,
            'date_of_birth'    => convertInDateFormat($userData->date_of_birth),
            'gender'           => $userData->gender,
            'phone'            => $userData->phone,
            'address'          => $userData->address,
            'city'             => $userData->city,
            'state'            => $userData->state,
            'country'          => $userData->country,
            'zipcode'          => $userData->zipcode,
            'image'            => responseMediaLink($userData->image, 'user'),
            'user_uniqu_id'    => $userData->user_uniqu_id,
            'device_type'      => $userData->device_type,
            'device_token'     => $userData->device_token,
            'otp'              => $userData->otp,
            'otp_time'         => $userData->otp_time,
            'accesstoken'      => $request->header('accesstoken'),
            'is_verified'      => $userData->is_verified,
            'user_bank_detail' => $arrUserBankDetail,
        ];

        return response()->json([
            'success' => Config('constants.validResponse.success'),
            'message' => 'Got cancel data successfully.',
            'data'    => $data,
        ], Config('constants.validResponse.statusCode'));
    }

    public function updateCancelTransferDetail(Request $request) {
        foreach ($request->user_bank_detail as $ubd) {
            UserBankDetail::where('id', $ubd['id'])->update([
                'field_name'  => $ubd['field_name'],
                'field_value' => $ubd['field_value'],
            ]);
        }

        return response()->json([
            'success' => Config('constants.validResponse.success'),
            'message' => 'Cancel data updated successfully.',
            'data'    => Config('constants.emptyData'),
        ], Config('constants.validResponse.statusCode'));
    }
}
