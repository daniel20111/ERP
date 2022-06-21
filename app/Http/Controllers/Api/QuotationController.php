<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quotation\StoreQuotationRequest;
use App\Http\Requests\Quotation\UpdateQuotationRequest;
use App\Http\Resources\Quotation\QuotationCollection;
use App\Http\Resources\Quotation\QuotationResource;
use App\Models\Quotation;
use Carbon\Carbon;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return new QuotationCollection(Quotation::with('productQuotation')->whereDate('date_quotation', Carbon::today())->get());
        //return new QuotationCollection(Quotation::with('productQuotation')->whereBetween('date_quotation', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get());
        //dump(Carbon::now()->month);
        //return new QuotationCollection(Quotation::with('productQuotation')->whereMonth('date_quotation', Carbon::now()->month)->get());
        //return new QuotationCollection(Quotation::whereMonth('date_quotation', Carbon::now()->month)->get());
        return new QuotationCollection(Quotation::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuotationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuotationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new QuotationResource(Quotation::with('productQuotation', 'productQuotation.product:id,model_product,format_product')->findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotation $quotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuotationRequest  $request
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuotationRequest $request, Quotation $quotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotation $quotation)
    {
        //
    }
}
