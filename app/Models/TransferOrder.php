<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class TransferOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'sent',
        'received',
        'send_by',
        'received_by',
        'transfer_id',
        'send_date',
        'received_date'
    ];

    protected $attributes = [
        'sent' => false,
        'received' => false,
        'send_date' => null,
        'received_date' => null,
    ];

    public function transfer()
    {
        return $this->belongsTo(Transfer::class);
    }

    public function sent_by_user()
    {
        return $this->belongsTo(User::class, 'send_by', 'id');
    }

    public function received_by_user()
    {
        return $this->belongsTo(User::class, 'received_by', 'id');
    }

}
