<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use NumberFormatter;

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
        $branchId = Auth::user()->employee->branch_id;
        $branchType = Branch::findOrFail($branchId, ['type_branch'])['type_branch'];
        return $branchType;
    }
    
    public function getAddressAttribute()
    {
        $branchId = Auth::user()->employee->branch_id;
        $branchAddress = Branch::findOrFail($branchId, ['address_branch'])['address_branch'];
        return $branchAddress;
    }

    public function getNitCompanyAttribute()
    {
        return '132408658769';
    }

    public function getNumberInvoiceAttribute()
    {
        return $this->id * 1000;
    }

    public function getAuthCodeAttribute()
    {
        return '29040011007';
    }

    public function getDateAttribute()
    {
        $date = Carbon::today();
        return $date;
    }

    public function getQuoteAttribute()
    {
        return 'quote';
    }

    public function getCityAttribute()
    {
        $literal = new NumberFormatter('es', NumberFormatter::SPELLOUT);
        return $literal->format('1033258.55');
        //return 'La Paz - Bolivia';
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
