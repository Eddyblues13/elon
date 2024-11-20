<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplianceCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function appliances()
    {
        return $this->hasMany(Appliance::class);
    }
}
