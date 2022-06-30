<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductSale\StoreProductSaleRequest;
use App\Http\Requests\ProductSale\UpdateProductSaleRequest;
use App\Models\ProductSale;
use Carbon\Carbon;

class ProductSaleController extends Controller
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
     * @param  \App\Http\Requests\StoreProductSaleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductSaleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductSale  $productSale
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSale $productSale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductSale  $productSale
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductSale $productSale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductSaleRequest  $request
     * @param  \App\Models\ProductSale  $productSale
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductSaleRequest $request, ProductSale $productSale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductSale  $productSale
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductSale $productSale)
    {
        //
    }

    public function stimateTime($id)
    {
        //$productSale = ProductSale::where('product_id', '=', $id)->get();
        for ($i = 1; $i <= Carbon::now()->month; $i++)
        {
            $productSale = ProductSale::where('product_id', '=', $id)->whereMonth('created_at', '=', $i)->sum('quantity');
            dump($productSale);
        }
        
        //dd(Carbon::now()->month(1));
        
    }
}
