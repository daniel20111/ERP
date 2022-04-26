<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_warehouse',
        'branch_id'
    ];

    public function branch() {
        return $this->belongsTo(Branch::class);
    }

    public function sections() {
        return $this->hasMany(Section::class);
    }
}
