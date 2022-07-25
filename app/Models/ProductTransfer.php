<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductTransfer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'quantity',
    ];

    protected $attributes = [
        'allocated' => false,
    ];

    public function transfer()
    {
        return $this->belongsTo(Transfer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
