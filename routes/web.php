<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Front'], function () {
    Route::get('/', "HomeController@index");
    Route::get('/home', "HomeController@index")->name('home');

    Route::get('/designer-flow', "UserController@designerFlow")->name('designerFlow');

    Route::group(['prefix' => 'google'], function () {
        Route::get('redirect', 'SocialAuthGoogleController@redirect')->name('user.google.redirect');
        Route::get('callback', 'SocialAuthGoogleController@callback')->name('user.google.callback');
    });

    Route::get('/login', "UserController@login")->name('user.login');
    Route::post('/login', "UserController@postLogin")->name('user.login.post');
    Route::get('/forgot-password', "UserController@forgotPassword")->name('user.forgot-password');
    Route::post('/forgot-password', "UserController@forgotPasswordEmail")->name('user.forgot-password.post');
    Route::post('/logout', "UserController@logout")->name('user.logout');

    Route::get('/registration', "UserController@registration")->name('user.registration');
    Route::post('/registration', "UserController@postRegistration")->name('user.registration.post');

    Route::get('/verification', "UserController@verifyOTP")->name('user.verification');
    Route::post('/verification', "UserController@postVerifyOTP")->name('user.verification.post');

    Route::post('resend-otp', 'UserController@resendOTP')->name('user.resend-otp');

    Route::get('/password/reset/{token}', 'UserController@validatePasswordRequest')->name('user.password.reset');
    Route::post('/password/reset/{token}', "UserController@resetPassword")->name('user.password.reset.post');

    Route::group(['middleware' => ['auth.user', 'can:isUser']], function () {
        Route::group(['prefix' => 'send'], function () {
            Route::get('/enterpayment/{transactionId?}', "TransactionController@enterPayment")->name('user.send.enterpayment');
            Route::get('/sender', "TransactionController@sender")->name('user.send.senderdetail');
            Route::get('/recipient', "TransactionController@recipient")->name('user.send.recipient');

            Route::post('/upload-proof/{number}', "TransactionController@uploadProof")->name('user.send.uploadProof');
            Route::post('/get-bank-fields', "TransactionController@getBankFields")->name('user.send.getBankFields');
            Route::post('/submit-bank-transfer', "TransactionController@submitBankTransfer")->name('user.send.submitBankTransfer');
            Route::post('/cancel-transfer', "TransactionController@cancelTransfer")->name('user.send.cancelTransfer');
            Route::post('/paid-transfer', "TransactionController@paidTransfer")->name('user.send.paidTransfer');

            Route::post('/stripe', "TransactionController@stripePost")->name('user.send.stripe.post');
        });

        Route::get('/get-profile', "UserController@getProfile")->name('user.getProfile');
        Route::post('/update-profile', "UserController@updateProfile")->name('user.updateProfile');
        Route::get('/myaccount', "UserController@myAccount")->name('user.dashboard');
        Route::get('/recipient', "UserController@recipient")->name('user.front.recipient');
        Route::get('/add-recipient', "UserController@addRecipient")->name('user.front.addRecipient');
        Route::post('/insert-recipient', "UserController@insertRecipient")->name('user.front.insertRecipient');
        Route::post('/delete-recipient', "UserController@deleteRecipient")->name('user.front.deleteRecipient');
        Route::get('/all-activity', "UserController@allActivity")->name('user.allActivity');
        Route::get('/download-bank-transfer-pdf/{id?}', "UserController@downloadBankTransferPdf")->name('user.downloadBankTransferPdf');
    });

    Route::get('re-upload-proofs/{userId}/{transactionId}', "UserController@reUploadProofs")->name('user.reUploadProofs');
    Route::post('submit-re-upload-proofs', "UserController@submitReUploadProofs")->name('user.submitReUploadProofs');
});

Route::group(['prefix' => 'backend'], function () {
    Auth::routes(['register' => false]);

    Route::group(['middleware' => ['auth', 'can:isAdmin']], function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::post('dashboard/filter', 'DashboardController@index')->name('dashboard.filter');
        Route::get('account/profile', 'DashboardController@profile')->name('account.profile');
        Route::get('account/profile/edit', 'DashboardController@profile')->name('account.profile.edit');
        Route::get('account/profile/edit', 'DashboardController@profileEdit')->name('account.profile.edit');
        Route::post('account/profile/update', 'DashboardController@profileUpdate')->name('account.profile.update');
        Route::get('account/change-password', 'DashboardController@changePassword')->name('account.change-password');
        Route::post('account/change-password', 'DashboardController@updatePassword')->name('account.change-password');

//        Route::resource('option','OptionController');
        Route::resource('user', 'UserController');
        Route::resource('bank', 'BankInfoController');
        Route::resource('fees', 'FeesController');
        Route::resource('bank_field', 'BankFieldsController');
        Route::get('bank_field/delete_bank_field/{bankFieldId}', 'BankFieldsController@deleteBankField');
        Route::resource('contact', 'ContactController');
        Route::resource('testimonial', 'TestimonialController');
        Route::resource('coupon', 'CouponsController');
        Route::get('user/{UserId}/change_password', 'UserController@changePassword')->name('user.change_password');
        Route::post('user/{UserId}/change_password', 'UserController@doChangePassword')->name('user.change_password');
        Route::get('user/{UserId}/recipient', 'UserController@recipients')->name('user.recipient');
        Route::resource('subscriptions', 'SubscriptionsController');
        Route::resource('configure', 'ConfigurationController');
        Route::get('settings', 'ConfigurationController@settings')->name('settings');
        Route::resource('payment_option', 'PaymentOptionController');
        Route::resource('country', 'CountryController');
        Route::resource('state', 'StateController');
        Route::resource('store', 'StoreController');
        Route::resource('transaction', 'TransactionController');
        Route::post('transaction/filter', 'TransactionController@index')->name('transaction.filter');
        Route::post('update', 'ConfigurationController@settingsUpdate')->name('settings.update');

        Route::post('change-transaction-status', 'TransactionController@changeTransactionStatus')->name('admin.changeTransactionStatus');
        Route::get('change-proof-verified-status/{transactionId}/{userId}/{status}', 'TransactionController@changeProofVerifiedStatus')->name('admin.changeProofVerifiedStatus');

        Route::resource('zelle', 'ZelleController');

    });
});

Route::get('/storage', function () {
    Artisan::call('storage:link');
    return "Storage link generated successfully.";
});

Route::get('/cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "All cache clear successfully.";
});

Route::model('bank_field', App\Model\BankFields::class);
