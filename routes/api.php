<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::get('country', 'HomeController@getCountry')->name('country');
Route::get('currency', 'HomeController@getCurrency')->name('currency');
Route::post('exchange_currency_rate', 'HomeController@exchangeCurrencyRate');

Route::post('registration', 'UserController@registration');
Route::post('login', 'UserController@login');
Route::post('forgot_password', 'UserController@forgotPassword');

Route::group(['middleware' => ['ApiAuthToken']], function () {
    // User
    Route::post('resend_otp', 'UserController@resendOTP');
    Route::get('logout', 'UserController@logout');
    Route::post('upload_proof_image', 'UserController@uploadProofImage');
    Route::get('get_profile', 'UserController@getProfile');
    Route::post('update_profile', 'UserController@updateProfile');

    // Transaction
    Route::get('enterpayment/{transactionId?}', "TransactionController@enterPayment");
    Route::post('all_activity', 'TransactionController@allActivity');
    Route::post('get_bank_fields', 'TransactionController@getBankFields');
    Route::post('submit_bank_transfer', 'TransactionController@submitBankTransfer');
    Route::post('cancel_transfer', 'TransactionController@cancelTransfer');
    Route::post('paid_transfer', 'TransactionController@paidTransfer');
    Route::get('get_cancel_transfer_detail', 'TransactionController@getCancelTransferDetail');
    Route::post('update_cancel_transfer_detail', 'TransactionController@updateCancelTransferDetail');

    // Recipient
    Route::get('get_recipient', "RecipientController@getRecipient");
    Route::post('add_recipient', "RecipientController@addRecipient");
    Route::post('delete_recipient', "RecipientController@deleteRecipient");
});

// Route::group(['prefix' => 'user', 'middleware' => ['jwt.verify']], function () {
//     Route::post('change-password', 'UserController@UpdatePassword');
//     Route::post('profile', 'UserController@profileUpdate');
//     Route::get('/', 'UserController@user')->name('user');
// });
