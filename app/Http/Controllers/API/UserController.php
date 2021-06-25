<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\AccessToken;
use App\Model\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class UserController extends Controller {
    public function registration(Request $request) {
        $accessToken = getnewToken();

        $msg = 'User registered successfully.';

        if ($request->google_id != "") {
            $user = User::where('google_id', $request->google_id)->first();

            // If login else sign up
            if ($user) {
                $otp = sendOTP($user->phone);

                User::where('id', $user->id)->update([
                    'device_type'  => $request->device_type,
                    'device_token' => $request->device_token,
                    'otp'          => $otp,
                    'otp_time'     => date("Y-m-d H:i"),
                ]);

                AccessToken::where('user_id', $user->id)->update([
                    'accesstoken' => $accessToken,
                ]);

                $msg = 'User logged in successfully.';
            } else {
                $checkExistUser = User::where('email', $request->email)->first();

                // Check Email already exist or not
                if ($checkExistUser) {
                    return response()->json([
                        'success' => Config('constants.invalidResponse.success'),
                        'message' => 'The email has already been taken.',
                        'data'    => Config('constants.emptyData'),
                    ], Config('constants.invalidResponse.statusCode'));
                }

                $otp = sendOTP($request->phone);

                $user = User::create([
                    'email'         => $request->email,
                    'password'      => bcrypt($request->password),
                    'phone'         => $request->phone,
                    'country'       => $request->country,
                    'google_id'     => $request->google_id,
                    'type'          => 'user',
                    'device_type'   => $request->device_type,
                    'device_token'  => $request->device_token,
                    'otp'           => $otp,
                    'otp_time'      => date("Y-m-d H:i"),
                    'user_uniqu_id' => userUniqId(),
                ]);

                AccessToken::create([
                    'user_id'     => $user->id,
                    'accesstoken' => $accessToken,
                ]);
            }
        } else {
            $checkExistUser = User::where('email', $request->email)->first();

            // Check Email already exist or not
            if ($checkExistUser) {
                return response()->json([
                    'success' => Config('constants.invalidResponse.success'),
                    'message' => 'The email has already been taken.',
                    'data'    => Config('constants.emptyData'),
                ], Config('constants.invalidResponse.statusCode'));
            }

            $otp = sendOTP($request->phone);

            $user = User::create([
                'email'         => $request->email,
                'password'      => bcrypt($request->password),
                'phone'         => $request->phone,
                'country'       => $request->country,
                'google_id'     => $request->google_id,
                'type'          => 'user',
                'device_type'   => $request->device_type,
                'device_token'  => $request->device_token,
                'otp'           => $otp,
                'otp_time'      => date("Y-m-d H:i"),
                'user_uniqu_id' => userUniqId(),
            ]);

            AccessToken::create([
                'user_id'     => $user->id,
                'accesstoken' => $accessToken,
            ]);
        }

        $userData = User::with('userBankDetail')->where('id', $user->id)->first();

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
            'accesstoken'      => $accessToken,
            'is_verified'      => $userData->is_verified,
            'user_bank_detail' => $arrUserBankDetail,
        ];

        return response()->json([
            'success' => Config('constants.validResponse.success'),
            'message' => $msg,
            'data'    => $data,
        ], Config('constants.validResponse.statusCode'));
    }

    public function login(Request $request) {
        $user = User::where('email', $request->email)
            ->where(function ($query) {
                $query->where('google_id', '');
                $query->orWhereNull('google_id');
            })
            ->first();

        // Email is not exist
        if (!$user) {
            return response()->json([
                'success' => Config('constants.invalidResponse.success'),
                'message' => 'Invalid email or password.',
                'data'    => Config('constants.emptyData'),
            ], Config('constants.invalidResponse.statusCode'));
        }

        // Invalid Password
        if (\Hash::check($request->password, $user->password) == false) {
            return response()->json([
                'success' => Config('constants.invalidResponse.success'),
                'message' => 'Invalid email or password.',
                'data'    => Config('constants.emptyData'),
            ], Config('constants.invalidResponse.statusCode'));
        }

        $otp         = sendOTP($user->phone);
        $accessToken = getnewToken();

        User::where('id', $user->id)->update([
            'device_type'  => $request->device_type,
            'device_token' => $request->device_token,
            'otp'          => $otp,
            'otp_time'     => date("Y-m-d H:i"),
        ]);

        AccessToken::where('user_id', $user->id)->update([
            'accesstoken' => $accessToken,
        ]);

        $userData = User::with('userBankDetail')->where('id', $user->id)->first();

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
            'accesstoken'      => $accessToken,
            'is_verified'      => $userData->is_verified,
            'user_bank_detail' => $arrUserBankDetail,
        ];

        return response()->json([
            'success' => Config('constants.validResponse.success'),
            'message' => 'User logged in successfully.',
            'data'    => $data,
        ], Config('constants.validResponse.statusCode'));
    }

    public function resendOTP(Request $request) {
        $otp = sendOTP($request->phone);

        User::where('id', $request->get('auth_user_id'))->update([
            'otp'      => $otp,
            'otp_time' => date("Y-m-d H:i"),
        ]);

        $userData = User::where('id', $request->get('auth_user_id'))->first();

        $data = [
            'id'            => $userData->id,
            'first_name'    => $userData->first_name,
            'last_name'     => $userData->last_name,
            'email'         => $userData->email,
            'google_id'     => $userData->google_id,
            'date_of_birth' => convertInDateFormat($userData->date_of_birth),
            'gender'        => $userData->gender,
            'phone'         => $userData->phone,
            'address'       => $userData->address,
            'city'          => $userData->city,
            'state'         => $userData->state,
            'country'       => $userData->country,
            'zipcode'       => $userData->zipcode,
            'image'         => responseMediaLink($userData->image, 'user'),
            'user_uniqu_id' => $userData->user_uniqu_id,
            'device_type'   => $userData->device_type,
            'device_token'  => $userData->device_token,
            'otp'           => $userData->otp,
            'otp_time'      => $userData->otp_time,
            'accesstoken'   => $request->header('accesstoken'),
        ];

        return response()->json([
            'success' => Config('constants.validResponse.success'),
            'message' => 'User logged in successfully.',
            'data'    => $data,
        ], Config('constants.validResponse.statusCode'));
    }

    public function forgotPassword(Request $request) {
        $user = User::where('email', $request->email)
            ->where(function ($query) {
                $query->where('google_id', '');
                $query->orWhereNull('google_id');
            })
            ->first();

        // Email is not exist
        if (!$user) {
            return response()->json([
                'success' => Config('constants.invalidResponse.success'),
                'message' => 'Email does not exist.',
                'data'    => Config('constants.emptyData'),
            ], Config('constants.invalidResponse.statusCode'));
        }

        $token = generateStringToken();

        DB::table('password_resets')->insert([
            'email'      => $request->email,
            'token'      => $token,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if (sendResetEmail($request->email, $token)) {
            return response()->json([
                'success' => Config('constants.validResponse.success'),
                'message' => 'A reset link has been sent to your email address.',
                'data'    => Config('constants.emptyData'),
            ], Config('constants.validResponse.statusCode'));
        }

        return response()->json([
            'success' => Config('constants.invalidResponse.success'),
            'message' => 'A reset link sending failed.',
            'data'    => Config('constants.emptyData'),
        ], Config('constants.invalidResponse.statusCode'));
    }

    public function logout(Request $request) {
        User::where('id', $request->get('auth_user_id'))->update([
            'device_token' => '',
        ]);

        return response()->json([
            'success' => Config('constants.validResponse.success'),
            'message' => 'Logout successfully.',
            'data'    => Config('constants.emptyData'),
        ], Config('constants.validResponse.statusCode'));
    }

    public function uploadProofImage(Request $request) {
        $recipient_upload_front_input = uploadFile($request->file('recipient_upload_front_input'), 'id-proof', 1);
        $recipient_upload_back_input  = uploadFile($request->file('recipient_upload_back_input'), 'id-proof', 2);

        $data = [
            'recipient_upload_front_input' => $recipient_upload_front_input,
            'recipient_upload_back_input'  => $recipient_upload_back_input,
        ];

        return response()->json([
            'success' => Config('constants.validResponse.success'),
            'message' => 'Image uploaded successfully.',
            'data'    => $data,
        ], Config('constants.validResponse.statusCode'));
    }

    public function getProfile(Request $request) {
        $user = User::where('id', $request->get('auth_user_id'))->first();

        $genderData  = Config('constants.gender');
        $countryData = getCountry();

        $data = [
            'id'          => $user->id,
            'first_name'  => $user->first_name,
            'last_name'   => $user->last_name,
            'email'       => $user->email,
            'gender'      => $user->gender,
            'phone'       => $user->phone,
            'address'     => $user->address,
            'state'       => $user->state,
            'country'     => $user->country,
            'country_id'  => $user->country,
            'zipcode'     => $user->zipcode,
            'image'       => responseMediaLink($user->image, 'user'),
            'genderData'  => $genderData,
            'countryData' => $countryData,
        ];

        return response()->json([
            'success' => Config('constants.validResponse.success'),
            'message' => 'Got profile data successfully.',
            'data'    => $data,
        ], Config('constants.validResponse.statusCode'));
    }

    public function updateProfile(Request $request) {
        $user = User::where('id', $request->get('auth_user_id'))->first();

        $image = $user->image;
        if ($request->hasFile('image')) {
            $image = uploadFile($request->file('image'), 'user');
        }

        User::where('id', $request->get('auth_user_id'))->update([
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
            'message' => 'Profile updated successfully.',
            'data'    => $data,
        ], Config('constants.validResponse.statusCode'));
    }

//     public function UpdatePassword(Request $request) {
    //         try {

//             $validator = Validator::make($request->all(), [
    //                 'current_password' => 'required',
    //                 'password'         => 'required',
    //                 'confirm_password' => 'required|same:password',
    //             ]);

//             if ($validator->fails()) {
    //                 return response()->json(['Success' => false, 'message' => 'Validation failed.', 'errors' => $validator->errors()], 422);
    //             }

//             $user       = User::find(auth()->user()->id);
    //             $currentPwd = bcrypt($request->current_password);
    //             if (!Hash::check($request->current_password, $user->password)) {
    //                 return response()->json(['Success' => false, 'message' => 'Validation failed.', 'errors' =>
    //                     ['current_password' => ['The current password does not match.']]], 422);
    //             }

//             $newPwd = bcrypt($request->password);
    //             $user   = User::where('id', $user->id)->update(['password' => $newPwd]);
    //             return response()->json(['Success' => true, 'Message' => "Your password updated successfully."]);

//         } catch (\Exception $e) {
    //             return response()->json(['Success' => false, 'Message' => $e->getMessage()]);
    //         }
    //     }

//     public function resetPassword(Request $request) {
    //         try {
    //             $validator = Validator::make($request->all(), [
    //                 'token'                 => 'required',
    //                 'email'                 => 'required|email',
    //                 'password'              => 'required|confirmed',
    //                 'password_confirmation' => 'required',
    //             ]);

//             if ($validator->fails()) {
    //                 return response()->json(['Success' => false, 'message' => 'Validation failed.', 'errors' => $validator->errors()], 422);
    //             }
    //             $validate = $validator->validate();

//             /* Check email is exist inside system */
    //             $user = User::where("email", $validate['email'])->first();

//             if (empty($user)) {
    //                 return response()->json(['Success' => false, 'Message' => 'Your email is not found in our system.']);
    //             }

//             $resetPwd = DB::table('password_resets')->where(['email' => $validate['email'], 'token' => $validate['token']])->first();

//             if (empty($resetPwd)) {
    //                 return response()->json(['Success' => false, 'Message' => 'Your resent link is expired.']);
    //             }

//             $user->password = bcrypt($validate['password']);
    //             $user->save();

//             //Create Password Reset Token
    //             DB::table('password_resets')->where('email', $validate['email'])->delete();

//             //send email for update new password success

//             return response()->json(['Success' => true, 'Message' => 'Your password is updated successfully.'], 200);

//         } catch (\Exception $e) {
    //             return response()->json(['Success' => false, 'Message' => $e->getMessage()]);
    //         }
    //     }

//     public function refresh() {
    //         try {
    //             if ($token = Auth::guard()->refresh()) {
    //                 $data['access_token'] = $token;
    //                 return response()->json(['Success' => true, 'Message' => "Token refresh successfully.!", 'Data' => $data], 200);
    //             }
    //             return response()->json(['Success' => false, 'Message' => 'Token not refreshing.']);
    //         } catch (\Exception $e) {
    //             return response()->json(['Success' => false, 'Message' => $e->getMessage()]);
    //         }
    //     }

//     public function user(Request $request) {
    //         try {
    //             $user = User::find(Auth::user()->id);
    //             return response()->json(['Success' => true, 'Message' => 'User fetched successfully.!', 'Data' => $user]);
    //         } catch (\Exception $e) {
    //             return response()->json(['Success' => false, 'Message' => $e->getMessage()]);
    //         }
    //     }

//     public function profileUpdate(Request $request) {
    //         try {
    //             $validator = Validator::make($request->all(), [
    //                 'first_name'       => 'required',
    //                 'middle_name'      => 'required',
    //                 'last_name'        => 'required',
    //                 'phone'            => 'required',
    //                 'date_of_birth'    => 'required',
    //                 'country'          => 'required',
    //                 'address'          => 'required',
    //                 'city'             => 'required',
    //                 'occupation'       => 'required',
    //                 'other_occupation' => 'nullable',
    //             ]);

//             if ($validator->fails()) {
    //                 return response()->json(['status' => false, 'message' => 'Validation failed.', 'errors' => $validator->errors()], 422);
    //             }

//             if ($request->occupation == 'other' && $request->other_occupation == '') {
    //                 return response()->json(['status' => false, 'message' => 'Validation failed.', 'errors' => ['other_occupation' => ['other occupation details is required']]], 422);
    //             }

//             $validate = $validator->validate();
    //             if ($request->occupation == 'other') {
    //                 $validate['occupation'] = $request->other_occupation;
    //             }
    //             unset($validate['other_occupation']);
    //             $validate['date_of_birth'] = date("Y-m-d", strtotime($validate['date_of_birth']));

//             User::where("id", Auth::user()->id)->update($validate);
    //             $user = Auth::user();

//             $trw_profile = "16532069";
    // //            $trw_profile=Auth::user()->trw_profile;

//             $transferWiseData = [
    //                 "type"    => isset($user->trw_type) ? $user->trw_type : 'personal',
    //                 "id"      => $trw_profile,
    //                 "details" => [
    //                     "firstName"   => $validate['first_name'],
    //                     "lastName"    => $validate['last_name'],
    //                     "dateOfBirth" => date("Y-m-d", strtotime($validate['date_of_birth'])),
    // //                    "phoneNumber"=> $validate['phone'],
    //                     "occupation"  => $validate['occupation'],
    //                 ],
    //             ];

//             $response = (new TransferwiseController())->callAPI("profiles", "put", $transferWiseData);

// //            echo "<pre>";print_r($response->successful());
    //             //            echo "<pre>";print_r($response->failed());
    //             //            echo "<pre>";print_r($response->status());
    //             //            echo "<pre>";print_r($response->json());exit();
    //             if ($response->successful()) {
    //                 $result = $response->json();
    //             } else {
    //                 $error = $response->json();
    //                 return response()->json(['Success' => false, 'Message' => 'Your Profile Update failed.!', 'Cause' => $error['errors']]);
    //             }

//             return response()->json(['Success' => true, 'Message' => 'Your Profile Updated Successfully.!']);

//         } catch (\Exception $e) {
    //             return response()->json(['Success' => false, 'Message' => $e->getMessage()]);
    //         }
    //     }

}
