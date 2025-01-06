<?php

namespace App\Http\Controllers\Admin;

use App\Models\BankUser;
use Illuminate\Http\Request;
use App\Models\Bank\BankDeposit;
use App\Http\Controllers\Controller;

class ManageBankController extends Controller
{
    public function manageBanking()
    {
        $data['users'] = BankUser::get();
        return view('admin.banking.home', $data);
    }

    public function showDepositRequests()
    {

        $data['deposit'] = BankUser::join('bank_deposits', 'bank_users.id', '=', 'bank_deposits.user_id')
            ->get(['bank_users.email', 'bank_users.first_name', 'bank_users.last_name', 'bank_deposits.*']);

        return view('admin.banking.manage_deposit', $data);
    }
    public function approveDeposit($id)
    {
        $user = BankDeposit::findOrFail($id);
        $user->status = 1; // Assuming 1 means 'approved'
        $user->save();

        return redirect()->route('admin.deposit.index')->with('status', 'Deposit approved successfully!');
    }

    public function rejectDeposit($id)
    {
        $user = BankDeposit::findOrFail($id);
        $user->status = 2; // Assuming 2 means 'rejected'
        $user->save();

        return redirect()->route('admin.deposit.index')->with('status', 'Deposit rejected successfully!');
    }

    public function manageTransactionsPage()
    {

        $data['transactions'] = BankUser::join('bank_transactions', 'bank_users.id', '=', 'bank_transactions.user_id')
            ->get(['bank_users.email', 'bank_users.first_name', 'bank_users.last_name', 'bank_transactions.*']);

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
}
