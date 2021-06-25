<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Country;
use App\Model\Recipient;
use App\Model\Transaction;
use App\Model\TransactionField;
use App\Model\User;
use App\Services\CustomService;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;
use Session;
use Str;

class UserController extends Controller {
    use AuthenticatesUsers;

    public function __construct() {
//        $this->middleware('guest')->except('logout');
    }

    public function login() {
        return view('login');
    }

    public function postLogin(Request $request) {
        $validateData = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);
        try {

            $credentials = ['email' => $request->email, 'password' => $request->password, 'type' => 'user'];
            $remember    = true;

            if (!Auth::attempt($credentials, $remember)) {
                return redirect()->back()->withError("Login failed. Invalid email or password.");
            }

            /* send otp */
            $user = User::find(Auth::user()->id);

            if (env('APP_ENV') != 'local') {
                $number = $user->phone;
                if (env('app.APP_ENV') != 'production') {
                    $number = "+919409230217";
                }
                $user->otp   = User::generateOTP();
                $msg         = "Dear user, Your OTP for Egogram is " . $user->otp . ".";
                $smsResponse = (new CustomService())->sendMessage($msg, $number);
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

        } catch (\Exception $e) {
//            return redirect()->back()->withError("Invalid user name and password.");
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return back();
    }

    public function verifyOTP(Request $request) {
        try {

            if (!Session::has("userId")) {
                return redirect()->back()->withError("Login failed. please retry to login.");
            }
            $userId = Session::get("userId");
            $user   = User::where("id", $userId)->first();
            return view('verification', compact('user'));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function postVerifyOTP(Request $request) {
        $validateData = $request->validate([
            'user_id' => 'required',
            'phone'   => 'required',
            'digit.*' => 'required',
        ]);

        try {

            $user = User::where("id", $request->user_id)->first();

            if (empty($user)) {
                return redirect()->back()->withError('Record not found int the system.');
            }
            $request->otp = implode("", $request->digit);

            if ($user->otp != $request->otp) {
                return redirect()->back()->withError('Verification failed. Invalid OTP.');
            }

            if ($user->otp_time == null) {
                return redirect()->back()->withError('Verification failed. Your OTP is expired. resend otp and try again.');
            }

            $token                = Auth::login($user);
            $data['user']         = $user;
            $data['access_token'] = $token;

            $user->otp               = null;
            $user->otp_time          = null;
            $user->email_verified_at = date("Y-m-d H:i:s");
            $user->save();
            return redirect()->route('user.allActivity')->withSuccess("Your OTP is verified successfully.");
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function resendOTP(Request $request) {
        $validateData = $request->validate([
            'user_id' => 'required',
            'phone'   => 'required',
        ]);
        try {

            /* send otp */
            $user = User::find($request->user_id);

            if (env('APP_ENV') != 'local') {
                $number = $user->phone;
                if (env('app.APP_ENV') != 'production') {
                    $number = "+917405252052";
                }
                $user->otp   = User::generateOTP();
                $msg         = "Dear user, Your OTP for Egogram is " . $user->otp . ".";
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
            Session::put("userId", $user->id);
            return response()->json(['Success' => true, 'Message' => "OTP Re-sent successfully"]);
//            return redirect()->route('user.verification')->withSuccess("OTP Re-sent successfully.");
        } catch (\Exception $e) {
            return response()->json(['Success' => false, 'Message' => $e->getMessage()]);
        }
    }

    public function registration() {
        $countries = Country::where("is_active", true)->get();

        $email    = '';
        $googleId = '';
        if (Session::has('googleData')) {
            $googleData = Session::get('googleData');
            $email      = $googleData->email;
            $googleId   = $googleData->id;
        }

        return view("registration")->with([
            'countries' => $countries,
            'email'     => $email,
            'googleId'  => $googleId,
        ]);
    }

    public function postRegistration(Request $request) {
        $requestData = $request->validate([
            'email'    => 'required|email|unique:users,email',
            'password' => 'required',
            'country'  => 'required',
            "phone"    => "required",
        ]);

        try {
            $requestData['password']      = bcrypt($requestData['password']);
            $requestData['type']          = "user";
            $requestData['google_id']     = $request->google_id;
            $requestData['user_uniqu_id'] = strtoupper(uniqid());

            $user = User::create($requestData);
            if (!empty($user)) {
                Auth::login($user);
                return redirect()->route('user.login')->withSuccess(trans("Registration successfully"));
            } else {
                return redirect()->back()->withError(trans("Registration failed"));
            }

        } catch (\Exception $e) {
            return redirect()->back()->withError(trans("Registration failed"));
        }

    }

    public function forgotPassword() {
        return view('forgot-password');
    }

    public function forgotPasswordEmail(Request $request) {
        $request->validate(['email' => 'required']);
        try {
            $credentials = ['email' => $request->email];
            $user        = User::where($credentials)->first();

            if (empty($user)) {
                return redirect()->back()->withError(trans('auth.User does not exist'));
            }

            $token = Str::random(60);
            DB::table('password_resets')->insert([
                'email'      => $request->email,
                'token'      => $token,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            if ($this->sendResetEmail($request->email, $token)) {
                return redirect()->back()->withSuccess('A reset link has been sent to your email address');
            } else {
                return redirect()->back()->withError('A reset link sending failed');
            }

        } catch (\Exception $e) {
            return redirect()->back()->withError('A reset link sending failed');
        }
    }

    public function validatePasswordRequest($token, Request $request) {

        return view('password-reset');
    }

    public function resetPassword($token, Request $request) {

        //Validate input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|confirmed',
        ]);

        try {
            // Validate the token
            $tokenData = DB::table('password_resets')->where('token', $token)->first();

            // Redirect the user back to the password reset request form if the token is invalid
            if (!$tokenData) {
                return view('forgot-password');
            }

            $user = User::where('email', $tokenData->email)->first();

            // Redirect the user back if the email is invalid
            if (!$user) {
                return redirect()->route("user.password.reset")->withError('Email not found');
            }

            //Hash and update the new password
            $user->password = bcrypt($request->password);
            $user->update();
            $user->save();

            //login the user immediately they change password successfully
            Auth::login($user);

            //Delete the token
            DB::table('password_resets')->where('email', $user->email)->delete();

            return redirect()->route('home')->withSuccess('Login successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withError('Login successfully');
        }

    }

    private function sendResetEmail($email, $token) {

        //Retrieve the user from the database
        $user = User::where('email', $email)->select('first_name', 'last_name', 'email')->first();
        //Generate, the password reset link. The token generated is embedded in the link
        //            $link = config('base_url') . 'password/reset/' . $token . '?email=' . urlencode($user->email);
        $link = route('user.password.reset', [$token, "email" => $user->email]);

        try {
            Mail::send('emails.forgot_password', ["user" => $user, "link" => $link], function ($message) use ($user) {
                $message->to($user['email'], $user['name'])
                    ->subject("Your reset password link");
            });

            return true;
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }

    }

    public function myAccount(Request $request) {
        return view('dashboard');
    }

    public function recipient(Request $request) {
        $recipient = Recipient::where('user_id', Auth::user()->id)->with('transactionField', 'countryData')->get();

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

        return view('recipients')->with([
            'arrRecipient' => $arrRecipient,
        ]);
    }

    public function designerFlow(Request $request) {
        return view('designer-flow.cancel');
    }

    public function allActivity(Request $request) {
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
            ->where('user_id', Auth::user()->id)
        // ->where('status', '!=', 'later')
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

        return view('all-activity')->with([
            'newArray' => $newArray,
        ]);
    }

    public function downloadBankTransferPdf($transactionId) {
        $trns = Transaction::with([
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
            ->first();

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
            'user_name'          => $trns->user->first_name . ' ' . $trns->user->last_name,
            'you_send'           => $trns->you_send,
            'send_currency_code' => $trns->sendCurrencyCode->currency_code,
            'amount_get'         => $trns->amount_get,
            'get_currency_code'  => $trns->getCurrencyCode->currency_code,
            'fee_rate_amount'    => number_format((float) $trns->fee_rate_amount, 2, '.', ''),
            'recipient_name'     => $trns->recipient->recipient_first_name . ' ' . $trns->recipient->recipient_last_name,
            'recipient_email'    => $trns->recipient->recipient_email,
            'transaction_field'  => $arrTransactionField,
        ];

        $fileName = 'BankTransferDetail-' . $varTransactions['id'] . ".pdf";

        $pdf = PDF::loadView('pdf.bank-transfer', [
            'varTransactions' => $varTransactions,
        ]);

        return $pdf->download($fileName);
    }

    public function addRecipient(Request $request) {
        $country = getCountry();

        return view('add-recipients')->with([
            'country' => $country,
        ]);
    }

    public function insertRecipient(Request $request) {
        $recipient = Recipient::create([
            'user_id'              => Auth::user()->id,
            'recipient_country_id' => $request->recipient_country_id,
            'recipient_email'      => $request->recipient_email,
            'recipient_first_name' => $request->recipient_first_name,
            'recipient_last_name'  => $request->recipient_last_name,
            'recipient_zelle'      => $request->recipient_zelle,
        ]);

        foreach ($request->recipient_field_data as $rfd) {
            TransactionField::create([
                'recipient_id' => $recipient->id,
                'field_name'   => $rfd['field_name'],
                'field_value'  => $rfd['field_value'],
            ]);
        }

        return true;
    }

    public function deleteRecipient(Request $request) {
        Recipient::where('id', $request->recipientId)->delete();

        return true;
    }

    public function getProfile(Request $request) {
        $user = User::where('id', Auth::user()->id)->first();

        $user->image = responseMediaLink($user->image, 'user');

        $gender  = Config('constants.gender');
        $country = getCountry();

        return view('profile')->with([
            'user'    => $user,
            'gender'  => $gender,
            'country' => $country,
        ]);
    }

    public function updateProfile(Request $request) {
        $user = User::where('id', $request->user_id)->first();

        $image = $user->image;
        if ($request->hasFile('image')) {
            $image = uploadFile($request->file('image'), 'user');
        }

        User::where('id', $request->user_id)->update([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'date_of_birth' => Carbon::parse($request->date_of_birth)->format('Y-m-d'),
            'gender'        => $request->gender,
            'phone'         => $request->phone,
            // 'country'       => $request->country,
            'state'         => $request->state,
            'address'       => $request->address,
            'zipcode'       => $request->zipcode,
            'image'         => $image,
        ]);

        return redirect()->route('user.getProfile');
    }

    public function reUploadProofs($userId, $transactionId) {
        return view('re-upload-proofs')->with([
            'userId'        => $userId,
            'transactionId' => $transactionId,
        ]);
    }

    public function submitReUploadProofs(Request $request) {
        User::where('id', $request->user_id)->update([
            'front_proof' => $request->recipient_upload_front_input,
            'back_proof'  => $request->recipient_upload_back_input,
        ]);

        Transaction::where('id', $request->transaction_id)->update([
            'recipient_upload_front_input' => $request->recipient_upload_front_input,
            'recipient_upload_back_input'  => $request->recipient_upload_back_input,
            'status'                       => 'pending',
        ]);

        return true;
    }
}
