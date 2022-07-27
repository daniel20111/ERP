<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_quotation',
        'price_quotation',
        'date_quotation',
        'expiration_date',
        'user_id',
        'branch_id',
    ];

    protected $casts = [
        'price_quotation' => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function productQuotation()
    {
        return $this->hasMany(ProductQuotation::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
