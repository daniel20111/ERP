<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'model_product',
        'url_image_product',
        'format_product',

        'description_product',
        'code_product',
        'family_product',
        'finish_product',
        'brand_product',
        'origin_product',
        
        'unit_measure_product',
        'units_box_product',
        'area_box_product',
        'boxes_pallet_product',
        'area_pallet_product',
        'weight_box_product',
        'weight_pallet_product',
    ];

    protected $casts = [
        'area_box_product' => 'float',
        'area_pallet_product' => 'float',
        'weight_box_product' => 'float',
        'weight_pallet_product' => 'float',
    ];

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

    public function entry_order_products()
    {
        return $this->hasMany(EntryOrderProduct::class);
    }
    public function product_requests()
    {
        return $this->belongsToMany(ProductRequest::class)->withTimestamps();
    }

    public function product_sales()
    {
        return $this->hasMany(ProductSale::class);
    }

    public function product_quotations()
    {
        return $this->hasMany(ProductQuotation::class);
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}
