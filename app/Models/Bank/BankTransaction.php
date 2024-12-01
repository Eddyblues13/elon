<?php

namespace App\Models\Bank;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BankUser; // Import the BankUser model

class BankTransaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'transaction_id',
        'transaction_ref',
        'transaction_type', // e.g., Credit or Debit
        'transaction',      // e.g., Deposit, Withdrawal, Transfer
        'wallet_address',
        'wallet_type',
        'transaction_amount',
        'transaction_description',
        'transaction_status', // e.g., Pending, Completed, Failed
        'account_name',
        'account_number',
        'account_type',
        'bank_name',
        'routing_number',
    ];

    /**
     * Define the relationship between BankTransaction and BankUser.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(BankUser::class, 'user_id');
    }
}
