<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\TransferOrder\StoreTransferOrderRequest;
use App\Http\Requests\TransferOrder\UpdateTransferOrderRequest;
use App\Models\TransferOrder;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransferOrder\TransferOrderCollection;
use App\Http\Resources\TransferOrder\TransferOrderResource;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Throwable;

use function PHPUnit\Framework\throwException;

class TransferOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TransferOrderCollection(TransferOrder::with('transfer', 'transfer.branch', 'transfer.user', 'transfer.user.employee', 'transfer.user.role')->get());
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
     * @param  \App\Http\Requests\StoreTransferOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransferOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransferOrder  $transferOrder
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new TransferOrderResource(TransferOrder::with('transfer', 'transfer.branch', 'transfer.user', 'transfer.user.employee', 'transfer.user.role', 'transfer.product_transfers', 'transfer.product_transfers.product', 'sent_by')->findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransferOrder  $transferOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(TransferOrder $transferOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransferOrderRequest  $request
     * @param  \App\Models\TransferOrder  $transferOrder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransferOrderRequest $request, TransferOrder $transferOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransferOrder  $transferOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransferOrder $transferOrder)
    {
        //
    }

    public function register_transfer(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $transfer_order = TransferOrder::findOrFail($id);

            if ($transfer_order->sent_by == null)
            {
                throw new Exception('Registro ya modificado');
            }
            $transfer_order->sent = true;
            $transfer_order->send_date = now();
            $transfer_order->sent_by()->associate($request->user());
            $transfer_order->save();
            DB::commit();
            return response()->json(['message' => ''], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['error' => $th], 500);
        }
    }

    public function register_reception(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $transfer_order = TransferOrder::findOrFail($id);

            if ($transfer_order->sent_by == null)
            {
                throw new Exception('Registro ya modificado');
            }
            $transfer_order->received = true;
            $transfer_order->received_date = now();
            $transfer_order->received_by()->associate($request->user());
            $transfer_order->save();
            DB::commit();
            return response()->json(['message' => ''], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['error' => $th], 500);
        }
    }

}
