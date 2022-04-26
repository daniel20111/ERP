<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_product',
        'image_product',
        'length_product',
        'height_product',
        'weight_product',
        'units_box_product',
        'brand_product',
        'origin_product',
    ];
}
