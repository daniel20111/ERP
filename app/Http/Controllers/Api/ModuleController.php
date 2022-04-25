<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreModuleRequest;
use App\Http\Requests\UpdateModuleRequest;
use App\Http\Resources\ModuleCollection;
use App\Http\Resources\ModuleResource;
use Illuminate\Http\Request;
use App\Models\Module;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return new ModuleCollection(Module::with('roles')->paginate(5));
        return new ModuleCollection(Module::paginate(10));
        //return ModuleResource::collection(Module::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModuleRequest $request)
    {
       DB::beginTransaction();

        try {
            foreach ($request->modules as $module){
                Module::create($module);
            }
            DB::commit();
            return response()->json(['message' => 'module created'], 244);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => 'an error has occured'], 244);
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
        //return new ModuleCollection(Module::findOrFail($id));
        return new ModuleResource(Module::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModuleRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            Module::findOrFail($id)->update($request->validated());
            DB::commit();
            return response()->json(['message' => 'module updated'], 244);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => 'an error has occured'], 244);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Module::findOrFail($id)->delete();
    }
}
