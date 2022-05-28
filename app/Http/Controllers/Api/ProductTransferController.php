<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductTransfer\StoreProductTransferRequest;
use App\Http\Requests\ProductTransfer\UpdateProductTransferRequest;

use App\Models\ProductTransfer;

class ProductTransferController extends Controller
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
     * @param  \App\Http\Requests\StoreProductTransferRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductTransferRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductTransfer  $productTransfer
     * @return \Illuminate\Http\Response
     */
    public function show(ProductTransfer $productTransfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductTransfer  $productTransfer
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductTransfer $productTransfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductTransferRequest  $request
     * @param  \App\Models\ProductTransfer  $productTransfer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductTransferRequest $request, ProductTransfer $productTransfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductTransfer  $productTransfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductTransfer $productTransfer)
    {
        //
    }
}
