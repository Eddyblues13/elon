<?php

namespace App\Models\Bank;

use App\Models\BankUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BankCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'card_number',
        'card_cvc',
        'card_expiry',
        'amount',
    ];


    public function user()
    {
        return $this->belongsTo(BankUser::class, 'user_id');
    }
}
