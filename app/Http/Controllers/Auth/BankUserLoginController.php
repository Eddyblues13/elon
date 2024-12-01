<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BankUserLoginController extends Controller
{
    public function showLoginForm()
    {
        // Return the login view
        return view('auth.bank_user_login');
    }

    public function login(Request $request)
    {
        // Validate the request inputs
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        // Attempt to authenticate the bank user
        if (Auth::guard('bank_user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // If successful, redirect to the bank user dashboard or home
            return redirect()->intended(route('bank_user.dashboard'));
        }

        // If authentication fails, redirect back with an error message
        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        // Logout the bank user
        Auth::guard('bank_user')->logout();
        return redirect('/bank_user/login');
    }
}
