<?php

namespace App\Models\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Withdrawal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'withdraw_from',
        'method',
        'status',
        'details',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
