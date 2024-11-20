<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;
    protected $table = 'houses';
    protected $fillable = [
        'slug',
        'state',
        'category_id',
        'address',
        'description',
        'square',
        'bath',
        'bed',
        'original_price',
        'selling_price',
        'rating',
        'trending',
        'status'

    ];

    public function category()
    {
        return $this->belongsTo(HouseCategory::class, 'country_id', 'id');
    }
    public function houseImages()
    {
        return $this->hasMany(HouseImage::class, 'house_id', 'id');
    }
}
