<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntryOrderProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'entry_order_id',
        'product_id',
        'quantity',
    ];

    protected $attributes = [
        'verified' => false,
        'error' => false,
    ];

    public function entry_order() {
        return $this->belongsTo(EntryOrder::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function entries() {
        return $this->hasMany(Entry::class);
    }
}
