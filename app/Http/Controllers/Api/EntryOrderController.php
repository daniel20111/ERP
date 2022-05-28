<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntryOrder\StoreEntryOrderRequest;
use App\Http\Requests\EntryOrder\UpdateEntryOrderRequest;
use App\Http\Resources\EntryOrder\EntryOrderResource;
use App\Http\Resources\EntryOrder\EntryOrderCollection;
use App\Models\EntryOrder;
use App\Models\EntryOrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntryOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has(['with'])) {
            if ($request->filled('with')) {
                if ($request->with == 'products') {
                    return (new EntryOrderCollection(EntryOrder::with('entry_order_products')->get()));
                }
                # code...
            }
        }
        return (new EntryOrderCollection(EntryOrder::all()));
        // foreach ($entryOrder->products as $product) {
        //     dump($product->pivot);
        // }
        //return EntryOrderProduct::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEntryOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEntryOrderRequest $request)
    {
        $validateRequest = $request->validated();

        DB::beginTransaction();
        try 
        {
            $created_entry_order = EntryOrder::create($validateRequest);
            foreach ($validateRequest['entry_order_product'] as $entry_order_product) {
                $created_entry_order_product = new EntryOrderProduct($entry_order_product);
                $created_entry_order_product->entry_order()->associate($created_entry_order);
                $created_entry_order_product->save();
            }
            DB::commit();
            return response()->json(['message' => ''], 200);
        } 
        catch (\Throwable $th) 
        {
            DB::rollback();
            return response()->json(['error' => $th], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EntryOrder  $entryOrder
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$entryOrder = EntryOrder::findOrFail($id);
        //return $entryOrder;
        return new EntryOrderResource(EntryOrder::with('entry_order_products')->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEntryOrderRequest  $request
     * @param  \App\Models\EntryOrder  $entryOrder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEntryOrderRequest $request, EntryOrder $entryOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EntryOrder  $entryOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(EntryOrder $entryOrder)
    {
        //
    }
}
