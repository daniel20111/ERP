<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductOutput\StoreProductOutputRequest;
use App\Http\Requests\ProductOutput\UpdateProductOutputRequest;
use App\Models\ProductOutput;

class ProductOutputController extends Controller
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
     * @param  \App\Http\Requests\StoreProductOutputRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductOutputRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductOutput  $productOutput
     * @return \Illuminate\Http\Response
     */
    public function show(ProductOutput $productOutput)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductOutput  $productOutput
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductOutput $productOutput)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductOutputRequest  $request
     * @param  \App\Models\ProductOutput  $productOutput
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductOutputRequest $request, ProductOutput $productOutput)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductOutput  $productOutput
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductOutput $productOutput)
    {
        //
    }
}
