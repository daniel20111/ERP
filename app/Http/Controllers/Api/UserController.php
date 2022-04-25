<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new UserCollection(User::with('role')->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
       DB::beginTransaction();

        try {
            foreach ($request->users as $user) {
                User::create($user);
            }
            DB::commit();
            return response()->json(['message' => 'user(s) created'], 222);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => 'an error has occured'], 222);
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
        return new UserResource(User::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            User::findOrFail($id)->update($request->user[0]);
            DB::commit();
            return response()->json(['message' => 'user updated'], 244);
            //return dd($request->user);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => 'an error has ocurred'], 244);
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
        return User::findOrFail($id)->delete();
    }
}
