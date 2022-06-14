<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Transfer\StoreTransferRequest;
use App\Http\Requests\Transfer\UpdateTransferRequest;
use App\Models\Transfer;
use App\Http\Controllers\Controller;
use App\Http\Resources\Transfer\TransferCollection;
use App\Http\Resources\Transfer\TransferResource;
use App\Http\Resources\User\UserCollection;
use App\Models\Egress;
use App\Models\ProductTransfer;
use App\Models\TransferOrder;
use App\Models\Entry;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Exception;

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

            if ($transfer->verified == true)
            {
                throw new Exception('Ya se verifico esta solicitud de transferencia');
            }

            foreach($transfer->product_transfers as $product_transfer)
            {
                $remain = Entry::where('product_id', '=', $product_transfer->product_id)->sum('quantity_entry');
                
                if ($remain < $product_transfer->quantity)
                {
                    $missing_units = $product_transfer->quantity - $remain;
                    $product = Product::findOrFail($product_transfer->product_id);
                    throw new Exception('No se puede completar la solicitud. Faltan '.$missing_units.' unidades del producto '. $product->model_product);
                }
                
                
                $entries = Entry::where('product_id', '=', $product_transfer->product_id)->where('remain_entry', '>', 0)->orderBy('created_at')->get();
                
                $assigned = $product_transfer->quantity;
                foreach ($entries as $entry)
                {
                    if ($assigned <= $entry->remain_entry)
                    {
                        $egress = new Egress;
                        $egress->quantity_egress = $assigned;
                        $egress->product_id = $product_transfer->product_id;
                        $egress->entry_id = $entry->id;
                        $egress->product_transfer_id = $product_transfer->id;
                        $egress->save();

                        $entry->remain_entry = $entry->remain_entry - $assigned;
                        $entry->save();
                        break;
                    }
                    if ($assigned > $entry->remain_entry)
                    {
                        $assigned = $assigned - $entry->remain_entry;

                        $egress = new Egress;
                        $egress->quantity_egress = $entry->remain_entry;
                        $egress->product_id = $product_transfer->product_id;
                        $egress->entry_id = $entry->id;
                        $egress->product_transfer_id = $product_transfer->id;
                        $egress->save();

                        $entry->remain_entry = 0;
                        $entry->save();
                    }
                }
            }

            $transfer->verified = true;
            $transfer->save();

            $transfer_order = new TransferOrder;
            $transfer_order->transfer()->associate($transfer);
            $transfer_order->save();

            DB::commit();
            return response()->json(['message' => ''], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
