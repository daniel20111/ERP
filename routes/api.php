<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AccessController;
use App\Http\Controllers\Api\BInventoryController;
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
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\Api\TransferController;
use App\Http\Controllers\Api\TransferOrderController;
use App\Http\Controllers\Api\QuotationController;
use App\Http\Controllers\Api\ProductSaleController;
use App\Http\Controllers\Api\ProductTransferController;


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

Route::middleware('auth:sanctum')->apiResource('warehouses', WarehouseController::class);
//Route::apiResource('warehouses', WarehouseController::class);

Route::apiResource('sections', SectionController::class);

Route::middleware('auth:sanctum')->apiResource('products', ProductController::class);
Route::get('/productSearch', [ProductController::class, 'search']);
//Route::apiResource('products', ProductController::class);
Route::apiResource('employees', EmployeeController::class);

Route::get('entries/warehouseProduct/{id}', [EntryController::class, 'warehouseProduct']);
Route::get('entries/branchProduct/{id}', [EntryController::class, 'branchProduct']);
Route::apiResource('entries', EntryController::class);

Route::post('/entryorders/verify/{id}', [EntryOrderController::class, 'verify']);
Route::get('totalEntryOrders', [EntryOrderController::class, 'totalEntryOrders']);
//Route::apiResource('entryorders', EntryOrderController::class);
Route::middleware('auth:sanctum')->apiResource('entryorders', EntryOrderController::class);

Route::post('/product_entries/verify/{id}', [EntryOrderProductController::class, 'verifyEntryOrder']);
Route::get('/product_entries/verifyAllEntryOrders/{id}', [EntryOrderProductController::class, 'verifyAllEntryOrders']);
//Route::apiResource('product_entries', EntryOrderProductController::class);
Route::middleware('auth:sanctum')->apiResource('product_entries', EntryOrderProductController::class);

Route::post('/transfers/validate/{id}', [TransferController::class, 'generate_transfer_order']);
Route::get('/transfers/totalTransfers/', [TransferController::class, 'totalTransfers']);
Route::middleware('auth:sanctum')->apiResource('transfers', TransferController::class);
//Route::apiResource('transfers', TransferController::class);

Route::middleware('auth:sanctum')->apiResource('transfer_orders', TransferOrderController::class);
Route::middleware('auth:sanctum')->post('/transfer_orders/register_transfer/{id}', [TransferOrderController::class, 'register_transfer']);
Route::middleware('auth:sanctum')->post('/transfer_orders/register_reception/{id}', [TransferOrderController::class, 'register_reception']);
Route::get('transfer_orders/try/{id}', [TransferOrderController::class, 'try']);
//Route::post('/transfer_orders/register_reception/{id}', [TransferOrderController::class, 'register_reception']);
//Route::apiResource('transfer_orders', TransferOrderController::class);
//Route::post('/transfer_orders/register_transfer/{id}', [TransferOrderController::class, 'register_transfer']);

Route::get('/dateSales/{id}', [SaleController::class, 'dateSales']);
Route::get('/salesMonth/{id}', [SaleController::class, 'salesMonth']);
Route::middleware('auth:sanctum')->apiResource('sales', SaleController::class);
//Route::apiResource('sales', SaleController::class);

Route::middleware('auth:sanctum')->apiResource('quotations', QuotationController::class);
Route::middleware('auth:sanctum')->get('/quotations/quotationData/all/', [QuotationController::class, 'quotationData']);
Route::middleware('auth:sanctum')->get('/quotations/quotationData/exportPDF/', [QuotationController::class, 'exportPDF']);
//Route::get('/quotations/quotationData/', [QuotationController::class, 'quotationData']);
//Route::apiResource('quotations', QuotationController::class);

Route::get('productSales/stimateTime/{id}', [ProductSaleController::class, 'stimateTime']);
Route::get('productSales/totalQuotation/', [ProductSaleController::class, 'totalQuotation']);
Route::get('productSales/soldProducts/', [ProductSaleController::class, 'soldProducts']);
Route::get('productSales/bestSeller/', [ProductSaleController::class, 'bestSeller']);
Route::get('productSales/leastSeller/', [ProductSaleController::class, 'leastSeller']);
Route::apiResource('productSales', ProductSaleController::class);

Route::middleware('auth:sanctum')->apiResource('productTransfer', ProductTransferController::class);

Route::middleware('auth:sanctum')->apiResource('bInventory', BInventoryController::class);

Route::middleware('auth:sanctum')->apiResource('invoices', InvoiceController::class);
//Route::apiResource('invoices', InvoiceController::class);

//example
Route::get('example/{id}', [QuotationController::class, 'exportPDF']);

//pdf views
Route::get('/invoice', function () {
    return view('welcome');
});