<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BInventory\StoreBInventoryRequest;
use App\Http\Requests\BInventory\UpdateBInventoryRequest;
use App\Models\BInventory;
use App\Models\ProductTransfer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $request;
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
     * @param  \App\Http\Requests\StoreBInventoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBInventoryRequest $request)
    {
        $validatedRequest = $request->validated();
        // $productTransfer = ProductTransfer::findOrFail($validatedRequest['b_inventories'][0]['product_transfer_id']);
        // if ($productTransfer->allocated == true)
        // {
        //     throw new Exception('Ya se verifico esta solicitud de transferencia');
        // }
        // $allocatedQuantity = 0;
        // foreach($validatedRequest['b_inventories'] as $bInventory)
        // {
        //     $allocatedQuantity = $allocatedQuantity + $bInventory['quantity'];
        //     //BInventory::create($bInventory);
        // }
        // dump($allocatedQuantity);
        // if ($allocatedQuantity == $productTransfer->quantity)
        // {
        //     return 'son iguales';
        // } else {
        //     throw new Exception('Las cantidades no corresponden');
        // }

        DB::beginTransaction();
        try 
        {
            $productTransfer = ProductTransfer::findOrFail($validatedRequest['b_inventories'][0]['product_transfer_id']);
            if ($productTransfer->allocated == true)
            {
                throw new Exception('Ya se verifico esta solicitud de transferencia');
            }
            $allocatedQuantity = 0;
            foreach($validatedRequest['b_inventories'] as $bInventory)
            {
                $allocatedQuantity = $allocatedQuantity + $bInventory['quantity'];
                //BInventory::create($bInventory);
            }

            if ($allocatedQuantity == $productTransfer->quantity)
            {
                foreach($validatedRequest['b_inventories'] as $bInventory)
                {
                    BInventory::create($bInventory);
                }
                $productTransfer->allocated = true;
                $productTransfer->save();
            } else {
                throw new Exception('Las cantidades no corresponden');
            }
            DB::commit();
            return response()->json(['message' => ''], 200);
        } catch (Exception $th) 
        {
            DB::rollback();
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BInventory  $bInventory
     * @return \Illuminate\Http\Response
     */
    public function show(BInventory $bInventory)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BInventory  $bInventory
     * @return \Illuminate\Http\Response
     */
    public function edit(BInventory $bInventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBInventoryRequest  $request
     * @param  \App\Models\BInventory  $bInventory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBInventoryRequest $request, BInventory $bInventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BInventory  $bInventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BInventory $bInventory)
    {
        //
    }
}
