<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductQuotation\StoreProductQuotationRequest;
use App\Http\Requests\ProductQuotation\UpdateProductQuotationRequest;
use App\Models\ProductQuotation;

class ProductQuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreProductQuotationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductQuotationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductQuotation  $productQuotation
     * @return \Illuminate\Http\Response
     */
    public function show(ProductQuotation $productQuotation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductQuotation  $productQuotation
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductQuotation $productQuotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductQuotationRequest  $request
     * @param  \App\Models\ProductQuotation  $productQuotation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductQuotationRequest $request, ProductQuotation $productQuotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductQuotation  $productQuotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductQuotation $productQuotation)
    {
        //
    }
}
