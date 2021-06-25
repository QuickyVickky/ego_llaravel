<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

//use GuzzleHttp\Client;
use App\Model\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Validator;

class TransferwiseController extends Controller {

	public function callAPI($url, $method = "get", $data = []) {
		try {
			$url = "https://api.sandbox.transferwise.tech/v1/" . $url;
			$headers = ['Authorization' => 'Bearer ' . config('constants.TRANSFERWISE_API_TOKEN')];
			if ($method == 'post') {
				$response = Http::withHeaders($headers)->post($url, $data);

			} elseif ($method == 'put') {
				$response = Http::withHeaders($headers)->put($url, $data);

			} else {
				$response = Http::withHeaders($headers)->get($url);
			}
			return $response;

		} catch (\Exception $e) {
			return response()->json(['Success' => false, 'Message' => $e->getMessage()]);
		}
	}

	public function updateProfile($url, $data) {

		try {
			$response = $this->callAPI($url, 'post');

			if ($response->successful()) {
				$result = $response->json()[0];
				return response()->json(['Success' => true, 'Message' => "Record Fetched Successfully.! ", "Data" => $result]);
			} else {
				return response()->json(['Success' => false, 'Message' => $response->json()['error']]);
			}

		} catch (\Exception $e) {

		}
	}

	public function exchangeRates($source, $target) {
		try {

			$url = "rates?source=" . $source . "&target=" . $target;

			$response = $this->callAPI($url);

			if ($response->successful()) {
				$result = $response->json()[0];
				return response()->json(['Success' => true, 'Message' => "Record Fetched Successfully.! ", "Data" => $result]);
			} else {
				return response()->json(['Success' => false, 'Message' => $response->json()['error']]);
			}

		} catch (\Exception $e) {
			return response()->json(['Success' => false, 'Message' => $e->getMessage()]);
		}
	}

	public function getAccountRequirement($quotesId, Request $request) {
		try {

			$url = "quotes/$quotesId/account-requirements";
			$response = $this->callAPI($url);

			if ($response->successful()) {
				$result = $response->json()[0];
				return response()->json(['Success' => true, 'Message' => "Quotes fetched Successfully.!", "Data" => $result]);
			} else {
				return response()->json(['Success' => false, 'Message' => $response->json()['error']]);
			}

		} catch (\Exception $e) {
			return response()->json(['Success' => false, 'Message' => $e->getMessage()]);
		}
	}

	public function getQuotesById($quotesId, Request $request) {
		try {

			$url = "quotes/$quotesId";
			$response = $this->callAPI($url);

			if ($response->successful()) {
				$result = $response->json();
				return response()->json(['Success' => true, 'Message' => "Quotes fetched Successfully.!", "Data" => $result]);
			} else {
				$errors = $response->json();
				return response()->json(['Success' => false, 'Message' => $errors['errors'][0]['message']]);
			}

		} catch (\Exception $e) {
			return response()->json(['Success' => false, 'Message' => $e->getMessage()]);
		}
	}

	public function createQuotes(Request $request) {
		try {

			$validator = Validator::make($request->all(), [
				'profile' => 'nullable',
				'sourceCurrency' => 'required',
				'targetCurrency' => 'required',
				'targetAmount' => 'required',
				'sourceAmount' => 'required',

			]);

			if ($validator->fails()) {
				return response()->json(['Success' => false, 'message' => 'Validation failed.', 'errors' => $validator->errors()], 422);
			}

			$validateData = $validator->validate();

			$url = "quotes";

			$data = [];
			$data['profile'] = '';
			$data['source'] = $validateData['sourceCurrency'];
			$data['target'] = $validateData['targetCurrency'];
			$data['rateType'] = 'FIXED';

			if ($validateData['sourceAmount'] > 0) {
				$data['sourceAmount'] = $validateData['sourceAmount'];
			} else if ($validateData['targetAmount'] > 0) {
				$data['targetAmount'] = $validateData['targetAmount'];
			}
//            $data['type'] = 'BALANCE_PAYOUT';

			$response = $this->callAPI($url, "post", $data);

			if ($response->successful() || isset($response->json()['id'])) {
				$result = $response->json();
				return response()->json(['Success' => true, 'Message' => "Quotes created Successfully.!", "Data" => $result]);
			} else {
//                $response->json()['errors']['message'];
				return response()->json(['Success' => false, 'Message' => 'Error.']);
			}

		} catch (\Exception $e) {
			return response()->json(['Success' => false, 'Message' => $e->getMessage()]);
		}
	}
	public function createTemporaryQuotes(Request $request) {
		try {

			$validator = Validator::make($request->all(), [
				'sourceCurrency' => 'required',
				'targetCurrency' => 'required',
				'targetAmount' => 'required',
				'sourceAmount' => 'required',
			]);

			if ($validator->fails()) {
				return response()->json(['Success' => false, 'message' => 'Validation failed.', 'errors' => $validator->errors()], 422);
			}

			$validateData = $validator->validate();

//            echo "<pre>";print_r($validateData);exit();
			$url = "quotes?source=" . $validateData['sourceCurrency'] . "&target=" . $validateData['targetCurrency'] . "&sourceAmount=" . $validateData['sourceAmount'] . "&rateType=FIXED";
			if ($validateData['targetAmount'] > 0) {
				$url = "quotes?source=" . $validateData['sourceCurrency'] . "&target=" . $validateData['targetCurrency'] . "&targetAmount=" . $validateData['targetAmount'] . "&rateType=FIXED";
			}

			$data = [];
			$response = $this->callAPI($url, "get", $data);

			if ($response->successful()) {
				$result = $response->json();
				return response()->json(['Success' => true, 'Message' => "Quotes get Successfully.!", "Data" => $result]);
			} else {
				return response()->json(['Success' => false, 'Message' => $response->json()]);
			}

		} catch (\Exception $e) {
			return response()->json(['Success' => false, 'Message' => $e->getMessage()]);
		}
	}

	public function createRecipient(Request $request) {
		try {
			$validateData = $request->all();

//            echo "<pre>";print_r(json_encode($validateData));exit();
			if (isset($validateData['details']['address']) && empty($validateData['details']['address'])) {
				$validateData['details'] = array_filter($validateData['details']);
			}

//            echo "<pre>";print_r(json_encode($validateData));exit();
			$url = "accounts";
			$response = $this->callAPI($url, "post", $validateData);

			if ($response->successful()) {
				$result = $response->json();

				//create recipient
				$name = explode(" ", $result['accountHolderName']);
				$userData['first_name'] = $name[0];
				$userData['last_name'] = isset($name[1]) ? $name[1] : '';
				$userData['email'] = isset($result['email']) ? $result['email'] : $validateData['email'];
				$userData['password'] = bcrypt(rand(1000000, 9999999));
				$userData['trw_profile'] = $result['id'];
				$userData['type'] = 'recipient';
				$userData['parent_id'] = Auth::user()->id;
				$user = User::where("email", $validateData['email'])->first();

				if (empty($user)) {
					$user = User::create($userData);
				}

				return response()->json(['Success' => true, 'Message' => "Record Fetched Successfully.!", "Data" => $result]);
			} else {
				$errorData = $response->json();
				return response()->json(['Success' => false, 'Message' => $errorData['errors'][0]['message']]);
			}

		} catch (\Exception $e) {
			return response()->json(['Success' => false, 'Message' => $e->getMessage()]);
		}
	}

	public function getProfileDetail(Request $request) {
		try {

			$profile = Auth::user()->trw_profile;
			$url = "profiles/" . $profile;
			$response = $this->callAPI($url);

			if ($response->successful()) {
				$result = $response->json();
				return response()->json(['Success' => true, 'Message' => "Profile fetched Successfully.!", "Data" => $result]);
			} else {
				$errorData = $response->json();
				return response()->json(['Success' => false, 'Message' => 'Profile fetched failed.', 'Cause' => $errorData['errors']]);
			}

		} catch (\Exception $e) {
			return response()->json(['Success' => false, 'Message' => $e->getMessage()]);
		}
	}

	public function getAllRecipient(Request $request) {
		try {

			$profile = Auth::user()->trw_profile;
			$url = "accounts?profiles=" . $profile;
			$response = $this->callAPI($url);

			if ($response->successful()) {
				$result = $response->json();
				return response()->json(['Success' => true, 'Message' => "Recipients fetched Successfully.!", "Data" => $result]);
			} else {
				$errorData = $response->json();
				return response()->json(['Success' => false, 'Message' => 'Recipients fetch failed.', 'Cause' => $errorData['errors']]);
			}

		} catch (\Exception $e) {
			return response()->json(['Success' => false, 'Message' => $e->getMessage()]);
		}
	}
}
