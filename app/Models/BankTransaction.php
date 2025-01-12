<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankTransaction extends Model
{
    protected $connection = 'bank'; // BANK database
    protected $table = 'transactions';


    // Specify the fillable attributes for mass assignment
    protected $fillable = [
        'user_id',
        'transaction_id',
        'transaction_ref',
        'transaction_type',
        'transaction',
        'wallet_address',
        'wallet_type',
        'transaction_amount',
        'transaction_description',
        'transaction_status',
        'account_name',
        'account_number',
        'account_type',
        'bank_name',
        'routing_number',
    ];
}
