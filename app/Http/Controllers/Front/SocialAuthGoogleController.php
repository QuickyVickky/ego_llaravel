<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\User;
use App\Services\CustomService;
use Auth;
use JWTAuth;
use Session;
use Socialite;

class SocialAuthGoogleController extends Controller {

	public function redirect() {
		return Socialite::driver('google')->redirect();
	}

	public function callback() {
		try {
			$googleData = Socialite::driver('google')->user();

			Session::flash("googleData", $googleData);

			$user = User::where('google_id', $googleData->id)->first();

			if ($user) {
				if (env('APP_ENV') != 'local') {
					$number = $user->phone;
					if (env('app.APP_ENV') != 'production') {
						$number = "+917405252052";
					}
					$user->otp = User::generateOTP();
					$msg = "Dear user, Your OTP for Egogram is " . $user->otp . ".";
					$smsResponse = (new CustomService())->sendMessage('otp', $number, $msg);
					if (isset($smsResponse) && $smsResponse['ErrorMessage'] != "Success") {
						Log::error("sendOtpFor failed:", [$smsResponse]);
						return response()->json(['Success' => false, 'Message' => $smsResponse['ErrorMessage']]);
					}
				} else {
					$user->otp = '111111';
				}

				$user->otp_time = date("Y-m-d H:i");
				$user->save();
				Session::flush();
				Auth::logout();
				Session::put("userId", $user->id);
				return redirect()->route('user.verification')->withSuccess("OTP sent successfully.");
			} else {
				return redirect()->route('user.registration');
			}
		} catch (Exception $e) {
			dd($e->getMessage());
		}
	}

	public function redirectVue($providerId) {
		$user = User::where("provider_id", $providerId)->first();
		auth()->login($user);
		$token = JWTAuth::fromUser($user);
		$data['user'] = $user;
		$data['access_token'] = $token;
		return view("socialLogin", compact("data"));
	}
}
