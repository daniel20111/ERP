<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Branch\StoreBranchRequest;
use App\Http\Resources\Branch\BranchCollection;
use App\Http\Resources\Branch\BranchResource;
use App\Models\Branch;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new BranchCollection(Branch::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBranchRequest $request)
    {
        $validatedRequest = $request->validated();
        DB::beginTransaction();

        try 
        {
            foreach ($validatedRequest['branches'] as $branch) {
                $createdBranch = Branch::create($branch);
                if (!empty($branch['warehouses'])) {
                    foreach ($branch['warehouses'] as $warehouse) {
                        //Warehouse::create($warehouse)->associate();
                        $createdWarehouse = new Warehouse($warehouse);
                        //$createdBranch->warehouses()->create($createdWarehouse);
                        $createdWarehouse->branch()->associate($createdBranch);
                        $createdWarehouse->save();
                    }
                }
            }
            DB::commit();
        } 
        catch (\Throwable $th) 
        {
            DB::rollBack();
            return response()->json(['message' => 'Database error'], 220);
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
        return new BranchResource(Branch::findOrFail($id));
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
