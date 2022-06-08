<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouse\StoreWarehouseRequest;
use App\Models\Branch;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarehouseController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWarehouseRequest $request)
    {
        $validatedRequest = $request->validated();
        DB::beginTransaction();

        try 
        {
            foreach ($validatedRequest['branches'] as $branch) {
                $requestedBranch = Branch::findOrFail($branch['id']);
                //dump($requestedBranch);
                if (!empty($branch['warehouses'])) {
                    /*foreach ($branch['warehouses'] as $warehouse) {
                        $createdWarehouse = new Warehouse($warehouse);
                        $createdWarehouse->branch()->associate($requestedBranch);
                        $createdWarehouse->save();
                    }*/
                    $requestedBranch->warehouses()->createMany($branch['warehouses']);
                }
            }
            DB::commit();
        } 
        catch (\Throwable $th) 
        {
            //throw $th;
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Warehouse::with('sections')->findOrFail($id);
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
