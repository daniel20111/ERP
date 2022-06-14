<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has(['search'])) 
        {
            if ($request->filled('search'))
            {
                return new ProductCollection(Product::where('model_product', 'ILIKE', '%'.$request->search.'%')->get());
            }
            return [];
        }
        if ($request->has(['only'])) 
        {
            if ($request->filled('only'))
            {
                if ($request->only == 'model') {
                    return new ProductCollection(Product::get(['id', 'model_product']));
                }
                if ($request->only == 'basicInfo') {
                    return new ProductCollection(Product::get(['id', 'model_product', 'format_product', 'url_image_product']));
                }
            }
            return [];
        }
        return new ProductCollection(Product::paginate(10));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $validatedRequest = $request->validated();

        DB::beginTransaction();

        try {
            foreach ($validatedRequest['products'] as $product) {
                Product::create($product);
            }
            Db::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if ($request->has(['only'])) 
        {
            if ($request->filled('only'))
            {
                if ($request->only == 'model') {
                    return new ProductResource(Product::findOrFail($id, ['id', 'model_product']));
                }
                if ($request->only == 'basicInfo') {
                    return new ProductResource(Product::findOrFail($id, ['id', 'model_product', 'format_product', 'url_image_product']));
                }
            }
            return [];
        }
        return new ProductResource(Product::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
