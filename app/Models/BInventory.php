<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BInventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'remain_units',
        'product_id',
        'section_id',
        'user_id',
        'product_transfer_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productTransfer()
    {
        return $this->belongsTo(ProductTransfer::class);
    }
}
