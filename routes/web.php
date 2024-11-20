<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\KycController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Admin\pageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HouseController;
use App\Http\Controllers\Admin\TradeController;
use App\Http\Controllers\Admin\TruckController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\ApplianceController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\WithdrawalController;
use App\Http\Controllers\Admin\CarCategoryController;
use App\Http\Controllers\Admin\TradingPlanController;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Admin\TruckCategoryController;
use App\Http\Controllers\Admin\ApplianceCategoryController;

Route::get('/', function () {
    return view('home.home');
});

Route::get('/about', function () {
    return view('welcome');
});

// Route::get('/cars', function () {
//     return view('cars.index');
// });



Auth::routes();


Route::get('forex', [App\Http\Controllers\CategoriesController::class, 'forexPage'])->name('forex.page');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('admin/login', [AdminLoginController::class, 'adminLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('login.submit');



// Admin Routes
Route::prefix('admin')->group(function () {
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');



    // Protecting admin routes using the 'admin' middleware
    Route::middleware(['admin'])->group(function () { // Admin Profile Routes

        // Protecting admin routes using the middleware

        // Protecting manage pages
        Route::get('manage-forex', [pageController::class, 'manageForex'])->name('manage.forex');
        Route::post('/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');

        Route::get('/profile', [AdminController::class, 'editProfile'])->name('admin.profile');
        Route::post('/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
        Route::post('/profile/password', [AdminController::class, 'updatePassword'])->name('admin.profile.password.update');

        Route::get('/change/user/password/page/{id}', [AdminController::class, 'showResetPasswordForm'])->name('admin.change.user.password.page');
        Route::post('/user-password-reset', [AdminController::class, 'resetPassword'])->name('admin.user.password_reset');

        Route::get('{user}/verification', [AdminController::class, 'userVerification'])->name('user.verification');
        Route::get('{user}/suspension', [AdminController::class, 'userSuspension'])->name('user.suspension');


        Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
        Route::get('/payment-settings', [AdminController::class, 'paymentSettings'])->name('payment.settings');
        Route::get('/manage-users', [AdminController::class, 'manageUsersPage'])->name('manage.users.page');
        Route::get('/manage-investment-plan', [AdminController::class, 'manageInvestmentPlan'])->name('manage.investment.plan');
        Route::get('/view-deposit/{id}/', [AdminController::class, 'viewDeposit']);
        Route::get('/manage-kyc', [AdminController::class, 'manageKycPage'])->name('manage.kyc.page');
        Route::get('/accept-kyc/{id}/', [AdminController::class, 'acceptKyc'])->name('admin.accept.kyc');
        Route::get('/reject-kyc/{id}/', [AdminController::class, 'rejectKyc'])->name('admin.reject.kyc');
        Route::get('/reset-password/{user}', [AdminController::class, 'resetUserPassword'])->name('reset.password');
        Route::get('/clear-account/{id}', [AdminController::class, 'clearAccount'])->name('clear.account');

        Route::get('/{user}/impersonate',  [AdminController::class, 'impersonate'])->name('users.impersonate');
        Route::get('/leave-impersonate',  [AdminController::class, 'leaveImpersonate'])->name('users.leave-impersonate');

        Route::post('/edit-user/{user}', [AdminController::class, 'editUser'])->name('edit.user');
        Route::post('/add-new-user',  [AdminController::class, 'newUser'])->name('add.user');
        Route::get('/delete-user/{user}',  [AdminController::class, 'deleteUser'])->name('delete.user');
        Route::match(['get', 'post'], '/send-mail', [AdminController::class, 'sendMail'])->name('admin.send.mail');
        // Route for viewing user details
        Route::get('/user/{id}', [AdminController::class, 'viewUser'])->name('admin.user.view');
        Route::post('/transfer/suspend/{id}', [AdminController::class, 'suspendTransfer'])->name('transfer.suspend');
        Route::post('/transfer/unblock/{id}', [AdminController::class, 'unblockTransfer'])->name('transfer.unblock');
        Route::post('/account/suspend/{id}', [AdminController::class, 'suspendAccount'])->name('account.suspend');
        Route::post('/account/unblock/{id}', [AdminController::class, 'unblockAccount'])->name('account.unblock');

        // Define the route for opening an account
        Route::get('/user/open', [AdminController::class, 'openAccount'])->name('admin.user.open');



        // Route for viewing user details
        Route::get('/credit-user/{id}', [AdminController::class, 'creditUserPage'])->name('admin.credit.user.page');

        Route::post('credit-debit', [AdminController::class, 'creditDebit'])->name('credit-debit');


        // Route::post('/credit-user', [AdminController::class, 'creditUser'])->name('credit_user');


        // Route for updating user details
        Route::post('/user/update/{id}', [AdminController::class, 'updateUserDetail'])->name('update_user_detail');

        // Route for updating bank details
        Route::post('/user/update/bank/{id}', [AdminController::class, 'updateBankDetail'])->name('update_bank_detail');

        // Route for fund user
        Route::get('/user/fund/{accountnumber}/{id}', [AdminController::class, 'fundUser'])->name('fund_user');

        // Route for user transaction history
        Route::get('/user/transaction/{id}', [AdminController::class, 'userTransaction'])->name('user_transaction');

        // Route for user transfer tracking
        Route::get('/user/transfer/tracking/{id}', [AdminController::class, 'userTransferTracking'])->name('user_transfer_tracking');

        // Route for debit user
        Route::get('/user/debit/{accountnumber}/{id}', [AdminController::class, 'debitUser'])->name('debit_user');

        // Route for changing user photo
        Route::get('/user/photo/{id}', [AdminController::class, 'updatePhoto'])->name('update_photo');

        // Route for user activity
        Route::get('/user/activity/{id}', [AdminController::class, 'userActivity'])->name('user_activity');

        // Route for user password reset
        Route::get('/user/password/reset/{userid}', [AdminController::class, 'userPasswordReset'])->name('user_password_reset');


        // Route for changing email user
        Route::get('/send/email', [AdminController::class, 'sendEmailPage'])->name('send.email');
        Route::post('/send/email', [AdminController::class, 'sendEmail'])->name('send.mail');

        // 
        // Deposit resource routes
        Route::resource('deposits', DepositController::class);
        Route::patch('deposits/{deposit}/approve', [DepositController::class, 'approve'])->name('deposits.approve');

        // Withdrawal resource routes
        //Route::resource('withdrawals', With logo favicon settings
        // Route::get('/branding', [BrandingController::class, 'index'])->name('branding.index');
        // Route::post('/branding/update', [BrandingController::class, 'update'])->name('branding.update');

        // Route::get('/smtp-settings', [SmtpSettingController::class, 'index'])->name('smtp.settings');
        // Route::post('/smtp-settings', [SmtpSettingController::class, 'update'])->name('smtp.update');

        // // Wallet resource routes
        // Route::resource('wallets', WalletController::class);drawalController::class);
        // Route::patch('withdrawals/{withdrawal}/approve', [WithdrawalController::class, 'approve'])->name('withdrawals.approve');

        //kyc resource routes
        Route::resource('kyc', KycController::class);
        Route::get('kyc/{id}/approve', [KycController::class, 'approve'])->name('kyc.approve');

        //trade resource routes
        Route::get('/trades', [TradeController::class, 'index'])->name('trades.index');
        Route::get('/trades/{trade}/edit', [TradeController::class, 'edit'])->name('trades.edit');
        Route::patch('/trades/{trade}', [TradeController::class, 'update'])->name('trades.update');
        Route::post('/trades/{trade}/approve', [TradeController::class, 'approve'])->name('trades.approve');
        Route::delete('/trades/{trade}', [TradeController::class, 'destroy'])->name('trades.destroy');


        //general settings
        // Route::get('settings/general', [GeneralSettingsController::class, 'edit'])->name('settings.edit');
        // Route::put('settings/general', [GeneralSettingsController::class, 'update'])->name('settings.update');


        Route::get('/trading-plans/create', [TradingPlanController::class, 'create'])->name('admin.create-trading-plan');
        Route::post('/trading-plans/store', [TradingPlanController::class, 'store'])->name('admin.store-trading-plan');
        Route::get('/trading-plans', [TradingPlanController::class, 'index'])->name('admin.view-trading-plans');
        Route::get('/trading-plans/edit/{id}', [TradingPlanController::class, 'edit'])->name('admin.edit-trading-plan');
        Route::post('/trading-plans/update/{id}', [TradingPlanController::class, 'update'])->name('admin.update-trading-plan');
        Route::delete('/trading-plans/delete/{id}', [TradingPlanController::class, 'destroy'])->name('admin.delete-trading-plan');


        Route::get('/manage-deposit', [DepositController::class, 'manageDepositsPage'])->name('manage.deposits.page');
        Route::get('view-deposit/{id}', [DepositController::class, 'viewDeposit'])->name('view.deposit');;
        Route::get('process-deposit/{id}', [DepositController::class, 'processDeposit'])->name('process.deposit');
        Route::get('delete-deposit/{id}', [DepositController::class, 'deleteDeposit'])->name('delete.deposit');


        Route::get('/manage-withdrawal', [WithdrawalController::class, 'manageWithdrawalsPage'])->name('manage.withdrawals.page');
        Route::get('/view-withdrawal/{user_id}/{withdrawal_id}', [WithdrawalController::class, 'viewWithdrawal'])->name('view.withdrawal');;
        Route::get('process-withdrawal/{id}', [WithdrawalController::class, 'processWithdrawal'])->name('process.withdrawal');
        Route::get('delete-withdrawal/{id}', [WithdrawalController::class, 'deleteWithdrawal'])->name('delete.withdrawal');

        // Route::resource('plans', PlanController::class);
        // Group routes under 'admin' prefix and protect them with 'auth' middleware if needed
        Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function () {
            Route::resource('cars', App\Http\Controllers\Admin\CarController::class);
            Route::get('view-cars', [App\Http\Controllers\Admin\CarController::class, 'viewCars'])->name('view.cars');
            Route::resource('categories', App\Http\Controllers\Admin\CarCategoryController::class)->names([
                'index'   => 'cars.categories.index',
                'create'  => 'cars.categories.create',
                'store'   => 'cars.categories.store',
                'show'    => 'cars.categories.show',
                'edit'    => 'cars.categories.edit',
                'update'  => 'cars.categories.update',
                'destroy' => 'cars.categories.destroy',
            ]);

            Route::resource('appliances', ApplianceController::class);
            Route::get('view-appliances', [ApplianceController::class, 'viewAppliances'])->name('view.appliances');
            Route::resource('appliance-categories', ApplianceCategoryController::class)->names([
                'index'   => 'appliances.categories.index',
                'create'  => 'appliances.categories.create',
                'store'   => 'appliances.categories.store',
                'show'    => 'appliances.categories.show',
                'edit'    => 'appliances.categories.edit',
                'update'  => 'appliances.categories.update',
                'destroy' => 'appliances.categories.destroy',
            ]);


            Route::resource('trucks', TruckController::class);
            Route::get('view-trucks', [TruckController::class, 'viewTrucks'])->name('view.trucks');
            Route::resource('categories', TruckCategoryController::class)->names([
                'index'   => 'trucks.categories.index',
                'create'  => 'trucks.categories.create',
                'store'   => 'trucks.categories.store',
                'show'    => 'trucks.categories.show',
                'edit'    => 'trucks.categories.edit',
                'update'  => 'trucks.categories.update',
                'destroy' => 'trucks.categories.destroy',
            ]);

            Route::resource('houses', HouseController::class);
        });
    });
});



// Customer authentication routes
Route::prefix('customer')->name('customer.')->group(function () {

    // Show login form and process login
    Route::get('login', [CustomerAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [CustomerAuthController::class, 'login']);

    // Show registration form and process registration
    Route::get('register', [CustomerAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [CustomerAuthController::class, 'create']);

    // Logout route
    Route::post('logout', [CustomerAuthController::class, 'logout'])->name('logout');

    // Protected routes (only accessible to authenticated customers)
    Route::middleware('auth:customer')->group(function () {
        // Customer dashboard
        Route::get('dashboard', function () {
            return view('customer.dashboard'); // Create this Blade file
        })->name('dashboard');

        // Show and update customer profile
        Route::get('profile', [CustomerAuthController::class, 'showProfile'])->name('profile');
        Route::post('profile/update', [CustomerAuthController::class, 'update'])->name('profile.update');
    });
});


// cars
Route::prefix('shop')->name('shop.')->group(function () {
    Route::post('/add-to-cart', [App\Http\Controllers\Home\CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [App\Http\Controllers\Home\CartController::class, 'index'])->name('cart.index');
    Route::get('/checkout', [App\Http\Controllers\Home\CartController::class, 'checkout'])->name('checkout.index');
    Route::post('/remove-from-cart', [App\Http\Controllers\Home\CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/update', [App\Http\Controllers\Home\CartController::class, 'updateCart'])->name('cart.update');

    Route::prefix('cars')->name('cars.')->group(function () {
        Route::get('/{id}', [App\Http\Controllers\Home\CarController::class, 'viewCars'])->name('show');
        Route::get('/', [App\Http\Controllers\Home\CarController::class, 'cars'])->name('cars');
    });
    Route::prefix('trucks')->name('trucks.')->group(function () {
        Route::get('/{id}', [App\Http\Controllers\Home\TruckController::class, 'viewTrucks'])->name('show');
        Route::get('/', [App\Http\Controllers\Home\TruckController::class, 'trucks'])->name('trucks');
    });

    Route::prefix('appliances')->name('appliances.')->group(function () {
        Route::get('/{id}', [App\Http\Controllers\Home\ApplianceController::class, 'viewAppliances'])->name('show');
        Route::get('/', [App\Http\Controllers\Home\ApplianceController::class, 'appliances'])->name('appliances');
    });

    Route::prefix('houses')->name('houses.')->group(function () {
        Route::get('/{id}', [App\Http\Controllers\Home\HouseController::class, 'viewHouses'])->name('show');
        Route::get('/', [App\Http\Controllers\Home\HouseController::class, 'houses'])->name('houses');
    });
});
