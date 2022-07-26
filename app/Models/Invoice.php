<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'type_branch',
        'address',
        'city',
        'nit_company',
        'number_invoice',
        'auth_code',
        'date',
        'nit_client',
        'client',
        'total',
        'fc_base',
        'literal',
        'quote',
        'sale_id',
    ];

    protected $attributes = [];

    protected $appends = [
        'company_name', 
        'type_branch', 
        'address', 
        'city', 
        'nit_company',
        'number_invoice',
        'auth_code',
        'date',
        'quote'
    ];

    public function getCompanyNameAttribute()
    {
        return 'Nombre de la compañia';
    }

    public function getTypeBranchAttribute()
    {
        return '';
    }
    
    public function getAddressAttribute()
    {
        return '';
    }

    public function getNitCompanyAttribute()
    {
        return '';
    }

    public function getNumberInvoiceAttribute()
    {

    }

    public function getAuthCodeAttribute()
    {

    }

    public function getDateAttribute()
    {

    }

    public function getQuoteAttribute()
    {
        
    }

    public function getCityAttribute()
    {
        return 'La Paz - Bolivia';
    }
}
