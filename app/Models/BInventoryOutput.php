<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BInventoryOutput extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_sales_id',
        'b_inventories_id',
        'quantity',
    ];
}
