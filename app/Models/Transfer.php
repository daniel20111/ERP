<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transfer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'branch_id',
        'user_id',
    ];

    protected $attributes = [
        'verified' => false,
    ];

    public function product_transfers()
    {
        return $this->hasMany(ProductTransfer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
