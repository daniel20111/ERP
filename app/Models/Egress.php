<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egress extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity_egress',
        'product_id',
        'entry_id',
        'product_transfer_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function entry()
    {
        return $this->belongsTo(Entry::class);
    }

    public function product_transfer()
    {
        return $this->belongsTo(ProductTransfer::class);
    }
}
