<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use ExchangeRate;
use Illuminate\Http\Request;

class HomeController extends Controller {
    public function getCountry() {
        try {
            return response()->json([
                'success' => true,
                'message' => "Country list fetched successfully. ",
                'data'    => getCountry(),
            ]);
        } catch (\Exception $e) {
            return response()->json(['Success' => false, 'Message' => $e->getMessage()]);
        }
    }

    public function getCurrency(Request $request) {
        try {
            return response()->json([
                'success' => true,
                'message' => "Currency list fetched successfully.",
                'data'    => getCurrency(),
            ]);
        } catch (\Exception $e) {
            return response()->json(['Success' => false, 'Message' => $e->getMessage()]);
        }
    }

    public function exchangeCurrencyRate(Request $request) {
        $exchange = ExchangeRate::convert($request->amount, $request->from_currency_code, $request->to_currency_code, Carbon::now());

        $convertRate = ExchangeRate::exchangeRate($request->from_currency_code, $request->to_currency_code);

        $data = [
            'exchange'    => round($exchange, 2),
            'convertRate' => round($convertRate, 2),
        ];

        return $data;
    }
}
