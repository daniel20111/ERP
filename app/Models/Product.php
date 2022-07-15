<?php

namespace App\Models;

use GuzzleHttp\Handler\Proxy;
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

        'remain_units',
        'reorder_point',
        'price',
    ];

    //protected $attributes = ['remain_units'];

    protected $appends = ['remain_units', 'reorder_point', 'price', 'sold_units'];

    public function getSoldUnitsAttribute()
    {
        $soldUnits = ProductSale::where('product_id', '=', $this->id)->sum('quantity');
        return $soldUnits;
    }

    public function setSoldUnitsAttribute($soldUnits)
    {
        return $this->sold_units = $soldUnits;
    }

    public function getRemainUnitsAttribute($id = 0)
    {
        if ($id == 0) 
        {
            return ;
        }

        

        return ;
    }

    public function setRemainUnitsAttribute($value)
    {
        return floatval($this->remain_units = $value);
    }

    public function setPriceAttribute($price)
    {
        return $this->price = $price;
    }

    public function getPriceAttribute()
    {
        $price = Price::where('product_id', '=', $this->id)->get()->sortByDesc('created_at')->first();
        return floatval($price->price);
    }

    public function getReorderPointAttribute()
    {
        return 30;
    }

    public function setReorderAttribute($value)
    {
        return $this->reorder_point = $value;
    }

    protected $casts = [
        'area_box_product' => 'float',
        'area_pallet_product' => 'float',
        'weight_box_product' => 'float',
        'weight_pallet_product' => 'float',
        'remain_units' => 'int',
        'reorder_point' => 'int',
        'price' => 'float',
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
