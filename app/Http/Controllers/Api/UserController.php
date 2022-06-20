<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth\LoginController as CustomLoginController;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new UserCollection(User::with('role', 'employee')->get());
        // $user = User::where('id', '=', 6)->with('employee')->get();
        // $id = $user[0]->employee->branch_id;
        // return $id;
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
            return response()->json(['message' => $request->users], 222);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if ($request->has('with') && $request->filled('with'))
        {
            if ($request->with == 'modules')
            {
                return new UserResource(User::with('role.modules')->findOrFail($id));
            }
            if ($request->with == 'role')
            {
                return new UserResource(User::with('role')->findOrFail($id));
            }
            if ($request->with == 'all')
            {
                return new UserResource(User::with('role.modules', 'employee')->findOrFail($id));
            }
            
        }
        return new UserResource(User::with('role', 'employee')->findOrFail($id));
        //return new UserResource(User::findOrFail($id));
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

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->user()->tokens()->delete();
            $token = $request->user()->createToken('user');
            return response()->json(['token' => $token->plainTextToken, 'user_id' => auth()->user()->id], 200);
        }

        return response()->json(['message' => 'nonono'], 512);

    }
}