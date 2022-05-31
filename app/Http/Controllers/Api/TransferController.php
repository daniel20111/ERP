<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Transfer\StoreTransferRequest;
use App\Http\Requests\Transfer\UpdateTransferRequest;
use App\Models\Transfer;
use App\Http\Controllers\Controller;
use App\Http\Resources\Transfer\TransferCollection;
use App\Http\Resources\Transfer\TransferResource;
use App\Http\Resources\User\UserCollection;
use App\Models\ProductTransfer;
use App\Models\TransferOrder;
use Illuminate\Support\Facades\DB;


class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TransferCollection(Transfer::with('user.employee', 'user.role', 'branch')->orderByDesc('created_at')->get());
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
     * @param  \App\Http\Requests\StoreTransferRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransferRequest $request)
    {
        $validatedRequest = $request->validated();

        DB::beginTransaction();
        try {
            $created_transfer = Transfer::create($validatedRequest);
            foreach ($validatedRequest['product_transfers'] as $product_transfer) {
                $created_product_transfer = new ProductTransfer($product_transfer);
                $created_product_transfer->transfer()->associate($created_transfer);
                $created_product_transfer->save();
            }
            DB::commit();
            return response()->json(['message' => ''], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['error' => $th], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new TransferResource(Transfer::with('user', 'user.employee', 'user.role', 'branch', 'product_transfers.product', 'product_transfers')->findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function edit(Transfer $transfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransferRequest  $request
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransferRequest $request, Transfer $transfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transfer $transfer)
    {
        //
    }

    public function generate_transfer_order($id)
    {
        DB::beginTransaction();
        try {
            $transfer = Transfer::findOrFail($id);
            $transfer->verified = true;
            $transfer->save();

            $transfer_order = new TransferOrder;
            $transfer_order->transfer()->associate($transfer);
            $transfer_order->save();

            DB::commit();
            return response()->json(['message' => ''], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['error' => $th], 500);
        }
    }
}
