<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'names_employee',
        'last_name_employee',
        'CI_employee',
        'birth_date_employee',
        'branch_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function branch()
    {
        return $this->hasOne(Branch::class);
    }
}
