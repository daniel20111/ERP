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
use App\Http\Controllers\Api\EntryController;
use App\Http\Controllers\Api\EntryOrderController;
use App\Http\Controllers\Api\EntryOrderProductController;
use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\Api\TransferController;
use App\Http\Controllers\Api\TransferOrderController;
use App\Models\EntryOrderProduct;
use App\Models\TransferOrder;

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
//Route::get('/productSearch', [ProductController::class, 'search']);
//Route::apiResource('products', ProductController::class);
Route::apiResource('employees', EmployeeController::class);

Route::apiResource('entries', EntryController::class);

Route::apiResource('entryorders', EntryOrderController::class);

Route::apiResource('product_entries', EntryOrderProductController::class);

Route::post('/transfers/validate/{id}', [TransferController::class, 'generate_transfer_order']);
Route::apiResource('transfers', TransferController::class);

Route::middleware('auth:sanctum')->apiResource('transfer_orders', TransferOrderController::class);
Route::middleware('auth:sanctum')->post('/transfer_orders/register_transfer/{id}', [TransferOrderController::class, 'register_transfer']);
Route::middleware('auth:sanctum')->post('/transfer_orders/register_reception/{id}', [TransferOrderController::class, 'register_reception']);
Route::get('transfer_orders/try/{id}', [TransferOrderController::class, 'try']);
//Route::post('/transfer_orders/register_reception/{id}', [TransferOrderController::class, 'register_reception']);
//Route::apiResource('transfer_orders', TransferOrderController::class);
//Route::post('/transfer_orders/register_transfer/{id}', [TransferOrderController::class, 'register_transfer']);

Route::apiResource('sales', SaleController::class);

