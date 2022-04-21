<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_name'
    ];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
}
