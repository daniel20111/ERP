<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Entry\StoreEntryRequest;
use App\Http\Requests\Entry\UpdateEntryRequest;
use App\Http\Resources\Entry\EntryCollection;
use App\Http\Resources\Product\ProductCollection;
use App\Models\Entry;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if ($request->has(['with'])) {
        //     if ($request->filled('with')) {
        //         if($request->query('with') == 'product')
        //         {
        //             return new EntryCollection(Entry::with('product')->get());                    
        //         }
        //     }
        // }
        // return new EntryCollection(Entry::all());

        if ($request->has(['product'])) {
            if ($request->filled('product')) {
                if (filter_var($request->query('product'), FILTER_VALIDATE_INT) == true) {
                    $product_id = intval($request->query('product'));
                    return new EntryCollection(Entry::where('product_id', '=', $product_id)->with(['section', 'section.warehouse', 'entry_order_products', 'entry_order_products.entry_order'])->orderBy('created_at')->get());
                }
            }
        }

        return Entry::groupBy('product_id')->selectRaw('sum(remain_entry) as quantity, product_id')->get();
    }

    public function warehouseProduct($id)
    {
        //$products = Warehouse::with('sections', 'sections.entries')->where('id', '=', 1)->get();
        
        $products = Product::whereHas('entries.section', 
                        function($q) use ($id) {
                            $q->where('warehouse_id', '=', $id);
                        })->get(['id', 'model_product', 'format_product', 'url_image_product']);
        
        return new ProductCollection($products);
    }

    public function branchProduct($id)
    {
        $products = Product::whereHas('entries.section.warehouse', 
                        function($q) use ($id) {
                            $q->where('branch_id', '=', $id);
                        })->get(['id', 'model_product', 'format_product', 'url_image_product']);


        
        $i = 0;
        foreach ($products as $product)
        {
            $remainUnitsInBranch = Entry::whereHas('section.warehouse', 
                function ($q) use ($id)
                {
                    $q->where('branch_id', '=', $id);
                }
            )->where('product_id', '=', $product->id)->sum('remain_entry');

            $products[$i]->remain_units = $remainUnitsInBranch;


            $i = $i +1;
        }

        $productCollection = new ProductCollection($products);

        return $productCollection;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEntryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEntryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function show(Entry $entry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEntryRequest  $request
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEntryRequest $request, Entry $entry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entry $entry)
    {
        //
    }
}
