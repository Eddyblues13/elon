<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'category_id',
        'price',
        'year',
        'model',
        'brand',
        'description',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(CarCategory::class);
    }
}
