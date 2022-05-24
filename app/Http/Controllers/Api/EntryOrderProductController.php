<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\EntryOrderProduct\StoreEntryOrderProductRequest;
use App\Http\Requests\EntryOrderProduct\UpdateEntryOrderProductRequest;
use App\Models\EntryOrderProduct;
use App\Http\Controllers\Controller;
use App\Http\Resources\EntryOrderProduct\EntryOrderProductCollection;
use App\Http\Resources\EntryOrderProduct\EntryOrderProductResource;
use Illuminate\Http\Request;

class EntryOrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has(['verified'])) {
            if ($request->filled('verified')) {
                if ($request->verified == 'true') {
                    $verified_product_entries = EntryOrderProduct::with('entry_order:id,code_entry_order,updated_at,verified_entry_order', 'product:id,model_product')->wherehas('entry_order', function ($query) {
                        $query->where('verified_entry_order', '=', 'true');
                    })->get();

                    return new EntryOrderProductCollection($verified_product_entries);
                }
                return [];
            }
        }
        return EntryOrderProduct::with('product:id,model_product', 'entry_order:id,code_entry_order')->get();
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
     * @param  \App\Http\Requests\StoreEntryOrderProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEntryOrderProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EntryOrderProduct  $entryOrderProduct
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return new EntryOrderProductResource(EntryOrderProduct::findOrFail($id)->with('product')->get());
        return new EntryOrderProductResource(EntryOrderProduct::with('product:id,model_product,format_product,url_image_product', 'entry_order:id,code_entry_order,created_at,updated_at')->findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EntryOrderProduct  $entryOrderProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(EntryOrderProduct $entryOrderProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEntryOrderProductRequest  $request
     * @param  \App\Models\EntryOrderProduct  $entryOrderProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEntryOrderProductRequest $request, EntryOrderProduct $entryOrderProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EntryOrderProduct  $entryOrderProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(EntryOrderProduct $entryOrderProduct)
    {
        //
    }
}
