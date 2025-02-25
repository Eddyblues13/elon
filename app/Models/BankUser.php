<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankUser extends Model
{
    protected $connection = 'bank'; // BANK database

    protected $table = 'users';


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'user_type',
        'phone_number',
        'country',
        'account_type',
        'a_number',       // Account number
        'currency',
        'address',
        'token',
        'is_activated',
        'display_picture',
        'user_status',
        'first_code',
        'second_code',
        'ssn',            // Social Security Number (or similar)
        'kyc_status',
        'id_document',
        'proof_address',
        'eligible_loan',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_activated' => 'boolean',
        'user_status' => 'boolean',
    ];


    public function deposits()
    {
        return $this->hasMany(BankDeposit::class, 'user_id');
    }
}
