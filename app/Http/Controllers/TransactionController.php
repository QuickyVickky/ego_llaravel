<?php

namespace App\Http\Controllers;

use App\Model\Transaction;
use App\Model\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;

class TransactionController extends Controller {

    public function index(Request $request) {

        $transactionStatus = $request->transaction_status;
        $feeType           = $request->fee_type;
        $transactionDate   = $request->transaction_date;
        $from              = '';
        $to                = '';

        if ($transactionDate) {
            $daterange = explode('-', $request->transaction_date);

            $from = Carbon::parse($daterange[0])->startOfDay()->toDateTimeString();
            $to   = Carbon::parse($daterange[1])->endOfDay()->toDateTimeString();
        }

        $transactions = Transaction::with([
            'user'      => function ($queryCountry) {
                $queryCountry->with('countryData');
            },
            'recipient' => function ($queryRecipient) {
                $queryRecipient->with('transactionField');
            },
        ])
            ->where(function ($qry) use ($transactionStatus, $feeType, $from, $to) {
                if ($transactionStatus) {
                    $qry->where('status', $transactionStatus);
                }

                if ($feeType) {
                    $qry->where('fees_type', $feeType);
                }

                if ($from != '' && $to != '') {
                    $qry->whereBetween('created_at', [$from, $to]);
                }
            })
            ->orderBy('id', 'desc')
            ->get();

        $dateRange = '';
        if ($from != '' && $to != '') {
            $dateRange = Carbon::parse($from)->format('m/d/Y') . ' - ' . Carbon::parse($to)->format('m/d/Y');
        }

        return view("admin.transaction.list")->with([
            'transactions'      => $transactions,
            'transactionStatus' => $transactionStatus,
            'feeType'           => $feeType,
            'dateRange'         => $dateRange,
        ]);
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        //
    }

    public function show(Transaction $transaction) {
        $transactions = Transaction::with([
            'user'      => function ($queryCountry) {
                $queryCountry->with('countryData');
            },
            'recipient' => function ($queryRecipient) {
                $queryRecipient->with('transactionField');
            },
        ])
        ->where('id', $transaction->id)
        ->first();

        $arrBankField = [];
        foreach ($transactions->recipient->transactionField as $trtf) {
            $varBankField = [
                'field_name'  => $trtf->field_name,
                'field_value' => $trtf->field_value,
            ];

            array_push($arrBankField, $varBankField);
        }

        $transactionStatus = [];
        switch ($transactions->status) {
        case 'pending':
            $transactionStatus = [
                'pending'  => Config('constants.transactionStatus.pending'),
                'accepted' => Config('constants.transactionStatus.accepted'),
                'cancel'   => Config('constants.transactionStatus.cancel'),
            ];
            break;
        case 'accepted':
            $transactionStatus = [
                'accepted' => Config('constants.transactionStatus.accepted'),
                'received' => Config('constants.transactionStatus.received'),
                'cancel'   => Config('constants.transactionStatus.cancel'),
            ];
            break;
        case 'received':
            $transactionStatus = [
                'received' => Config('constants.transactionStatus.received'),
                'complete' => Config('constants.transactionStatus.complete'),
                'cancel'   => Config('constants.transactionStatus.cancel'),
            ];
            break;
        case 'complete':
            $transactionStatus = [
                'complete' => Config('constants.transactionStatus.complete'),
            ];
            break;
        case 'cancel':
            $transactionStatus = [
                'cancel' => Config('constants.transactionStatus.cancel'),
                'refund' => Config('constants.transactionStatus.refund'),
            ];
            break;
        case 'refund':
            $transactionStatus = [
                'refund' => Config('constants.transactionStatus.refund'),
            ];
            break;
        default:
            $transactionStatus = Config('constants.transactionStatus');
        }

        $frontSideProof = $transactions->recipient_upload_front_input;
        $backSideProof  = $transactions->recipient_upload_back_input;
        if ($transactions->user->is_proof_verified == Config('constants.is_proof_verified.verified')) {
            $frontSideProof = $transactions->user->front_proof;
            $backSideProof  = $transactions->user->back_proof;
        }

        $data = [
            'id'                             => $transactions->id,
            'user_uniqu_id'                  => $transactions->user->user_uniqu_id,
            'sender_name'                    => $transactions->user->first_name . ' ' . $transactions->user->last_name,
            'sender_email'                   => $transactions->user->email,
            'sender_phone'                   => $transactions->user->countryData->dial_code . ' ' . $transactions->user->phone,
            'sender_address'                 => $transactions->user->address . ', ' . $transactions->user->state . ', ' . $transactions->user->countryData->name . ' - ' . $transactions->user->zipcode,
            'recipient_name'                 => $transactions->recipient->recipient_first_name . ' ' . $transactions->recipient->recipient_last_name,
            'recipient_email'                => $transactions->recipient->recipient_email,
            'recipient_zelle'                => $transactions->recipient->recipient_zelle,
            'fee_type'                       => $transactions->fees_type,
            'transfer_amount'                => $transactions->you_send . ' ' . $transactions->send_currency_code,
            'recieved_amount'                => $transactions->amount_get . ' ' . $transactions->get_currency_code,
            'status'                         => $transactions->status,
            'arrBankField'                   => $arrBankField,
            'recipient_transfer_reason'      => $transactions->recipient_transfer_reason,
            'review_reference_for_recipient' => $transactions->review_reference_for_recipient,
            'recipient_upload_front_input'   => responseMediaLink($frontSideProof, 'id-proof'),
            'recipient_upload_back_input'    => responseMediaLink($backSideProof, 'id-proof'),
            'transactionStatus'              => $transactionStatus,
            'user_id'                        => $transactions->user->id,
            'is_proof_verified'              => $transactions->user->is_proof_verified,
        ];

        return view("admin.transaction.detail-list")->with([
            'data' => $data,
        ]);
    }

    public function edit(Transaction $transaction) {
        //
    }

    public function update(Request $request, Transaction $transaction) {
        //
    }

    public function destroy(Transaction $transaction) {
        //
    }

    public function changeTransactionStatus(Request $request) {

        switch ($request->transaction_status) {
        case 'accepted':
            Transaction::where('id', $request->transaction_id)->update([
                'status'        => $request->transaction_status,
                'accepted_date' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            break;

        case 'received':
            Transaction::where('id', $request->transaction_id)->update([
                'status'        => $request->transaction_status,
                'received_date' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            break;

        case 'complete':
            Transaction::where('id', $request->transaction_id)->update([
                'status'        => $request->transaction_status,
                'complete_date' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            break;

        case 'refund':
            Transaction::where('id', $request->transaction_id)->update([
                'status'      => $request->transaction_status,
                'refund_date' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            break;

        default:
            Transaction::where('id', $request->transaction_id)->update([
                'status' => $request->transaction_status,
            ]);
            break;
        }

        
        if(isset($request->transaction_status) && isset($request->user_id)){
        pushNotificationToUser($request->transaction_status, "Transaction ".$request->transaction_status, env("APP_NAME"), env("APP_NAME"), $request->user_id, $icon='',$image='',$linkurl='');
        pushNotificationToUserApp($request->transaction_status, "Transaction ".$request->transaction_status, $request->user_id, [ 'transaction_id' => $request->transaction_id, 'transaction_status' => $request->transaction_status ]);
        }


        return redirect()->route('transaction.index')->withSuccess("Status updated successfully.!");
    }

    public function changeProofVerifiedStatus($transactionId, $userId, $status) {
        $transaction = Transaction::where('id', $transactionId)->first();

        $isProofVerified = Config('constants.is_proof_verified.notVerified');
        $onHold          = Config('constants.on_hold.hold');
        $changeStatus    = 'later';
        $msg             = 'Your uploaded proofs are rejected. Please upload valid proof for transaction';
        $mailPage        = 'emails.not-verify-proof';
        if ($status == Config('constants.is_proof_verified.verified')) {
            $isProofVerified = Config('constants.is_proof_verified.verified');
            $onHold          = Config('constants.on_hold.notHold');
            $changeStatus    = 'pending';
            $msg             = 'Your uploaded proofs are verified and your transaction will be done withing few days.';
            $mailPage        = 'emails.verify-proof';
        }

        User::where('id', $userId)->update([
            'front_proof'       => $transaction->recipient_upload_front_input,
            'back_proof'        => $transaction->recipient_upload_back_input,
            'is_proof_verified' => $isProofVerified,
        ]);

        Transaction::where('id', $transactionId)->update([
            'status'  => $changeStatus,
            'on_hold' => $onHold,
        ]);

        $user = User::where('id', $userId)->first();

        $data = [
            'Name'          => $user->first_name . ' ' . $user->last_name,
            'msg'           => $msg,
            'userId'        => $userId,
            'transactionId' => $transactionId,
        ];

        Mail::send($mailPage, $data, function ($message) use ($user) {
            $message->from('xyz@gmail.com', 'Egogram')
                ->to($user->email, $user->first_name)
                ->subject('Verify proof');
        });

        if ($status == Config('constants.is_proof_verified.verified')) {
            return redirect()->back(); // ->withSuccess("Verified status updated successfully.!");
        } else {
            return redirect()->route('transaction.index');
        }
    }
}
