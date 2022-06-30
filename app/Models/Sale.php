<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'total_sale',
        'date_sale',
        'user_id',
        'branch_id',
        'quotation_id',
    ];

    protected $casts = [
        'total_sale' => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    public function productSale()
    {
        return $this->hasMany(ProductSale::class);
    }
}
