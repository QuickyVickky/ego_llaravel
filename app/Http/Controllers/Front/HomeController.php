<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller {

    public function index() {
        $userId = Auth::id();

        if ($userId) {
            return redirect()->route('user.allActivity');
        } else {
            $currency = getCurrency();

            return view('index')->with([
                'currency' => $currency,
            ]);
        }
    }

}
