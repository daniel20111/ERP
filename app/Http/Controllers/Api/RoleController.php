<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleCollection;
use App\Http\Resources\RoleResource;
use App\Models\Access;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\throwException;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return new RoleCollection(Role::with('modules')->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        DB::beginTransaction();

        try {
            foreach ($request->roles as $role) {
                $validator = Validator::make($role['modules'], [
                    '*.id' => 'present | distinct'
                ]);
        
                if ($validator->fails()) {
                    throw new Exception("Validation Faild");
                }
    
                $createdRole = Role::create($role);
                foreach ($role['modules'] as $module) {
                    $createdRole->modules()->attach($module['id']);
                }
                //$createdRole->modules()->attach($role['modules']);
            }
            DB::commit();
            return response()->json(['message' => 'module created'], 244);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => 'an error has occurred'], 244);
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
        return new RoleResource(Role::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        return Role::findOrFail($id)->update(
            $request->only('name_role', 'description_role'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Role::findOrFail($id)->delete();
    }
}
