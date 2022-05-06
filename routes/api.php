<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AccessController;
use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\ModuleController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WarehouseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::apiResource('accesses', AccessController::class);
Route::apiResource('roles', RoleController::class);
Route::apiResource('modules', ModuleController::class);

Route::post('/login', [UserController::class, 'login']);
Route::apiResource('users', UserController::class);
Route::apiResource('employees', EmployeeController::class);
Route::apiResource('branches', BranchController::class);
Route::apiResource('warehouses', WarehouseController::class);
Route::apiResource('sections', SectionController::class);

Route::middleware('auth:sanctum')->apiResource('products', ProductController::class);
//Route::apiResource('products', ProductController::class);
Route::apiResource('employees', EmployeeController::class);

