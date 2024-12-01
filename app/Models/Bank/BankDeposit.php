<?php

namespace App\Models\Bank;

use App\Models\BankUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BankDeposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',  // Add this line
        'front_cheque',
        'back_cheque',
        'deposit_type',
        'status',
        // Add any other fields that should be mass assignable
    ];

    public function user()
    {
        return $this->belongsTo(BankUser::class, 'user_id');
    }
}
