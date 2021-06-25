<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\BankFields;
use App\Model\Fees;
use App\Model\Recipient;
use App\Model\Transaction;
use App\Model\TransactionField;
use App\Model\User;
use App\Model\Zelle;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Stripe;

class TransactionController extends Controller {

    public function enterPayment($transactionId = null) {
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

        $userId = Auth::id();

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

        return view('enterpayment')->with([
            'currency'        => $currency,
            'country'         => $country,
            'transfer'        => $transfer,
            'fees'            => $fees,
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
        ]);
    }
    
    public function sender() {
        return view('sender_info');
    }

    public function recipient() {
        return view('recipient_info');
    }

    public function uploadProof($number, Request $request) {
        $dir = 'id-proof';

        $fileName = uploadAjaxFile($_FILES['file'], $dir, $number);

        echo $fileName;
    }

    public function getBankFields(Request $request) {
        $bankFields = BankFields::with('bankFieldOption')->where('country_id', $request->country_id)->first();

        return $bankFields;
    }

    public function submitBankTransfer(Request $request) {
        
        
        if ($request->you_first_name != '') {
            $dob = $request->you_dob_year . '-' . Config('constants.insertMonth.' . $request->you_dob_month) . '-' . $request->you_dob_day;

            User::where('id', $request->user_id)->update([
                'first_name'    => $request->you_first_name,
                'last_name'     => $request->you_last_name,
                'date_of_birth' => Carbon::parse($dob)->format('Y-m-d'),
                'phone'         => $request->you_phone_number,
                // 'country'       => $request->you_country_id,
                'address'       => $request->you_address,
                'zipcode'       => $request->you_postcode,
                'state'         => $request->you_state,
            ]);
        }

        $recipientId = $request->recipient_id;
        if ($recipientId == '') {
            $recipient = Recipient::create([
                'user_id'              => $request->user_id,
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

        $exchangeCurrencyData = exchangeCurrencyValue($request->fee_rate_amount, $request->send_currency_code, 'USD');

        if ($request->transaction_id == '') {
            $transaction = Transaction::create([
                'user_id'                        => $request->user_id,
                'recipient_id'                   => $recipientId,
                'you_send'                       => $request->you_send,
                'send_currency_code'             => $request->send_currency_code,
                'fees_type'                      => $request->fees_type,
                'fee_rate_amount'                => $request->fee_rate_amount,
                'fee_rate_usd'                   => $exchangeCurrencyData['exchange'],
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
                'user_id'                        => $request->user_id,
                'recipient_id'                   => $recipientId,
                'you_send'                       => $request->you_send,
                'send_currency_code'             => $request->send_currency_code,
                'fees_type'                      => $request->fees_type,
                'fee_rate_amount'                => $request->fee_rate_amount,
                'fee_rate_usd'                   => $exchangeCurrencyData['exchange'],
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

        return true;
    }

    public function cancelTransfer(Request $request) {
        Transaction::where('id', $request->transaction_id)->update([
            'status'      => 'cancel',
            'cancel_date' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        pushNotificationToAdmin("Transaction Cancelled", "Transaction has been Cancelled.", env("APP_NAME"), env("APP_NAME"), $icon='', $image='', $linkurl='');

        return true;
    }

    public function paidTransfer(Request $request) {
        Transaction::where('id', $request->transaction_id)->update([
            'status'     => 'pending',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        pushNotificationToAdmin("Transaction", "Bank Transfer Transaction has been Paid.", env("APP_NAME"), env("APP_NAME"), $icon='', $image='', $linkurl='');

        return true;
    }

    public function stripePost(Request $request) {
        // return $request->all();

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $customer = \Stripe\Customer::create(array(
            'name'        => 'test',
            'description' => 'test description',
            'email'       => 'test@yopmail.com',
            'source'      => $request->stripeToken,
        ));

        try {
            $charge = Stripe\Charge::create([
                'customer'    => $customer->id,
                "amount"      => 100 * 100,
                "currency"    => "inr",
                "description" => "Test payment",
            ]);

        pushNotificationToAdmin("New Transaction", "New Transaction has been Done.", env("APP_NAME"), env("APP_NAME"), $icon='', $image='', $linkurl='');

            return 'success';
        } catch (Exception $e) {
            return 'Invalid card';
        }
    }
}
