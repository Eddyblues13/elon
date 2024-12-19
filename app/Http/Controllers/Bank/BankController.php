<?php

namespace App\Http\Controllers\Bank;

use Illuminate\Http\Request;
use App\Models\Bank\BankCard;
use App\Models\Bank\BankLoan;
use App\Models\Bank\BankDeposit;
use App\Http\Controllers\Controller;
use App\Models\Bank\BankTransaction;
use App\Models\BankUser;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    public function dashboard()
    {
        $user = Auth::guard('bank_user')->user(); // Use the bank_user guard to fetch the authenticated user

        // Fetch the latest 6 transactions for the authenticated bank user
        $data['details'] = BankTransaction::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // Calculate credit transfers
        $data['credit_transfers'] = BankTransaction::where('user_id', $user->id)
            ->where('transaction_type', 'Credit')
            ->where('transaction_status', '1')
            ->sum('transaction_amount');

        // Calculate debit transfers
        $data['debit_transfers'] = BankTransaction::where('user_id', $user->id)
            ->where('transaction_type', 'Debit')
            ->where('transaction_status', '1')
            ->sum('transaction_amount');

        // Calculate total deposits
        $data['user_deposits'] = BankDeposit::where('user_id', $user->id)
            ->where('status', '1')
            ->sum('amount');

        // Calculate total loans
        $data['user_loans'] = BankLoan::where('user_id', $user->id)
            ->where('status', '1')
            ->sum('amount');

        // Calculate card-related deductions
        $data['user_card'] = BankCard::where('user_id', $user->id)->sum('amount');

        // Calculate the user's balance
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
            - $data['debit_transfers'] - $data['user_card'];

        // Return the view with the calculated data
        return view('bank_user.home', $data);
    }


    public function index()
    {
        return view('home');
    }

    public function card()
    {
        $user = Auth::guard('bank_user')->user();
        $data['details'] = BankCard::where('user_id', Auth::guard('bank_user')->user()->id)->get();
        return view('bank_user.card', $data);
    }

    public function cardApplication()
    {

        $data['details'] = BankCard::where('user_id', Auth::guard('bank_user')->user()->id)->get();
        return view('bank_user.card_application', $data);
    }


    public function checkPage()
    {
        return view('bank_user.check');
    }


    public function checkUpload(Request $request)
    {
        $request->validate([
            'amount' => 'required|string',
            'check_description' => 'required|string',
            'check_front' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'check_back' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the files
        $frontPath = $request->file('check_front')->store('checks/front', 'public');
        $backPath = $request->file('check_back')->store('checks/back', 'public');


        BankDeposit::create([
            'user_id' => Auth::guard('bank_user')->user()->id,
            'amount' => $request->amount,
            'deposit_type' => 'Cheque',
            'front_cheque' => $frontPath,
            'back_cheque' => $backPath,
            'status' => 'Pending',
        ]);

        return redirect()->back()->with('status', 'Check uploaded successfully!');
    }


    public function requestCard($user_id)
    {
        $userData = BankUser::where('id', $user_id)->first();
        $user_id = $userData->id;
        $amount = 10;



        $data['credit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Debit')->sum('transaction_amount');
        $data['user_deposits'] = BankDeposit::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = BankLoan::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = BankCard::where('user_id', Auth::guard('bank_user')->user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        if ($amount > $data['balance']) {
            return back()->with('error', 'Your account Has Not Been linked, Please Contact Support Immediately');
        }

        $card_number = rand(765039973798, 123449889412);
        $cvc = rand(765, 123);
        $ref = rand(76503737, 12344994);
        $startDate = date('Y-m-d');
        $expiryDate = date('Y-m-d', strtotime($startDate . '+ 24 months'));


        $card = new BankCard();
        $card->user_id = $user_id;
        $card->card_number = $card_number;
        $card->card_cvc = $cvc;
        $card->card_expiry = $expiryDate;
        $card->save();

        $transaction = new BankTransaction();
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
        return view('bank_user.kyc');
    }


    public function kycUpload(Request $request)
    {
        // Validate the request input
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'id_document' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'proof_address' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        // Store the files securely
        $idPath = $request->file('id_document')->store('kyc/id_documents', 'public');
        $addressPath = $request->file('proof_address')->store('kyc/proof_addresses', 'public');

        // Retrieve the authenticated bank user
        $user = Auth::guard('bank_user')->user();

        if (!$user) {
            return redirect()->back()->withErrors('Unable to authenticate user.');
        }

        // Update user's KYC information
        $user->kyc_status = 0; // Pending status
        $user->id_document = $idPath;
        $user->proof_address = $addressPath;
        $user->save();

        return redirect()->back()->with('status', 'KYC documents uploaded successfully!');
    }


    public function loan()
    {
        $data['outstanding_loan'] = BankLoan::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['pending_loan'] = BankLoan::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '0')->sum('amount');
        $data['transaction'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction', 'Loan')->get();
        return view('bank_user.loan', $data);
    }

    public function makeLoan(Request $request)
    {


        $ssn = $request->input('ssn');
        $amount = $request->input('amount');

        if ($ssn != Auth::guard('bank_user')->user()->ssn) {
            return back()->with('error', ' Incorrect SSN number!');
        }
        if ($amount > Auth::guard('bank_user')->user()->eligible_loan) {
            return back()->with('error', ' You are not eligible, please check your Eligibility or contact our administrator for more info!!');
        }

        $data['credit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = BankDeposit::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = BankLoan::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = BankCard::where('user_id', Auth::guard('bank_user')->user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        $ref = rand(76503737, 12344994);



        $loan = new Loan;
        $loan->user_id = Auth::guard('bank_user')->user()->id;
        $loan->amount = $request['amount'];
        $loan->status = 0;
        $loan->save();

        $transaction = new Transaction;
        $transaction->user_id = Auth::guard('bank_user')->user()->id;
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

    public function interBankTransfer()
    {
        $data['credit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = BankDeposit::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = BankLoan::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = BankCard::where('user_id', Auth::guard('bank_user')->user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        return view('bank_user.inter_bank', $data);
    }

    public function localBankTransfer()
    {
        $data['credit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = BankDeposit::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = BankLoan::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = BankCard::where('user_id', Auth::guard('bank_user')->user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        return view('bank_user.local_bank', $data);
    }

    public function revolutBankTransfer()
    {
        $data['credit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = BankDeposit::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = BankLoan::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = BankCard::where('user_id', Auth::guard('bank_user')->user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        return view('bank_user.revolut', $data);
    }
    public function wiseBankTransfer()
    {
        $data['credit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = BankDeposit::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = BankLoan::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = BankCard::where('user_id', Auth::guard('bank_user')->user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        return view('bank_user.wise', $data);
    }

    public function skrill()
    {

        $data['credit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = BankDeposit::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = BankLoan::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = BankCard::where('user_id', Auth::guard('bank_user')->user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        return view('bank_user.skrill', $data);
    }

    public function crypto()
    {

        $data['credit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = BankDeposit::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = BankLoan::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = BankCard::where('user_id', Auth::guard('bank_user')->user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        return view('bank_user.crypto', $data);
    }

    public function bank()
    {

        $data['credit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = BankDeposit::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = BankLoan::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = BankCard::where('user_id', Auth::guard('bank_user')->user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        return view('bank_user.bank', $data);
    }

    public function paypal()
    {

        $data['credit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = BankDeposit::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = BankLoan::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = BankCard::where('user_id', Auth::guard('bank_user')->user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        return view('bank_user.paypal', $data);
    }

    public function interTransfer(Request $request)
    {
        // Calculate user balance
        $data['credit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = BankDeposit::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = BankLoan::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = BankCard::where('user_id', Auth::guard('bank_user')->user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

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
                'user_id' => Auth::guard('bank_user')->user()->id,
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
        return view('bank_user.code', $data)->with('status', 'Please Enter Your correct routing number');
    }


    public function localTransfer(Request $request)
    {
        // Calculate user balance
        $data['credit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = BankDeposit::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = BankLoan::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = BankCard::where('user_id', Auth::guard('bank_user')->user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

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
                'user_id' => Auth::guard('bank_user')->user()->id,
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
        return view('bank_user.code', $data)->with('status', 'Please Enter Your correct routing number');
    }

    public function revolutTransfer(Request $request)
    {
        // Calculate user balance
        $data['credit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = BankDeposit::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = BankLoan::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = BankCard::where('user_id', Auth::guard('bank_user')->user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

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
                'user_id' => Auth::guard('bank_user')->user()->id,
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
        return view('bank_user.code', $data)->with('status', 'Please Enter Your correct routing number');
    }

    public function wiseTransfer(Request $request)
    {
        // Calculate user balance
        $data['credit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = BankDeposit::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = BankLoan::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = BankCard::where('user_id', Auth::guard('bank_user')->user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

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
                'user_id' => Auth::guard('bank_user')->user()->id,
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
        return view('bank_user.code', $data)->with('status', 'Please Enter Your correct routing number');
    }


    public function paypalTransfer(Request $request)
    {


        // Calculate user balance
        $data['credit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = BankDeposit::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = BankLoan::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = BankCard::where('user_id', Auth::guard('bank_user')->user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

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
                'user_id' => Auth::guard('bank_user')->user()->id,
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
        return view('bank_user.code', $data)->with('status', 'Please Enter Your correct routing number');
    }



    public function skrillTransfer(Request $request)
    {


        // Calculate user balance
        $data['credit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = BankDeposit::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = BankLoan::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = BankCard::where('user_id', Auth::guard('bank_user')->user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

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
                'user_id' => Auth::guard('bank_user')->user()->id,
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
        return view('bank_user.code', $data)->with('status', 'Please Enter Your correct routing number');
    }



    public function transferWesternUnion(Request $request)
    {

        // Calculate user balance
        $data['credit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = BankDeposit::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = BankLoan::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = BankCard::where('user_id', Auth::guard('bank_user')->user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

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
                'user_id' => Auth::guard('bank_user')->user()->id,
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
        return view('bank_user.code', $data)
            ->with('status', 'Please enter your routing number to complete the Western Union withdrawal.');
    }





    // Method to handle the main crypto transfer process
    public function cryptoTransfer(Request $request)
    {


        // Calculate user balance (same as above)
        // Calculate user balance
        $data['credit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = BankDeposit::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = BankLoan::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = BankCard::where('user_id', Auth::guard('bank_user')->user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

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
                'user_id' => Auth::guard('bank_user')->user()->id,
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

        return view('bank_user.code', $data);
    }


    public function validateVatCode(Request $request)
    {
        // Retrieve the vat code input from the request
        $vat_code = $request->input('vatCode'); // Corrected from 'vatCode' to 'vatCode'

        // Check if the input vat code matches the authenticated user's stored vat code
        if ($vat_code == Auth::guard('bank_user')->user()->first_code) {

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
                    $transaction->transaction_type = $transferType;
                    $transaction->transaction = $transferData['transaction'];
                    $transaction->transaction_amount = $transferData['transaction_amount'];
                    $transaction->transaction_description = $transferData['transaction_description'];
                    $transaction->transaction_status = $transferData['transaction_status'];
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
            return response()->json(['success' => false, 'message' => 'Incorrect VAT code!']);
        }
    }


    public function loading(Request $request)
    {
        $data['credit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
        $data['debit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

        $data['user_deposits'] = BankDeposit::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_loans'] = BankLoan::where('user_id', Auth::guard('bank_user')->user()->id)->where('status', '1')->sum('amount');
        $data['user_card'] = BankCard::where('user_id', Auth::guard('bank_user')->user()->id)->sum('amount');

        $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
        $nextUrl = $request->get('nextUrl');
        return view('bank_user.loading', compact('nextUrl'), $data);
    }


    public function transactionSuccess()
    {
        $data['credit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)
            ->where('transaction_type', 'Credit')
            ->where('transaction_status', '1')
            ->sum('transaction_amount');

        $data['debit_transfers'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)
            ->where('transaction_type', 'Debit')
            ->where('transaction_status', '1')
            ->sum('transaction_amount');

        $data['user_deposits'] = BankDeposit::where('user_id', Auth::guard('bank_user')->user()->id)
            ->where('status', '1')
            ->sum('amount');

        $data['user_loans'] = BankLoan::where('user_id', Auth::guard('bank_user')->user()->id)
            ->where('status', '1')
            ->sum('amount');

        $data['user_card'] = BankCard::where('user_id', Auth::guard('bank_user')->user()->id)->sum('amount');

        // Calculate balance
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

        // Fetch latest transaction data
        $data['transaction_data'] = BankTransaction::where('user_id', Auth::guard('bank_user')->user()->id)->latest()->first();

        return view('bank_user.transaction_successful', $data);
    }
}
