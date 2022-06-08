<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_section',
        'warehouse_id',
    ];

    public function warehouse() {
        return $this->belongsTo(Warehouse::class);
    }

    public function entries() {
        return $this->hasMany(Entry::class);
    }
}
