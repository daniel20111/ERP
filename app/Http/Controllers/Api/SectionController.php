<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Section\StoreSectionRequest;
use App\Http\Resources\Section\SectionCollection;
use App\Http\Resources\Section\SectionResource;
use App\Models\Section;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('warehouse'))
        {
            if ($request->filled('warehouse'))
            {
                return new SectionCollection(Section::where('warehouse_id', '=', $request->warehouse)->get());
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSectionRequest $request)
    {
        $validatedRequest = $request->validated();
        DB::beginTransaction();

        try 
        {
            foreach ($validatedRequest['warehouses'] as $warehouse) {
                $requestWarehouse = Warehouse::findOrFail($warehouse['id']);
                
                if (!empty($warehouse['sections'])) {
                    $requestWarehouse->sections()->createMany($warehouse['sections']);
                }
            }
            DB::commit();
        } 
        catch (\Throwable $th) 
        {
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
        return new SectionResource(Section::findOrFail($id));
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
