<?php

namespace App\Http\Controllers\Admin;

use App\Mail\DebitEmail;
use App\Models\BankUser;
use App\Mail\CreditEmail;
use App\Mail\BankUserEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\BankTransaction;
use App\Models\Bank\BankDeposit;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ManageBankController extends Controller
{
    public function manageBanking()
    {
        $data['users'] = BankUser::get();
        return view('admin.banking.home', $data);
    }


    public function viewBankUser($id)
    {
        // Retrieve the user by ID
        $user = BankUser::findOrFail($id);

        $data['user'] = BankUser::where('id', $id)
            ->first();;

        if (!$data['user']) {
            abort(404, 'User not found');
        }


        $data['credit_transfers'] = BankTransaction::where('user_id', $id)->where('transaction_type', 'Credit')->sum('transaction_amount');
        $data['debit_transfers'] = BankTransaction::where('user_id', $id)->where('transaction_type', 'Debit')->sum('transaction_amount');

        $data['total_balance'] =  $data['credit_transfers'] - $data['debit_transfers'];

        // Pass user data to the view
        return view('admin.banking.user_data', $data);
    }



    public function showDepositRequests()
    {

        $data['deposit'] = BankUser::join('deposits', 'users.id', '=', 'deposits.user_id')
            ->select('users.email', 'users.first_name', 'users.last_name', 'deposits.*')
            ->get();



        return view('admin.banking.manage_deposit', $data);
    }
    public function approveDeposit($id)
    {
        $user = BankDeposit::findOrFail($id);
        $user->status = 1; // Assuming 1 means 'approved'
        $user->save();

        return redirect()->route('bank.admin.deposit.index')->with('message', 'Deposit approved successfully!');
    }

    public function rejectDeposit($id)
    {
        $user = BankDeposit::findOrFail($id);
        $user->status = 0; // Assuming 2 means 'rejected'
        $user->save();

        return redirect()->route('admin.deposit.index')->with('message', 'Deposit rejected successfully!');
    }

    public function manageTransactionsPage()
    {

        $data['transactions'] = BankUser::join('transactions', 'users.id', '=', 'transactions.user_id')
            ->get(['users.email', 'users.first_name', 'users.last_name', 'transactions.*']);

        return view('admin.banking.manage_transactions', $data);
    }


    public function showKycRequests()
    {
        // Fetch all users with KYC uploaded
        $kyc = BankUser::whereNotNull('id_document')
            ->whereNotNull('proof_address')
            ->where('kyc_status', 0) // Assuming 0 means 'pending'
            ->select('id', 'first_name', 'last_name', 'email', 'id_document', 'proof_address', 'kyc_status') // Select specific columns
            ->get();


        return view('admin.banking.manage_kyc', compact('kyc'));
    }

    public function approveKyc($id)
    {
        $user = BankUser::findOrFail($id);
        $user->kyc_status = 1; // Assuming 1 means 'approved'
        $user->save();

        return redirect()->route('bank.admin.kyc.index')->with('status', 'KYC approved successfully!');
    }

    public function rejectKyc($id)
    {
        $user = BankUser::findOrFail($id);
        $user->kyc_status = 2; // Assuming 2 means 'rejected'
        $user->save();

        return redirect()->route('bank.admin.kyc.index')->with('status', 'KYC rejected successfully!');
    }


    public function credit(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'user_id' => 'required|integer', // Ensure user_id exists in the BankUser table
            'amount' => 'required|numeric',
            'type' => 'required|string',
            'description' => 'nullable|string',
            't_type' => 'required|string|in:yes,no', // Restrict to 'yes' or 'no' for t_type
            'name' => 'required|string',
            'email' => 'required|email',
            'balance' => 'required|numeric',
            'a_number' => 'nullable|string',
            'currency' => 'nullable|string'
        ]);

        // Generate unique transaction ID and reference
        $transactionId = strtoupper(uniqid('TXN_'));
        $transactionRef = strtoupper(uniqid('REF_'));

        // Create the transaction record
        $transaction = BankTransaction::create([
            'user_id' => $validatedData['user_id'],
            'transaction_id' => $transactionId,
            'transaction_ref' => $transactionRef,
            'transaction_type' => 'Credit', // From "Transfer Scope" dropdown
            'transaction' => 'credit', // Since this is a credit transaction
            'transaction_amount' => $validatedData['amount'] ?? null, // Amount to be credited
            'transaction_description' => $validatedData['description'] ?? null, // Optional description
            'transaction_status' => '1', // Default status can be 'pending', adjust as needed
            'wallet_address' => null, // If wallet transfers are applicable, you can fill this
            'wallet_type' => null, // Can be filled if relevant to your setup
            'account_name' => null, // If related to bank transfers
            'account_number' => null, // If related to bank transfers
            'account_type' => null, // If related to bank transfers
            'bank_name' => null, // If related to bank transfers
            'routing_number' => null // If related to bank transfers
        ]);

        // Prepare data for email notification or other purposes
        $user = [
            'account_number' => $validatedData['a_number'] ?? null,
            'account_name' => $validatedData['name'],
            'full_name' => $validatedData['name'],
            'description' => $validatedData['description'] ?? 'No description provided',
            'amount' => $validatedData['amount'],
            'date' => now(),
            'balance' => $validatedData['balance'] + $validatedData['amount'],
            'currency' => $validatedData['currency'] ?? 'USD', // Default to USD if not provided
            'ref' => $transactionRef,
        ];

        // Optional: Send email notification if requested
        if ($validatedData['t_type'] === 'yes') {
            $user = BankUser::findOrFail($validatedData['user_id']);
            // Uncomment the following line if you have a mailable set up
            Mail::to($validatedData['email'])->send(new CreditEmail($user));
        }

        // Redirect or return response after successful credit
        return redirect()->back()->with('message', 'Transaction created successfully and credit applied.');
    }


    public function debit(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'user_id' => 'required|integer', // Ensure user_id exists in the BankUser table
            'amount' => 'required|numeric',
            'type' => 'required|string',
            'description' => 'nullable|string',
            't_type' => 'required|string|in:yes,no', // Restrict to 'yes' or 'no' for t_type
            'name' => 'required|string',
            'email' => 'required|email',
            'balance' => 'required|numeric',
            'a_number' => 'nullable|string',
            'currency' => 'nullable|string'
        ]);

        // Generate unique transaction ID and reference
        $transactionId = strtoupper(uniqid('TXN_'));
        $transactionRef = strtoupper(uniqid('REF_'));

        // Create the transaction record
        $transaction = BankTransaction::create([
            'user_id' => $validatedData['user_id'],
            'transaction_id' => $transactionId,
            'transaction_ref' => $transactionRef,
            'transaction_type' => 'Debit', // From "Transfer Scope" dropdown
            'transaction' => 'debit', // Since this is a credit transaction
            'transaction_amount' => $validatedData['amount'] ?? null, // Amount to be credited
            'transaction_description' => $validatedData['description'] ?? null, // Optional description
            'transaction_status' => '1', // Default status can be 'pending', adjust as needed
            'wallet_address' => null, // If wallet transfers are applicable, you can fill this
            'wallet_type' => null, // Can be filled if relevant to your setup
            'account_name' => null, // If related to bank transfers
            'account_number' => null, // If related to bank transfers
            'account_type' => null, // If related to bank transfers
            'bank_name' => null, // If related to bank transfers
            'routing_number' => null // If related to bank transfers
        ]);

        // Prepare data for email notification or other purposes
        $user = [
            'account_number' => $validatedData['a_number'] ?? null,
            'account_name' => $validatedData['name'],
            'full_name' => $validatedData['name'],
            'description' => $validatedData['description'] ?? 'No description provided',
            'amount' => $validatedData['amount'],
            'date' => now(),
            'balance' => $validatedData['balance'] + $validatedData['amount'],
            'currency' => $validatedData['currency'] ?? 'USD', // Default to USD if not provided
            'ref' => $transactionRef,
        ];

        // Optional: Send email notification if requested
        if ($validatedData['t_type'] === 'yes') {
            $user = BankUser::findOrFail($validatedData['user_id']);
            // Uncomment the following line if you have a mailable set up
            Mail::to($validatedData['email'])->send(new DebitEmail($user));
        }

        // Redirect or return response after successful credit
        return redirect()->back()->with('message', 'Transaction created successfully and debit applied.');
    }

    // Method to delete a transaction
    public function deleteTransaction($id)
    {
        // Fetch the transaction by ID
        $transaction = BankTransaction::findOrFail($id);

        // Delete the transaction
        $transaction->delete();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Transaction deleted successfully.');
    }

    // Method to approve a transaction
    public function approveTransaction($id)
    {
        // Fetch the transaction by ID
        $transaction = BankTransaction::findOrFail($id);

        // Check if the transaction is already approved
        if ($transaction->transaction_status == 1) {
            return redirect()->back()->with('info', 'Transaction is already approved.');
        }

        // Approve the transaction by setting the status to 1 (Processed)
        $transaction->transaction_status = 1;
        $transaction->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Transaction approved successfully.');
    }

    public function vatCode(Request $request)
    {
        $users = array();
        $users['first_code'] = $request->input('vat_code');;
        $update = DB::table('users')->update($users);
        return back()->with('message', 'VAT Code updated, successfully');
    }

    public function accountActivation(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required|',
            'type' => 'required|in:Active,Inactive,Pending,Processing',
        ]);

        // Find the user by ID
        $user = BankUser::findOrFail($request->user_id);

        // Update the account activation status
        $user->activation_status = $request->type;
        $user->save();

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Account activation status updated successfully.');
    }

    public function walletAddress(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required|',
            'crypto_address' => 'required|',
        ]);

        // Find the user by ID
        $user = BankUser::findOrFail($request->user_id);

        // Update the account activation status
        $user->crypto_address = $request->crypto_address;
        $user->save();

        // Redirect back with a success message
        return redirect()->back()->with('message', 'wallet address  updated successfully.');
    }


    public function sendUserEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $email = $request->email;
        $subject = $request->subject;
        $messageBody = $request->message;

        Mail::to($email)->send(new BankUserEmail($subject, $messageBody));

        return back()->with('message', 'Email sent successfully!');
    }
}
