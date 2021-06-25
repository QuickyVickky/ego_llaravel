<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\Recipient;
use App\Model\TransactionField;
use Illuminate\Http\Request;

class RecipientController extends Controller {
    public function getRecipient(Request $request) {
        $recipient = Recipient::where('user_id', $request->get('auth_user_id'))->with('transactionField', 'countryData')->get();

        $arrRecipient = [];
        foreach ($recipient as $rcp) {
            $arrTransactioField = [];
            foreach ($rcp->transactionField as $tf) {
                $varTransactioField = [
                    'id'          => $tf->id,
                    'field_name'  => $tf->field_name,
                    'field_value' => $tf->field_value,
                ];

                array_push($arrTransactioField, $varTransactioField);
            }

            $varRecipient = [
                'id'                      => $rcp->id,
                'user_id'                 => $rcp->user_id,
                'recipient_email'         => $rcp->recipient_email,
                'recipient_first_name'    => $rcp->recipient_first_name,
                'recipient_last_name'     => $rcp->recipient_last_name,
                'recipient_country_id'    => $rcp->recipient_country_id,
                'recipient_currency_flag' => responseMediaLink($rcp->countryData->currency_flag, 'currency-flag'),
                'arrTransactioField'      => $arrTransactioField,
            ];

            array_push($arrRecipient, $varRecipient);
        }

        return response()->json([
            'success' => Config('constants.validResponse.success'),
            'message' => 'Got recipients successfully.',
            'data'    => $arrRecipient,
        ], Config('constants.validResponse.statusCode'));
    }

    public function addRecipient(Request $request) {
        $recipient = Recipient::create([
            'user_id'              => $request->get('auth_user_id'),
            'recipient_country_id' => $request->recipient_country_id,
            'recipient_email'      => $request->recipient_email,
            'recipient_first_name' => $request->recipient_first_name,
            'recipient_last_name'  => $request->recipient_last_name,
        ]);

        foreach ($request->recipient_field_data as $rfd) {
            TransactionField::create([
                'recipient_id' => $recipient->id,
                'field_name'   => $rfd['field_name'],
                'field_value'  => $rfd['field_value'],
            ]);
        }

        return response()->json([
            'success' => Config('constants.validResponse.success'),
            'message' => 'Recipient inserted successfully.',
            'data'    => Config('constants.emptyData'),
        ], Config('constants.validResponse.statusCode'));
    }

    public function deleteRecipient(Request $request) {
        Recipient::where('id', $request->id)->delete();

        return response()->json([
            'success' => Config('constants.validResponse.success'),
            'message' => 'Recipient deleted successfully.',
            'data'    => Config('constants.emptyData'),
        ], Config('constants.validResponse.statusCode'));
    }
}
