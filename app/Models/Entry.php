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
        'supplier_entry',
        'note_entry',
        'verified_entry',
        'error_entry',
        'product_id'
    ];

    protected $attributes = [
        'verified_entry' => false,
        'error_entry' => false,
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
