<?php

namespace App\Http\Controllers\Auth;

use App\Models\BankUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BankUserRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        // Return the registration view
        return view('auth.bank_user_register');
    }

    public function register(Request $request)
    {
        $accountNumber = rand(1645566556, 5575755768);
        // Validate the request inputs
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:bank_users,email',
            'password' => 'required|min:8|confirmed',
            'phone_number' => 'required|string|max:15',
            'country' => 'required|string|max:100',
            'currency' => 'required|string|max:10',
        ]);

        // Create a new bank user instance
        $bankUser = BankUser::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'country' => $request->country,
            'account_type' => $request->account_type,
            'a_number' => $accountNumber,
            'currency' => $request->currency,
            'is_activated' => 1,  // Assuming the user is activated by default
            'user_status' => 1,   // Assuming user status is active
            'user_type' => 1,   // Assuming user type is active
            'password' => Hash::make($request->password),
        ]);

        // Log the user in after registration
        Auth::guard('bank_user')->user()->login($bankUser);

        // Redirect to the bank user's dashboard or home
        return redirect()->route('bank_user.dashboard');
    }
}
