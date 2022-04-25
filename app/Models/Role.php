<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_role',
        'description_role'
    ];

    public function accesses(){
        return $this->belongsToMany(Access::class);
    }
    
    public function modules()
    {
        return $this->belongsToMany(Module::class)->withTimestamps();
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
