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

    // protected $attributes = [
    //     'company_name', 
    //     'type_branch', 
    //     'address', 
    //     'city', 
    //     'nit_company',
    //     'number_invoice',
    //     'auth_code',
    //     'date',
    //     'quote'
    // ];

    // protected $appends = [
    //     'company_name', 
    //     'type_branch', 
    //     'address', 
    //     'city', 
    //     'nit_company',
    //     'number_invoice',
    //     'auth_code',
    //     'date',
    //     'quote'
    // ];

    public function setCompanyNameAttribute()
    {
        return $this->attributes['company_name'] = 'Nombre de la Empresa';
    }

    public function setTypeBranchAttribute()
    {
        $branchId = Auth::user()->employee->branch_id;
        $branchType = Branch::findOrFail($branchId, ['type_branch'])['type_branch'];
        return $this->attributes['type_branch'] = $branchType;
    }
    
    public function setAddressAttribute()
    {
        $branchId = Auth::user()->employee->branch_id;
        $branchAddress = Branch::findOrFail($branchId, ['address_branch'])['address_branch'];
        return $this->attributes['address'] = $branchAddress;
    }

    public function setNitCompanyAttribute()
    {
        return $this->attributes['nit_company'] = '132408658769';
    }

    public function setNumberInvoiceAttribute()
    {
        return $this->attributes['number_invoice'] = $this->id * 1000;
    }

    public function setAuthCodeAttribute()
    {
        return $this->attributes['auth_code'] = '29040011007';
    }

    public function setDateAttribute()
    {
        $date = Carbon::today();
        return $this->attributes['date'] = $date;
    }

    public function setQuoteAttribute()
    {
        return $this->attributes['quote'] = 'quote';
    }

    public function setCityAttribute()
    {
        //$literal = new NumberFormatter('es', NumberFormatter::SPELLOUT);
        //return $literal->format('1033258.55');
        return $this->attributes['city'] = 'La Paz - Bolivia';
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
