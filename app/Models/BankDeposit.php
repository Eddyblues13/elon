<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDeposit extends Model
{
    use HasFactory;

    protected $connection = 'bank'; // BANK database
    protected $table = 'deposits';

    public function user()
    {
        return $this->belongsTo(BankUser::class, 'user_id');
    }
}
