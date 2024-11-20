<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appliance extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'sku',
        'category_id',
        'stock',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(ApplianceCategory::class);
    }
}
