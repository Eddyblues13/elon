<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Nft;
use App\Models\Card;
use App\Models\Loan;
use App\Models\User;
use App\Models\Debit;
use App\Mail\nftEmail;
use App\Models\Credit;
use GuzzleHttp\Client;
use App\Models\Deposit;
use App\Models\Transfer;
use App\Mail\nftUserEmail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class DashboardController extends Controller
{

    public function transferPage()
    {
        return view('dashboard.transfer');
    }

    public function userProfile()
    {

        return view('dashboard.profile');
    }


    public function showRoutingForm()
    {
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        return view('dashboard.routing-number', $data);
    }


    public function showIntCodeForm()
    {
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        return view('dashboard.int-code', $data);
    }


    public function showCcicCodeForm()
    {
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        return view('dashboard.ccic-code', $data);
    }

    public function loadingPage(Request $request)
    {
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        $nextUrl = $request->get('nextUrl');
        return view('dashboard.loading', compact('nextUrl'), $data);
    }

    public function loadingRoutingNumber(Request $request)
    {
        // Retrieve the authenticated user ID
        $userId = Auth::user()->id;

        // Collect transaction and financial data for the user
        $data['credit_transfers'] = Transaction::where('user_id', $userId)
            ->where('transaction_type', 'Credit')
            ->sum('transaction_amount');

        $data['debit_transfers'] = Transaction::where('user_id', $userId)
            ->where('transaction_type', 'Debit')
            ->sum('transaction_amount');

        $data['user_deposits'] = Deposit::where('user_id', $userId)
            ->where('status', '1')
            ->sum('amount');

        $data['user_loans'] = Loan::where('user_id', $userId)
            ->where('status', '1')
            ->sum('amount');

        $data['user_card'] = Card::where('user_id', $userId)
            ->sum('amount');

        $data['user_credit'] = Credit::where('user_id', $userId)
            ->where('status', '1')
            ->sum('amount');

        $data['user_debit'] = Debit::where('user_id', $userId)
            ->where('status', '1')
            ->sum('amount');

        // Calculate balance
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']
            + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        // Get the next URL from the request
        $nextUrl = $request->get('nextUrl');

        // Retrieve the transfer method (default is 'bank')
        $data['method'] = $request->input('method') ?? 'bank';

        // Retrieve transfer data from the session based on the method
        $data['transferData'] = session("{$data['method']}_transfer");

        // Store the entire request data in the session
        $request->session()->put('formData', $request->all());

        // Pass the data and nextUrl to the view
        return view('dashboard.loading_routing_number', compact('nextUrl', 'data'));
    }


    public function loadingIntCode(Request $request)
    {
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        $nextUrl = $request->get('nextUrl');
        return view('dashboard.loading_int_number', compact('nextUrl'), $data);
    }

    public function loadingCcicCode(Request $request)
    {
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        $nextUrl = $request->get('nextUrl');
        return view('dashboard.loading_ccic_code', compact('nextUrl'), $data);
    }

    public function transactionSuccess(Transaction $transaction)
    {
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        return view('dashboard.transaction_successful', $data);
    }



    public function skrill()
    {
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        return view('dashboard.skrill', $data);
    }

    public function crypto()
    {
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        return view('dashboard.crypto', $data);
    }

    public function interBankTransfer()
    {
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        return view('dashboard.inter_bank', $data);
    }

    public function localBankTransfer()
    {
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        return view('dashboard.local_bank', $data);
    }

    public function revolutBankTransfer()
    {
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        return view('dashboard.revolut', $data);
    }
    public function wiseBankTransfer()
    {
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        return view('dashboard.wise', $data);
    }
    public function paypal()
    {
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        return view('dashboard.paypal', $data);
    }


    public function showWesternUnionForm()
    {
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        return view('dashboard.withdrawals.western_union', $data);
    }



    public function card()
    {

        $data['details'] = Card::where('user_id', Auth::user()->id)->get();
        return view('dashboard.card', $data);
    }



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
            ->with('status', "Please Enter Your correct VAT CODE  for {$method}.");
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
        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session instead of the database
        session([
            'gcash_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "GCASH" . $ref,
                'transaction_ref' => "GCASH" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Gcash Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Gcash transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Please Enter Your correct routing number');
    }


    public function transferEasypaisa(Request $request)
    {
        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session instead of the database
        session([
            'easypaisa_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "EP" . $ref,
                'transaction_ref' => "EP" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Easypaisa Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Easypaisa transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Please Enter Your correct routing number');
    }


    public function transferUpi(Request $request)
    {
        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session instead of the database
        session([
            'upi_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "UPI" . $ref,
                'transaction_ref' => "UPI" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "UPI Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "UPI transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Please Enter Your correct routing number');
    }


    public function transferBkash(Request $request)
    {
        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session instead of the database
        session([
            'bkash_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "BK" . $ref,
                'transaction_ref' => "BK" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Bkash Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Bkash transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Please Enter Your correct routing number');
    }

    public function transferVodafone(Request $request)
    {
        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session instead of the database
        session([
            'vodafone_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "VF" . $ref,
                'transaction_ref' => "VF" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Vodafone Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Vodafone transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Please Enter Your correct routing number');
    }


    public function transferUpasa(Request $request)
    {
        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session instead of the database
        session([
            'upasa_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "UPASA" . $ref,
                'transaction_ref' => "UPASA" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Upasa Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Upasa transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Please Enter Your correct routing number');
    }


    public function transferStcPay(Request $request)
    {
        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session instead of the database
        session([
            'stc_pay_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "STCPAY" . $ref,
                'transaction_ref' => "STCPAY" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "STC Pay Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "STC Pay transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Please Enter Your correct routing number');
    }


    public function transferCashApp(Request $request)
    {
        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session instead of the database
        session([
            'cash_app_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "CASHAPP" . $ref,
                'transaction_ref' => "CASHAPP" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Cash App Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Cash App transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Please Enter Your correct routing number');
    }


    public function transferApplePay(Request $request)
    {
        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session instead of the database
        session([
            'apple_pay_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "APPLEPAY" . $ref,
                'transaction_ref' => "APPLEPAY" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Apple Pay Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Apple Pay transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Please Enter Your correct routing number');
    }


    public function transferPix(Request $request)
    {
        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session instead of the database
        session([
            'pix_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "PIX" . $ref,
                'transaction_ref' => "PIX" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Pix Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Pix transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Please Enter Your correct routing number');
    }


    public function transferNequi(Request $request)
    {
        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session instead of the database
        session([
            'nequi_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "NEQUI" . $ref,
                'transaction_ref' => "NEQUI" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Nequi Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Nequi transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Please Enter Your correct routing number');
    }


    public function transferBancolombia(Request $request)
    {


        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session instead of the database
        session([
            'bancolombia_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "BANCOLOMBIA" . $ref,
                'transaction_ref' => "BANCOLOMBIA" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Bancolombia Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Bancolombia transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Bancolombia withdrawal successful!');
    }


    public function transferMaya(Request $request)
    {
        // Define validation rules
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'maya_account' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session instead of the database
        session([
            'maya_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "MAYA" . $ref,
                'transaction_ref' => "MAYA" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Maya Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Maya transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Maya withdrawal successful!');
    }


    public function transferLinePay(Request $request)
    {
        // Define validation rules
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'line_pay_id' => 'required|string',
            ],
            'amount_field' => 'amount',
        ];

        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session instead of the database
        session([
            'line_pay_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "LINEPAY" . $ref,
                'transaction_ref' => "LINEPAY" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Line Pay Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Line Pay transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Line Pay withdrawal successful!');
    }

    public function transferAliPay(Request $request)
    {
        // Define validation rules
        $fields = [
            'validation' => [
                'amount' => 'required|numeric|min:1',
                'ali_pay_id' => 'required|email',
            ],
            'amount_field' => 'amount',
        ];

        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session instead of the database
        session([
            'ali_pay_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "ALIPAY" . $ref,
                'transaction_ref' => "ALIPAY" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Ali Pay Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Ali Pay transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Ali Pay withdrawal successful!');
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

        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session
        session([
            'phonepe_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "PHONEPE" . $ref,
                'transaction_ref' => "PHONEPE" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "PhonePe Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "PhonePe transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'PhonePe withdrawal successful!');
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

        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session
        session([
            'jazzcash_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "JAZZCASH" . $ref,
                'transaction_ref' => "JAZZCASH" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Jazzcash Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Jazzcash transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Jazzcash withdrawal successful!');
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

        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session
        session([
            'm10_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "M10" . $ref,
                'transaction_ref' => "M10" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "M10 Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "M10 transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'M10 withdrawal successful!');
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

        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session
        session([
            'yape_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "YAPE" . $ref,
                'transaction_ref' => "YAPE" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Yape Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Yape transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Yape withdrawal successful!');
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

        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session
        session([
            'wechat_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "WECHAT" . $ref,
                'transaction_ref' => "WECHAT" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Wechat Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Wechat transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Wechat withdrawal successful!');
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

        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session
        session([
            'upaisa_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "UPAISA" . $ref,
                'transaction_ref' => "UPAISA" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Upaisa Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Upaisa transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Upaisa withdrawal successful!');
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

        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session
        session([
            'nagad_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "NAGAD" . $ref,
                'transaction_ref' => "NAGAD" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Nagad Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Nagad transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Nagad withdrawal successful!');
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

        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session
        session([
            'google_pay_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "GOOGLEPAY" . $ref,
                'transaction_ref' => "GOOGLEPAY" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Google Pay Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Google Pay transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Google Pay withdrawal successful!');
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

        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session
        session([
            'esewa_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "ESEWA" . $ref,
                'transaction_ref' => "ESEWA" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Esewa Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Esewa transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Esewa withdrawal successful!');
    }
















    public function requestCard($user_id)
    {
        $userData = User::where('id', $user_id)->first();
        $user_id = $userData->id;
        $amount = 10;



        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        if ($amount > $data['balance']) {
            return back()->with('error', ' Your account balance is insufficient, contact our administrator for more info!!');
        }

        $card_number = rand(765039973798, 123449889412);
        $cvc = rand(765, 123);
        $ref = rand(76503737, 12344994);
        $startDate = date('Y-m-d');
        $expiryDate = date('Y-m-d', strtotime($startDate . '+ 24 months'));


        $card = new Card;
        $card->user_id = $user_id;
        $card->card_number = $card_number;
        $card->card_cvc = $cvc;
        $card->card_expiry = $expiryDate;
        $card->save();

        $transaction = new Transaction;
        $transaction->user_id = $user_id;
        $transaction->transaction_id = $card->id;
        $transaction->transaction_ref = "CD" . $ref;
        $transaction->transaction_type = "Debit";
        $transaction->transaction = "Card";
        $transaction->transaction_amount = "10";
        $transaction->transaction_description = "Virtual Card Purchase";
        $transaction->transaction_status = 1;
        $transaction->save();

        return back()->with('status', 'Card Purchased Successfully');
    }



    public function kycPage()
    {
        return view('dashboard.kyc');
    }


    public function kycUpload(Request $request)
    {
        // Validate the request
        $request->validate([
            'full_name' => 'required|string|max:255',
            'id_document' => 'required|file|mimes:jpeg,png,jpg,pdf|max:10240', // 10 MB max size
            'proof_address' => 'required|file|mimes:jpeg,png,jpg,pdf|max:10240', // 10 MB max size
        ]);

        // Get the authenticated user
        $kyc = Auth::user();

        // Set the initial KYC status to pending (0)
        $kyc->kyc_status = 0;

        // Handle ID document upload
        if ($request->hasFile('id_document')) {
            try {
                $file_id_document = $request->file('id_document');
                $ext_id_document = $file_id_document->getClientOriginalExtension();
                $filename_id_document = time() . '_id_document.' . $ext_id_document;
                $file_id_document->move(public_path('uploads/kyc/id_documents'), $filename_id_document);
                $kyc->id_document = 'uploads/kyc/id_documents/' . $filename_id_document;
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['id_document' => 'Failed to upload ID document.']);
            }
        }

        // Handle proof of address upload
        if ($request->hasFile('proof_address')) {
            try {
                $file_proof_address = $request->file('proof_address');
                $ext_proof_address = $file_proof_address->getClientOriginalExtension();
                $filename_proof_address = time() . '_proof_address.' . $ext_proof_address;
                $file_proof_address->move(public_path('uploads/kyc/proof_addresses'), $filename_proof_address);
                $kyc->proof_address = 'uploads/kyc/proof_addresses/' . $filename_proof_address;
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['proof_address' => 'Failed to upload proof of address.']);
            }
        }

        // Save the KYC information to the database
        $kyc->save();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'KYC documents uploaded successfully!');
    }






    public function notification()
    {
        return view('dashboard.notification');
    }
    public function transactions()
    {
        $data['transaction'] = Transaction::where('user_id', Auth::user()->id)->get();
        return view('dashboard.transactions', $data);
    }

    public function viewInvoice(Request $request, $tid)
    {

        $data['invoice'] = DB::table('cards')
            ->join('transactions', 'cards.id', '=', 'transactions.transaction_id')
            ->select('cards.*', 'transactions.*')
            ->where('transaction_id', $tid)
            ->get();

        return view('dashboard.view_invoice', $data);

        if ($request['type'] == 'Transfer') {
            $data['invoice'] = DB::table('transfers')
                ->join('transactions', 'transfers.id', '=', 'transactions.transaction_id')
                ->select('transfers.*', 'transactions.*')
                ->where('id', $tid)
                ->get();
            return view('dashboard.transfer_invoice', $data);
        }
    }

    public function pendingTransfer()
    {
        return view('dashboard.pending_transfer');
    }
    public function settings()
    {
        return view('dashboard.settings');
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            $data['message'] = 'old password not correct';
            return back()->with("error", "Old Password Doesn't match! Please input your correct old password");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        Session::flush();
        Auth::guard('web')->logout();
        return redirect('login')->with('status', 'Password Updated Successfully, Please login with your new password');
    }
    public function profile()
    {
        return view('dashboard.profile');
    }

    public function userChangePassword()
    {
        return view('dashboard.change_password');
    }

    public function deposit()
    {
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        return view('dashboard.deposit', $data);
    }

    public function loan()
    {
        $data['outstanding_loan'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['pending_loan'] = Loan::where('user_id', Auth::user()->id)->where('status', '0')->sum('amount');
        $data['transaction'] = Transaction::where('user_id', Auth::user()->id)->where('transaction', 'Loan')->get();
        return view('dashboard.loan', $data);
    }







    public function interTransfer(Request $request)
    {
        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }


        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session
        session([
            'inter_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "TR" . $ref,
                'transaction_ref' => "TR" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Bank Transfer",
                'transaction_amount' => $request['amount'],
                'transaction_description' => "Bank Transfer transaction",
                'account_name' => $request['account_name'],
                'account_number' => $request['account_number'],
                'account_type' => $request['account_type'],
                'bank_name' => $request['bank_name'],
                'routing_number' => $request['routing_number'],
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Please Enter Your correct routing number');
    }


    public function localTransfer(Request $request)
    {
        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }


        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session
        session([
            'local_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "TR" . $ref,
                'transaction_ref' => "TR" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Bank Transfer",
                'transaction_amount' => $request['amount'],
                'transaction_description' => "Bank Transfer transaction",
                'account_name' => $request['account_name'],
                'account_number' => $request['account_number'],
                'account_type' => $request['account_type'],
                'bank_name' => $request['bank_name'],
                'routing_number' => $request['routing_number'],
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Please Enter Your correct routing number');
    }

    public function revolutTransfer(Request $request)
    {
        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session
        session([
            'revolut_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "REV" . $ref,
                'transaction_ref' => "REV" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Revolut Withdrawal",
                'transaction_amount' => $request['amount'],
                'transaction_description' => "Revolut transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Please Enter Your correct routing number');
    }

    public function wiseTransfer(Request $request)
    {
        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }


        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session
        session([
            'wise_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "WIS" . $ref,
                'transaction_ref' => "WIS" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Wise Withdrawal",
                'transaction_amount' => $request['amount'],
                'transaction_description' => "Wise transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Please Enter Your correct routing number');
    }


    public function paypalTransfer(Request $request)
    {


        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session instead of the database
        session([
            'paypal_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "PAY" . $ref,
                'transaction_ref' => "PAY" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Paypal Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Paypal transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Please Enter Your correct routing number');
    }



    public function skrillTransfer(Request $request)
    {


        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session instead of the database
        session([
            'skrill_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "SKR" . $ref,
                'transaction_ref' => "SKR" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Skrill Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => "Skrill transaction",
                'transaction_status' => 0,
            ]
        ]);

        // Redirect to a specific view
        return view('dashboard.routing-number', $data)->with('status', 'Please Enter Your correct routing number');
    }



    public function transferWesternUnion(Request $request)
    {

        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }

        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Generate a unique transaction reference
        $ref = strtoupper(uniqid('WU'));

        // Store transaction details in the session
        session([
            'western_union_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => $ref,
                'transaction_ref' => $ref,
                'transaction_type' => 'Debit',
                'transaction' => 'Western Union Withdrawal',
                'transaction_amount' => $request->input('amount'),
                'transaction_description' => 'Western Union transfer to ' . $request->input('recipient_name'),
                'transaction_status' => 0, // 0 for pending, 1 for completed
                'recipient_name' => $request->input('recipient_name'),
                'recipient_country' => $request->input('recipient_country'),
                'recipient_city' => $request->input('recipient_city'),
                // Include any additional details as needed
            ]
        ]);

        // Redirect to a confirmation or routing number view
        return view('dashboard.routing-number', $data)
            ->with('status', 'Please enter your routing number to complete the Western Union withdrawal.');
    }





    // Method to handle the main crypto transfer process
    public function cryptoTransfer(Request $request)
    {


        // Calculate user balance (same as above)
        // Calculate user balance
        $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
            ->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)
            ->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Check if balance is sufficient (same as above)
        if ($data['balance'] <= 0 || $data['balance'] < $request->input('amount')) {
            return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!')
                ->withInput($request->all());
        }
        // Generate a transaction reference
        $ref = rand(76503737, 12344994);

        // Store transaction details in the session
        session([
            'crypto_transfer' => [
                'user_id' => Auth::user()->id,
                'transaction_id' => "CRP" . $ref,
                'transaction_ref' => "CRP" . $ref,
                'transaction_type' => "Debit",
                'transaction' => "Crypto Withdrawal",
                'transaction_amount' => $request->input('amount'),
                'wallet_type' => $request->input('wallet_type'),
                'wallet_address' => $request->input('wallet_address'),
                'transaction_description' => "Crypto Withdrawal transaction",
                'transaction_status' => 0,
            ]
        ]);

        return view('dashboard.routing-number', $data);
    }


    
    // Method to validate the Routing Number (OTP)
public function validateRoutingNumber(Request $request)
{
    // Retrieve the routing number from the request
    $routingNumber = $request->input('routingNumber');

    // Check if the routing number is provided
    if (is_null($routingNumber) || $routingNumber === '') {
        return response()->json([
            'success' => false,
            'message' => 'Routing Number is required!'
        ]);
    }

    // Check if the routing number matches the user's OTP
    if ($routingNumber == Auth::user()->otp) {
        return response()->json(['success' => true]); // Success response for JavaScript redirection
    } else {
        return response()->json(['success' => false, 'message' => 'Incorrect VAT CODE!']);
    }
}




    // Method to validate the INT Code
    public function validateIntCode(Request $request)
    {
        $int_code = $request->input('intCode');

        if ($int_code == Auth::user()->int_code) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Incorrect INT code!']);
        }
    }

    // // Method to validate the CCIC Code
    // public function validateCcic(Request $request)
    // {
    //     $ccic_code = $request->input('ccic');

    //     if ($ccic_code == Auth::user()->ccic_code) {
    //         return response()->json(['success' => true]);
    //     } else {
    //         return response()->json(['success' => false, 'message' => 'Incorrect CCIC code!']);
    //     }
    // }

    public function validateCcicCode(Request $request)
    {
        // Retrieve the CCIC code input from the request
        $ccic_code = $request->input('ccidCode'); // Corrected from 'ccidCode' to 'ccicCode'

        // Check if the input CCIC code matches the authenticated user's stored CCIC code
        if ($ccic_code == Auth::user()->ccic_code) {

            // Retrieve session data for each transfer method
            $transferTypes = [
                'paypal_transfer',
                'inter_transfer',
                'local_transfer',
                'revolut_transfer',
                'wise_transfer',
                'crypto_transfer',
                'skrill_transfer',
                'western_union_transfer',
                'gcash_transfer',
                'easypaisa_transfer',
                'upi_transfer',
                'bkash_transfer',
                'vodafone_transfer',
                'upasa_transfer',
                'stc_pay_transfer',
                'cash_app_transfer',
                'apple_pay_transfer',
                'pix_transfer',
                'nequi_transfer',
                'bancolombia_transfer',
                'maya_transfer',
                'line_pay_transfer',
                'ali_pay_transfer',
                'phonepe_transfer',
                'jazzcash_transfer',
                'm10_transfer',
                'yape_transfer',
                'wechat_transfer',
                'upaisa_transfer',
                'nagad_transfer',
                'google_pay_transfer',
                'esewa_transfer'
            ];

            // Array to store processed transactions
            $transactions = [];

            // Function to process transfer details
            $processTransfer = function ($transferData, $transferType) use (&$transactions) {
                if ($transferData) {
                    $transaction = new Transaction();
                    $transaction->user_id = $transferData['user_id'];
                    $transaction->transaction_id = $transferData['transaction_id'];
                    $transaction->transaction_ref = $transferData['transaction_ref'];
                    $transaction->transaction_type = 'Debit';
                    $transaction->transaction = $transferData['transaction'];
                    $transaction->transaction_amount = $transferData['transaction_amount'];
                    $transaction->transaction_description = $transferData['transaction_description'];
                    $transaction->transaction_status = 0;
                    $transaction->save();
                    $transactions[] = $transaction;

                    // Forget the session for this transfer method
                    session()->forget($transferType);
                }
            };

            // Process each transfer type
            foreach ($transferTypes as $transferType) {
                $transferData = session($transferType);
                $processTransfer($transferData, $transferType);
            }

            // Return success response if at least one transaction was saved
            if (!empty($transactions)) {
                return response()->json(['success' => true, 'message' => 'Transactions saved successfully!']);
            } else {
                return response()->json(['success' => false, 'message' => 'No transaction data in session!']);
            }
        } else {
            // CCIC code does not match
            return response()->json(['success' => false, 'message' => 'Incorrect BVT code!']);
        }
    }

















    public function personalDetails(Request $request)
    {


        $update = Auth::user();
        $update->first_name = $request['first_name'];
        $update->last_name = $request['last_name'];
        $update->phone_number = $request['user_phone'];
        $update->address = $request['user_address'];
        $update->country = $request['country'];



        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/display', $filename);
            $update->display_picture =  $filename;
        }
        $update->update();

        return back()->with('status', 'Personal Details Updated Successfully');
    }


    public function personalDp(Request $request)
    {


        $update = Auth::user();



        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/display', $filename);
            $update->display_picture =  $filename;
        }
        $update->update();

        return back()->with('status', 'Personal Details Updated Successfully');
    }




    public function makeDeposit(Request $request)
    {

        $ref = rand(76503737, 12344994);



        $deposit = new Deposit;
        $deposit->user_id = Auth::user()->id;
        $deposit->amount = $request['amount'];
        $deposit->status = 0;

        if ($request->hasFile('front_cheque')) {
            $file = $request->file('front_cheque');

            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/cheque', $filename);
            $deposit->front_cheque =  $filename;
        }

        if ($request->hasFile('back_cheque')) {
            $file = $request->file('back_cheque');

            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/cheque', $filename);
            $deposit->back_cheque =  $filename;
        }



        $deposit->save();

        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = $deposit->id;
        $transaction->transaction_ref = "DP" . $ref;
        $transaction->transaction_type = "Credit";
        $transaction->transaction = "Deposit";
        $transaction->transaction_amount = $request['amount'];
        $transaction->transaction_description = "A deposit  of " . $request['amount'];
        $transaction->transaction_status = 1;
        $transaction->save();

        return back()->with('status', 'Deposit detected, please wait for approval by the administrator');
    }


    public function makeLoan(Request $request)
    {


        $ssn = $request->input('ssn');
        $amount = $request->input('amount');

        if ($ssn != Auth::user()->ssn) {
            return back()->with('error', ' Incorrect SSN number!');
        }
        if ($amount > Auth::user()->eligible_loan) {
            return back()->with('error', ' You are not eligible, please check your Eligibility or contact our administrator for more info!!');
        }

        $data['user_transfers'] = Transfer::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
        $data['user_credit'] = Credit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['user_debit'] = Debit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['balance'] = $data['user_deposits'] +  $data['user_credit'] + $data['user_loans'] - $data['user_debit'] - $data['user_card'];

        $ref = rand(76503737, 12344994);



        $loan = new Loan;
        $loan->user_id = Auth::user()->id;
        $loan->amount = $request['amount'];
        $loan->status = 0;
        $loan->save();

        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = $loan->id;
        $transaction->transaction_ref = "LN" . $ref;
        $transaction->transaction_type = "Credit";
        $transaction->transaction = "Loan";
        $transaction->transaction_amount = $request['amount'];
        $transaction->transaction_description = "Requested for a loan of " . $request['amount'];
        $transaction->transaction_status = 0;
        $transaction->save();



        return back()->with('status', 'Loan detected, please wait for approval by the administrator');
    }
}
