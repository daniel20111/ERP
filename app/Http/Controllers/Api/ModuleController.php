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

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ModuleCollection(Module::with('roles')->paginate(5));
        //return new ModuleResource(Module::all());
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
        //$module = $request->data->name_module;
        /*foreach ($request->modules as $datum) {
            $r = $datum;
        }
        return $r;*/
        $validatedModules = $request->validated();
        $modules = $validatedModules['modules'];

        DB::transaction(function () use ($modules) {
            foreach ($modules as $module){
                Module::create($module);
            }
        });

        /*DB::transaction(function () use ($validatedModules) {
            foreach ($validatedModules->modules as $module) {
                Module::create($module);
            }
            return response()->json(['hola' => 'mundo'], 200);
        });*/

        /*return Module::create($request->only('name_module')); */  
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
        return Module::findOrFail($id)->update($request->only('name_module'));
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
