<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Models\BInventory;
use App\Models\Employee;
use App\Models\Entry;
use App\Models\Price;
use App\Models\Product;
use App\Models\ProductTransfer;
use App\Models\Sale;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //return $branchId = Auth::user()->employee->branch_id;
        // $monthTransfers = ProductTransfer::whereHas('transfer', function ($q) {
        //     $q->whereMonth('date', '=', 8);
        // })->where('product_id', '=', 1)->sum('quantity');
        // return $monthTransfers;

        if ($request->has(['search'])) 
        {
            if ($request->filled('search'))
            {
                return new ProductCollection(Product::where('model_product', 'ILIKE', '%'.$request->search.'%')->get(['id', 'model_product', 'format_product']));
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
                if ($request->only == 'mostSale') {
                    return new ProductCollection(Product::get(['id', 'model_product', 'format_product', 'url_image_product'])->sortByDesc('sold_units')->take(5));
                }
            }
            return [];
        }
        return new ProductCollection(Product::all());
        //$product = Product::where('id', '=', 1)->with('prices')->get();
        //return $product[0]->prices[0]->price;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $validatedProduct = $request->validated();
        DB::beginTransaction();
        try {
            $product = new Product;
            $productDecoded = json_decode($validatedProduct['product']);

            $product->model_product = $productDecoded->model_product;
            $product->format_product = $productDecoded->format_product;

            $image = $validatedProduct['image_product'];
            $path = $image->store('public');
            $url = Storage::url($path);

            $product->url_image_product = $url;
            
            //$product->url_image_product = $path;
            //$product->model_product = $validatedProduct['product']['model_product'];
            //$product->format_product = $validatedProduct['product']['format_product'];
            //$product->price = $validatedProduct['product']['price_product'];
        //DB::commit();
            return response()->json(['message' => 'Product Agregado'], 200);
        } catch (\Throwable $th) {
        DB::rollback();
            return response()->json(['error' => $th], 500);
        }
        // if ($request->hasFile('image_product'))
        // {
        //     $file = $request->file('image_product');
        //     if($file)
        //     {
        //         $path = $file->store('public');
        //         $url = Storage::url($path);

        //         return $url;
                
        //     }
        //     return 'null';
        // }


        // $validatedRequest = $request->validated();

        // DB::beginTransaction();

        // try {
        //     foreach ($validatedRequest['products'] as $product) {
        //         Product::create($product);
        //     }
        //     Db::commit();
        // } catch (\Throwable $th) {
        //     DB::rollBack();
        // }

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
