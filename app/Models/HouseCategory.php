<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function houses()
    {
        return $this->hasMany(House::class);
    }
}
