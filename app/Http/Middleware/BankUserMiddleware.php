<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class BankUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated as a bank user
        if (!Auth::guard('bank_user')->check()) {
            // Redirect to the bank user login page if not authenticated
            return redirect('/bank_user/login')->with('error', 'You must be logged in as a bank user to access this page.');
        }

        // Proceed to the next request if the user is authenticated
        return $next($request);
    }
}
