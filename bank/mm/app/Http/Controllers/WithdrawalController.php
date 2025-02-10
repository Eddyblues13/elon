<?php
// app/Http/Controllers/WithdrawalController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Deposit;
use App\Models\Loan;
use App\Models\Card;
use App\Models\Credit;
use App\Models\Debit;

class WithdrawalController extends Controller
{
    /**
     * Calculate the user's current balance.
     *
     * @return float
     */
    private function calculateBalance()
    {
        $userId = Auth::user()->id;

        $creditTransfers = Transaction::where('user_id', $userId)
            ->where('transaction_type', 'Credit')->sum('transaction_amount');
        $debitTransfers = Transaction::where('user_id', $userId)
            ->where('transaction_type', 'Debit')->sum('transaction_amount');
        $userDeposits = Deposit::where('user_id', $userId)
            ->where('status', '1')->sum('amount');
        $userLoans = Loan::where('user_id', $userId)
            ->where('status', '1')->sum('amount');
        $userCard = Card::where('user_id', $userId)->sum('amount');
        $userCredit = Credit::where('user_id', $userId)
            ->where('status', '1')->sum('amount');
        $userDebit = Debit::where('user_id', $userId)
            ->where('status', '1')->sum('amount');

        $balance = $userDeposits + $creditTransfers + $userLoans
            - $debitTransfers - $userCard;

        return $balance;
    }

    /**
     * General method to handle transfer logic.
     *
     * @param Request $request
     * @param string $method
     * @param array $fields
     * @param string $viewName
     * @param string $successMessage
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    private function handleTransfer(Request $request, $method, $fields, $viewName, $successMessage)
    {
        // Validate input
        $request->validate($fields['validation']);

        // Calculate balance
        $balance = $this->calculateBalance();

        // Check if balance is sufficient
        if ($balance <= 0 || $balance < $request->input($fields['amount_field'])) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session
        session([
            "{$method}_transfer" => [
                'user_id' => Auth::user()->id,
                'transaction_id' => strtoupper($method) . $ref,
                'transaction_ref' => strtoupper($method) . $ref,
                'transaction_type' => "Debit",
                'transaction' => "{$method} Withdrawal",
                'transaction_amount' => $request->input($fields['amount_field']),
                'transaction_description' => "{$method} transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', compact('balance'))
            ->with('status', "Please Enter Your correct routing number for {$method}.");
    }

    // -------------------- Show Form Methods --------------------

    public function showGcashForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.gcash', compact('balance'));
    }

    public function showEasypaisaForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.easypaisa', compact('balance'));
    }

    public function showUpiForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.upi', compact('balance'));
    }

    public function showBkashForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.bkash', compact('balance'));
    }

    public function showVodafoneForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.vodafone', compact('balance'));
    }

    public function showUpasaForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.upasa', compact('balance'));
    }

    public function showStcPayForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.stc_pay', compact('balance'));
    }

    public function showCashAppForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.cash_app', compact('balance'));
    }

    public function showApplePayForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.apple_pay', compact('balance'));
    }

    public function showPixForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.pix', compact('balance'));
    }

    public function showNequiForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.nequi', compact('balance'));
    }

    public function showBancolombiaForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.bancolombia', compact('balance'));
    }

    public function showMayaForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.maya', compact('balance'));
    }

    public function showLinePayForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.line_pay', compact('balance'));
    }

    public function showAliPayForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.ali_pay', compact('balance'));
    }

    public function showPhonePeForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.phonepe', compact('balance'));
    }

    public function showJazzcashForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.jazzcash', compact('balance'));
    }

    public function showM10Form()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.m10', compact('balance'));
    }

    public function showYapeForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.yape', compact('balance'));
    }

    public function showWechatForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.wechat', compact('balance'));
    }

    public function showUpaisaForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.upaisa', compact('balance'));
    }

    public function showNagadForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.nagad', compact('balance'));
    }

    public function showGooglePayForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.google_pay', compact('balance'));
    }

    public function showEsewaForm()
    {
        $balance = $this->calculateBalance();
        return view('dashboard.withdrawals.esewa', compact('balance'));
    }

    // -------------------- Transfer Methods --------------------

    public function transferGcash(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'phone_number' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'gcash', $fields, 'dashboard.routing-number', 'Gcash withdrawal successful!');
    }

    public function transferEasypaisa(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'phone_number' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'easypaisa', $fields, 'dashboard.routing-number', 'Easypaisa withdrawal successful!');
    }

    public function transferUpi(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'upi_id' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'upi', $fields, 'dashboard.routing-number', 'UPI withdrawal successful!');
    }

    public function transferBkash(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'phone_number' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'bkash', $fields, 'dashboard.routing-number', 'Bkash withdrawal successful!');
    }

    public function transferVodafone(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'vodafone_account' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'vodafone', $fields, 'dashboard.routing-number', 'Vodafone withdrawal successful!');
    }

    public function transferUpasa(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'upasa_account' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'upasa', $fields, 'dashboard.routing-number', 'Upasa withdrawal successful!');
    }

    public function transferStcPay(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'stc_pay_account' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'stc_pay', $fields, 'dashboard.routing-number', 'Stc Pay withdrawal successful!');
    }

    public function transferCashApp(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'cash_app_username' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'cash_app', $fields, 'dashboard.routing-number', 'Cash App withdrawal successful!');
    }

    public function transferApplePay(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'apple_pay_id' => 'required|email',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'apple_pay', $fields, 'dashboard.routing-number', 'Apple Pay withdrawal successful!');
    }

    public function transferPix(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'pix_key' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'pix', $fields, 'dashboard.routing-number', 'Pix withdrawal successful!');
    }

    public function transferNequi(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'nequi_phone' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'nequi', $fields, 'dashboard.routing-number', 'Nequi withdrawal successful!');
    }

    public function transferBancolombia(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'bancolombia_account' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'bancolombia', $fields, 'dashboard.routing-number', 'BancolombiaS.A withdrawal successful!');
    }

    public function transferMaya(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'maya_account' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'maya', $fields, 'dashboard.routing-number', 'Maya withdrawal successful!');
    }

    public function transferLinePay(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'line_pay_id' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'line_pay', $fields, 'dashboard.routing-number', 'Line Pay withdrawal successful!');
    }

    public function transferAliPay(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'ali_pay_id' => 'required|email',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'ali_pay', $fields, 'dashboard.routing-number', 'Ali Pay withdrawal successful!');
    }

    public function transferPhonePe(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'phonepe_number' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'phonepe', $fields, 'dashboard.routing-number', 'PhonePe withdrawal successful!');
    }

    public function transferJazzcash(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'jazzcash_number' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'jazzcash', $fields, 'dashboard.routing-number', 'Jazzcash withdrawal successful!');
    }

    public function transferM10(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'm10_account' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'm10', $fields, 'dashboard.routing-number', 'm10 withdrawal successful!');
    }

    public function transferYape(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'yape_number' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'yape', $fields, 'dashboard.routing-number', 'Yape withdrawal successful!');
    }

    public function transferWechat(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'wechat_id' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'wechat', $fields, 'dashboard.routing-number', 'Wechat withdrawal successful!');
    }

    public function transferUpaisa(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'upaisa_id' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'upaisa', $fields, 'dashboard.routing-number', 'Upaisa withdrawal successful!');
    }

    public function transferNagad(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'nagad_number' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'nagad', $fields, 'dashboard.routing-number', 'Nagad withdrawal successful!');
    }

    public function transferGooglePay(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'google_pay_id' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'google_pay', $fields, 'dashboard.routing-number', 'Google Pay withdrawal successful!');
    }

    public function transferEsewa(Request $request)
    {
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'esewa_id' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        return $this->handleTransfer($request, 'esewa', $fields, 'dashboard.routing-number', 'Esewa withdrawal successful!');
    }
}
