<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id',
        'seller_id',
        'branch_id',
        'date_request',
        'approved',
        'approved_by',
        'aprroved_date',
        'delivered',
        'delivered_by',
        'delivered_date',
    ];

    protected $attributes = [
        'approved' => false,
        'delivered' => false,
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
