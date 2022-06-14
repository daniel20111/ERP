<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entry extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'quantity_entry',
        'remain_entry',
        'product_id',
        'section_id',
        'entry_order_products_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function entry_order_products()
    {
        return $this->belongsTo(EntryOrderProduct::class);
    }
}
