<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\WithdrawalController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('home.homepage');
});

Route::get('/about', function () {
    return view('home.about');
});
Route::get('/contact', function () {
    return view('home.contact');
});

Route::get('/terms', function () {
    return view('home.terms');
});

Route::get('/services', function () {
    return view('home.services');
});





Auth::routes();

Route::get('home', [CustomAuthController::class, 'dashboard'])->middleware('user_auth')->name('dashboard');
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->middleware('user_auth')->name('dashboard');
Route::get('kyc', [DashboardController::class, 'kycPage'])->middleware('user_auth')->name('kyc.page');
Route::post('kyc', [DashboardController::class, 'kycUpload'])->name('upload.kyc');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('verify/{id}', [CustomAuthController::class, 'verify'])->name('verify');
Route::post('email-home', [CustomAuthController::class, 'emailVerify'])->name('code');
Route::get('resend-code/{id}', [CustomAuthController::class, 'resendCode'])->name('resendCode');
Route::get('register', [CustomAuthController::class, 'registration'])->name('register-user');
Route::get('register', [CustomAuthController::class, 'registration'])->name('register');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('log_out', [CustomAuthController::class, 'signOut'])->name('logout');
Route::get('/logout', [CustomAuthController::class, 'logOut'])->name('logOut');



//User Dashboard routes


Route::middleware('user_auth')->group(function () {

    Route::post('make-deposit', [DashboardController::class, 'makeDeposit'])->name('make.deposit');
    Route::post('make-payment', [DashboardController::class, 'makePayment'])->name('make.payment');
    Route::get('transfer', [DashboardController::class, 'transferPage'])->name('transfer.page');
    Route::get('user-profile', [DashboardController::class, 'userProfile'])->name('user.profile');
    Route::get('card', [DashboardController::class, 'card'])->name('card');
    Route::get('card_application', [DashboardController::class, 'cardApplication'])->name('card_application');
    Route::get('request-card/{user_id}', [DashboardController::class, 'requestCard'])->name('request.card');
    Route::get('/activation/copy', [DashboardController::class, 'activation'])->name('activation.copy');
    Route::get('change-password', [DashboardController::class, 'userChangePassword'])->name('user.change.password');
    Route::get('deposit', [DashboardController::class, 'deposit'])->name('deposit');
    Route::get('make-deposit', [DashboardController::class, 'makeDeposit'])->name('make.deposit');
    Route::get('loan', [DashboardController::class, 'loan'])->name('loan');
    Route::post('make-loan', [DashboardController::class, 'makeLoan'])->name('make.loan');
    Route::get('notification', [DashboardController::class, 'notification'])->name('notification');
    Route::get('transactions', [DashboardController::class, 'transactions'])->name('transactions');
    Route::get('pending-transfer', [DashboardController::class, 'pendingTransfer'])->name('pending-transfer');
    Route::get('settings', [DashboardController::class, 'settings'])->name('settings');
    Route::get('make_withdrawal', [DashboardController::class, 'getWithdrawal'])->name('withdrawal');
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('transaction-history', [DashboardController::class, 'transactionHistory'])->name('transaction.history');
    Route::get('view_invoice/{user_id}', [DashboardController::class, 'viewInvoice'])->name('view.invoice');
    Route::get('ticket', [DashboardController::class, 'ticket'])->name('ticket');
    Route::get('international-transfer', [DashboardController::class, 'internationalTransfer'])->name('international-transfer');
    Route::get('domestic-transfer', [DashboardController::class, 'domesticTransfer'])->name('domestic-transfer');
    Route::get('skrill', [DashboardController::class, 'skrill'])->name('skrill');
    Route::get('paypal', [DashboardController::class, 'paypal'])->name('paypal');
    Route::get('inter_bank_transfer', [DashboardController::class, 'interBankTransfer'])->name('inter.bank.transfer');
    Route::get('local_bank_transfer', [DashboardController::class, 'localBankTransfer'])->name('local.bank.transfer');
    Route::get('revolut_bank_transfer', [DashboardController::class, 'revolutBankTransfer'])->name('revolut.bank.transfer');
    Route::get('wise_bank_transfer', [DashboardController::class, 'wiseBankTransfer'])->name('wise.bank.transfer');
    Route::get('crypto', [DashboardController::class, 'crypto'])->name('crypto');
    Route::post('transfer', [DashboardController::class, 'transferFunds'])->name('transfer-fund');
    Route::post('personal-details', [DashboardController::class, 'personalDetails'])->name('personal.details');
    Route::post('personal-dp', [DashboardController::class, 'personalDp'])->name('personal.dp');
    Route::post('transfer_funds', [DashboardController::class, 'transferFunds'])->name('transfer.funds');
    Route::post('paypal-transfer', [DashboardController::class, 'paypalTransfer'])->name('paypal.transfer');
    Route::post('skrill-transfer', [DashboardController::class, 'skrillTransfer'])->name('skrill.transfer');
    Route::post('crypto-transfer', [DashboardController::class, 'cryptoTransfer'])->name('crypto.transfer');
    Route::post('inter-transfer', [DashboardController::class, 'interTransfer'])->name('inter.transfer');
    Route::post('local-transfer', [DashboardController::class, 'localTransfer'])->name('local.transfer');
    Route::post('revolut-transfer', [DashboardController::class, 'revolutTransfer'])->name('revolut.transfer');
    Route::post('wise-transfer', [DashboardController::class, 'wiseTransfer'])->name('wise.transfer');
    Route::post('/change-password', [DashboardController::class, 'updatePassword'])->name('update-password');
    Route::post('paypal', [DashboardController::class, 'userReflectionPin'])->name('reflection.pin');
    Route::get('/validate-routing-number', [DashboardController::class, 'showRoutingForm'])->name('show.routingForm');
    Route::post('/validate-routing-number', [DashboardController::class, 'validateRoutingNumber'])->name('validate.routingNumber');
    Route::get('/validate-int-code', [DashboardController::class, 'showIntCodeForm'])->name('show.intCodeForm');
    Route::post('/validate-int-code', [DashboardController::class, 'validateIntCode'])->name('validate.intCode');
    Route::get('/validate-ccic', [DashboardController::class, 'showCcicCodeForm'])->name('show.CcicCodeForm');
    Route::post('/validate-ccic', [DashboardController::class, 'validateCcicCode'])->name('validate.ccidCode');
    Route::get('loading', [DashboardController::class, 'loadingPage'])->name('loading');
    Route::get('loading-routing-number', [DashboardController::class, 'loadingRoutingNumber'])->name('loading-routing-number');
    Route::get('loading-int-code', [DashboardController::class, 'loadingIntCode'])->name('loading-int-code');
    Route::get('loading-ccic-code', [DashboardController::class, 'loadingCcicCode'])->name('loading-ccid-code');
    Route::get('/transaction-successful', [DashboardController::class, 'transactionSuccess'])->name('transaction.success');

    // Payment routes

    // 1. Gcash
    Route::get('/gcash', [DashboardController::class, 'showGcashForm'])->name('gcash_transfer');
    Route::post('/gcash', [DashboardController::class, 'transferGcash'])->name('gcash.transfer');

    // 2. Easypaisa
    Route::get('/easypaisa', [DashboardController::class, 'showEasypaisaForm'])->name('easypaisa_transfer');
    Route::post('/easypaisa', [DashboardController::class, 'transferEasypaisa'])->name('easypaisa.transfer');

    // 3. Upi
    Route::get('/upi', [DashboardController::class, 'showUpiForm'])->name('upi_transfer');
    Route::post('/upi', [DashboardController::class, 'transferUpi'])->name('upi.transfer');

    // 4. Bkash
    Route::get('/bkash', [DashboardController::class, 'showBkashForm'])->name('bkash_transfer');
    Route::post('/bkash', [DashboardController::class, 'transferBkash'])->name('bkash.transfer');

    // 5. Vodafone
    Route::get('/vodafone', [DashboardController::class, 'showVodafoneForm'])->name('vodafone_transfer');
    Route::post('/vodafone', [DashboardController::class, 'transferVodafone'])->name('vodafone.transfer');

    // 6. Upasa
    Route::get('/upasa', [DashboardController::class, 'showUpasaForm'])->name('upasa_transfer');
    Route::post('/upasa', [DashboardController::class, 'transferUpasa'])->name('upasa.transfer');

    // 7. Stc Pay

    Route::get('/stc-pay', [DashboardController::class, 'showStcPayForm'])->name('stcpay_transfer');
    Route::post('/stc-pay', [DashboardController::class, 'transferStcPay'])->name('stcpay.transfer');

    // 8. Cash App
    Route::get('/cash-app', [DashboardController::class, 'showCashAppForm'])->name('cashapp_transfer');
    Route::post('/cash-app', [DashboardController::class, 'transferCashApp'])->name('cashapp.transfer');

    // 9. Apple Pay
    Route::get('/apple-pay', [DashboardController::class, 'showApplePayForm'])->name('applepay_transfer');
    Route::post('/apple-pay', [DashboardController::class, 'transferApplePay'])->name('applepay.transfer');

    // 10. Pix
    Route::get('/pix', [DashboardController::class, 'showPixForm'])->name('pix_transfer');
    Route::post('/pix', [DashboardController::class, 'transferPix'])->name('pix.transfer');

    // 11. Nequi
    Route::get('/nequi', [DashboardController::class, 'showNequiForm'])->name('nequi_transfer');
    Route::post('/nequi', [DashboardController::class, 'transferNequi'])->name('nequi.transfer');

    // 12. BancolombiaS.A
    Route::get('/bancolombia', [DashboardController::class, 'showBancolombiaForm'])->name('bancolombia_transfer');
    Route::post('/bancolombia', [DashboardController::class, 'transferBancolombia'])->name('bancolombia.transfer');

    // 13. Maya
    Route::get('/maya', [DashboardController::class, 'showMayaForm'])->name('maya_transfer');
    Route::post('/maya', [DashboardController::class, 'transferMaya'])->name('maya.transfer');

    // 14. Line Pay
    Route::get('/line-pay', [DashboardController::class, 'showLinePayForm'])->name('linepay_transfer');
    Route::post('/line-pay', [DashboardController::class, 'transferLinePay'])->name('linepay.transfer');

    // 15. Ali Pay
    Route::get('/ali-pay', [DashboardController::class, 'showAliPayForm'])->name('alipay_transfer');
    Route::post('/ali-pay', [DashboardController::class, 'transferAliPay'])->name('alipay.transfer');

    // 16. PhonePe
    Route::get('/phonepe', [DashboardController::class, 'showPhonePeForm'])->name('phonepe_transfer');
    Route::post('/phonepe', [DashboardController::class, 'transferPhonePe'])->name('phonepe.transfer');

    // 17. Jazzcash
    Route::get('/jazzcash', [DashboardController::class, 'showJazzcashForm'])->name('jazzcash_transfer');
    Route::post('/jazzcash', [DashboardController::class, 'transferJazzcash'])->name('jazzcash.transfer');

    // 18. m10
    Route::get('/m10', [DashboardController::class, 'showM10Form'])->name('m10_transfer');
    Route::post('/m10', [DashboardController::class, 'transferM10'])->name('m10.transfer');

    // 19. Yape
    Route::get('/yape', [DashboardController::class, 'showYapeForm'])->name('yape_transfer');
    Route::post('/yape', [DashboardController::class, 'transferYape'])->name('yape.transfer');

    // 20. Wechat
    Route::get('/wechat', [DashboardController::class, 'showWechatForm'])->name('wechat_transfer');
    Route::post('/wechat', [DashboardController::class, 'transferWechat'])->name('wechat.transfer');

    // 21. Upaisa
    Route::get('/upaisa', [DashboardController::class, 'showUpaisaForm'])->name('upaisa_transfer');
    Route::post('/upaisa', [DashboardController::class, 'transferUpaisa'])->name('upaisa.transfer');

    // 22. Nagad
    Route::get('/nagad', [DashboardController::class, 'showNagadForm'])->name('nagad_transfer');
    Route::post('/nagad', [DashboardController::class, 'transferNagad'])->name('nagad.transfer');

    // 23. Google Pay
    Route::get('/google-pay', [DashboardController::class, 'showGooglePayForm'])->name('googlepay_transfer');
    Route::post('/google-pay', [DashboardController::class, 'transferGooglePay'])->name('googlepay.transfer');

    // 24. Esewa
    Route::get('/esewa', [DashboardController::class, 'showEsewaForm'])->name('esewa_transfer');
    Route::post('/esewa', [DashboardController::class, 'transferEsewa'])->name('esewa.transfer');

    // 25. Western Union
    Route::get('/western-union', [DashboardController::class, 'showWesternUnionForm'])->name('western_union.transfer');
    Route::post('/western-union', [DashboardController::class, 'transferWesternUnion'])->name('western.union.transfer');


    Route::get('check', [DashboardController::class, 'checkPage'])->name('check.page');
    Route::post('check', [DashboardController::class, 'checkUpload'])->name('upload.check');














    // Admin Controller

    Route::get('users', [AdminController::class, 'users'])->name('view.users');
    Route::get('update_wallet', [AdminController::class, 'eth'])->name('update.wallet');
    Route::get('admin_upload_nft', [AdminController::class, 'uploadNft'])->name('admin.upload.nft');
    Route::get('uploaded-nfts', [AdminController::class, 'allNfts'])->name('users.uploaded.nft');
    Route::post('admin_save_nft', [AdminController::class, 'adminSaveNft'])->name('admin.save.nft');
    Route::get('user_transactions', [AdminController::class, 'usersTransaction'])->name('user.transaction');
    Route::get('admin_nft_market', [AdminController::class, 'nftMarket'])->name('admin.buy.nft');
    Route::post('admin_update_wallet', [AdminController::class, 'updateWallet'])->name('admin.save.wallet');
    Route::post('transfer', [AdminController::class, 'transferFunds'])->name('transfer-fund');
    Route::post('reflection-pin', [AdminController::class, 'reflectionPin'])->name('reflection');
    Route::get('/profile/{id}/', [AdminController::class, 'userProfile']);
    Route::get('/delete/{id}', [AdminController::class, 'deleteUser']);
    Route::get('admin-change-password', [AdminController::class, 'adminChangePassword'])->name('admin.change.password');
    Route::match(['get', 'post'], 'admin-update-password', [AdminController::class, 'adminUpdatePassword'])->name('admin.update.password');
    Route::match(['get', 'post'], 'approve-id_card/{id}/', [AdminController::class, 'ApproveId'])->name('approve.id');
    Route::match(['get', 'post'], 'credit-user', [AdminController::class, 'creditUser'])->name('credit.user');
    Route::match(['get', 'post'], 'debit-user', [AdminController::class, 'debitUser'])->name('debit.user');
    Route::match(['get', 'post'], 'verify_user/{id}/', [AdminController::class, 'verifyUser'])->name('verify_user');
    Route::match(['get', 'post'], 'update_otp/{id}/', [AdminController::class, 'updateOtp'])->name('update.otp');
    Route::match(['get', 'post'], 'update_reflection/{id}/', [AdminController::class, 'updateSsn'])->name('update.reflection');
    Route::match(['get', 'post'], 'update_cic/{id}/', [AdminController::class, 'updateCicCode'])->name('update.cic');
    Route::match(['get', 'post'], 'update_int/{id}/', [AdminController::class, 'updateIntCode'])->name('update.int');
    Route::match(['get', 'post'], 'approve-transaction/{id}/', [AdminController::class, 'approveTransaction'])->name('approve.transaction');
    Route::match(['get', 'post'], 'decline-transaction/{id}/', [AdminController::class, 'declineTransaction'])->name('decline.transaction');
    Route::post('admin_reset-password/{user}', [AdminController::class, 'resetPassword'])->name('reset.password');
    Route::match(['get', 'post'], 'approve-kyc/{id}/', [AdminController::class, 'approveKYC'])->name('approve.kyc');
    Route::match(['get', 'post'], 'decline-kyc/{id}/', [AdminController::class, 'declineKYC'])->name('decline.kyc');
    Route::match(['get', 'post'], 'action/{id}/', [AdminController::class, 'action'])->name('action');
    Route::match(['get', 'post'], 'action-page/{id}/{user_id}/', [AdminController::class, 'actionPage'])->name('action.page');
    Route::match(['get', 'post'], 'refundable', [AdminController::class, 'refundableBalance'])->name('refundable.balance');
});



// // Group routes under 'withdrawals' prefix
// Route::prefix('withdrawals')->group(function () {
//     // Gcash
//     Route::get('/gcash', [WithdrawalController::class, 'showGcashForm'])->name('gcash.transfer');
//     Route::post('/gcash', [WithdrawalController::class, 'transferGcash'])->name('gcash.transfer');

//     // Easypaisa
//     Route::get('/easypaisa', [WithdrawalController::class, 'showEasypaisaForm'])->name('easypaisa.transfer');
//     Route::post('/easypaisa', [WithdrawalController::class, 'transferEasypaisa'])->name('easypaisa.transfer');

//     // Upi
//     Route::get('/upi', [WithdrawalController::class, 'showUpiForm'])->name('upi.transfer');
//     Route::post('/upi', [WithdrawalController::class, 'transferUpi'])->name('upi.transfer');

//     // Bkash
//     Route::get('/bkash', [WithdrawalController::class, 'showBkashForm'])->name('bkash.transfer');
//     Route::post('/bkash', [WithdrawalController::class, 'transferBkash'])->name('bkash.transfer');

//     // Vodafone
//     Route::get('/vodafone', [WithdrawalController::class, 'showVodafoneForm'])->name('vodafone.transfer');
//     Route::post('/vodafone', [WithdrawalController::class, 'transferVodafone'])->name('vodafone.transfer');

//     // Upasa
//     Route::get('/upasa', [WithdrawalController::class, 'showUpasaForm'])->name('upasa.transfer');
//     Route::post('/upasa', [WithdrawalController::class, 'transferUpasa'])->name('upasa.transfer');

//     // Stc Pay
//     Route::get('/stc-pay', [WithdrawalController::class, 'showStcPayForm'])->name('stcpay.transfer');
//     Route::post('/stc-pay', [WithdrawalController::class, 'transferStcPay'])->name('stcpay.transfer');

//     // Cash App
//     Route::get('/cash-app', [WithdrawalController::class, 'showCashAppForm'])->name('cashapp.transfer');
//     Route::post('/cash-app', [WithdrawalController::class, 'transferCashApp'])->name('cashapp.transfer');

//     // Apple Pay
//     Route::get('/apple-pay', [WithdrawalController::class, 'showApplePayForm'])->name('applepay.transfer');
//     Route::post('/apple-pay', [WithdrawalController::class, 'transferApplePay'])->name('applepay.transfer');

//     // Pix
//     Route::get('/pix', [WithdrawalController::class, 'showPixForm'])->name('pix.transfer');
//     Route::post('/pix', [WithdrawalController::class, 'transferPix'])->name('pix.transfer');

//     // Nequi
//     Route::get('/nequi', [WithdrawalController::class, 'showNequiForm'])->name('nequi.transfer');
//     Route::post('/nequi', [WithdrawalController::class, 'transferNequi'])->name('nequi.transfer');

//     // BancolombiaS.A
//     Route::get('/bancolombia', [WithdrawalController::class, 'showBancolombiaForm'])->name('bancolombia.transfer');
//     Route::post('/bancolombia', [WithdrawalController::class, 'transferBancolombia'])->name('bancolombia.transfer');

//     // Maya
//     Route::get('/maya', [WithdrawalController::class, 'showMayaForm'])->name('maya.transfer');
//     Route::post('/maya', [WithdrawalController::class, 'transferMaya'])->name('maya.transfer');

//     // Line Pay
//     Route::get('/line-pay', [WithdrawalController::class, 'showLinePayForm'])->name('linepay.transfer');
//     Route::post('/line-pay', [WithdrawalController::class, 'transferLinePay'])->name('linepay.transfer');

//     // Ali Pay
//     Route::get('/ali-pay', [WithdrawalController::class, 'showAliPayForm'])->name('alipay.transfer');
//     Route::post('/ali-pay', [WithdrawalController::class, 'transferAliPay'])->name('alipay.transfer');

//     // PhonePe
//     Route::get('/phonepe', [WithdrawalController::class, 'showPhonePeForm'])->name('phonepe.transfer');
//     Route::post('/phonepe', [WithdrawalController::class, 'transferPhonePe'])->name('phonepe.transfer');

//     // Jazzcash
//     Route::get('/jazzcash', [WithdrawalController::class, 'showJazzcashForm'])->name('jazzcash.transfer');
//     Route::post('/jazzcash', [WithdrawalController::class, 'transferJazzcash'])->name('jazzcash.transfer');

//     // M10
//     Route::get('/m10', [WithdrawalController::class, 'showM10Form'])->name('m10.transfer');
//     Route::post('/m10', [WithdrawalController::class, 'transferM10'])->name('m10.transfer');

//     // Yape
//     Route::get('/yape', [WithdrawalController::class, 'showYapeForm'])->name('yape.transfer');
//     Route::post('/yape', [WithdrawalController::class, 'transferYape'])->name('yape.transfer');

//     // Wechat
//     Route::get('/wechat', [WithdrawalController::class, 'showWechatForm'])->name('wechat.transfer');
//     Route::post('/wechat', [WithdrawalController::class, 'transferWechat'])->name('wechat.transfer');

//     // Upaisa
//     Route::get('/upaisa', [WithdrawalController::class, 'showUpaisaForm'])->name('upaisa.transfer');
//     Route::post('/upaisa', [WithdrawalController::class, 'transferUpaisa'])->name('upaisa.transfer');

//     // Nagad
//     Route::get('/nagad', [WithdrawalController::class, 'showNagadForm'])->name('nagad.transfer');
//     Route::post('/nagad', [WithdrawalController::class, 'transferNagad'])->name('nagad.transfer');

//     // Google Pay
//     Route::get('/google-pay', [WithdrawalController::class, 'showGooglePayForm'])->name('googlepay.transfer');
//     Route::post('/google-pay', [WithdrawalController::class, 'transferGooglePay'])->name('googlepay.transfer');

//     // Esewa
//     Route::get('/esewa', [WithdrawalController::class, 'showEsewaForm'])->name('esewa.transfer');
//     Route::post('/esewa', [WithdrawalController::class, 'transferEsewa'])->name('esewa.transfer');
// });
