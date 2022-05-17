<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\EntryOrderProduct;

class EntryOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code_entry_order'
    ];

    protected $attributes = [
        'verified_entry_order' => false,
        'error_entry_order' => false,
    ];

    public function entry_order_products()
    {
        return $this->hasMany(EntryOrderProduct::class);
    }

}
