<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ShipInfoController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\OrderStatusController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\ExcessStockController;
use App\Http\Controllers\Admin\QuotesController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\MaterialReqController;
use App\Http\Controllers\Admin\UniScreenController;
use App\Http\Controllers\Admin\UniQuotesController;
use App\Http\Controllers\Admin\PartInfoController;
use App\Http\Controllers\Admin\RingAdjustController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('index');
//});

//Route::get('/', [PagesController::class,'index']);

Route::get('/', [CustomerController::class,'index']);

Route::get('/customers', [CustomerController::class,'index']);
Route::post('/customers/create', [CustomerController::class,'create']);
Route::delete('/customers/{id}', [CustomerController::class,'delete']);

Route::get('/orders/all', [OrdersController::class,'all']);
Route::get('/orders/yet_to_start', [OrdersController::class,'yetToStart']);
Route::get('/orders/started', [OrdersController::class,'started']);
Route::get('/orders/finished', [OrdersController::class,'finished']);
Route::get('/orders/shipped', [OrdersController::class,'shipped']);
Route::get('/orders/paused', [OrdersController::class,'paused']);
Route::get('/orders/stamping', [OrdersController::class,'stamping']);

Route::get('/order_status/upcoming_orders', [OrderStatusController::class,'upcomingOrders']);
Route::get('/order_status/shipping', [OrderStatusController::class,'shipping']);
Route::get('/order_status/all_orders', [OrderStatusController::class,'allOrders']);
Route::get('/order_status/material_search', [OrderStatusController::class,'materialSearch']);
Route::get('/order_status/shipments', [OrderStatusController::class,'shipments']);
Route::get('/order_status/mills', [OrderStatusController::class,'mills']);
Route::get('/order_status/search_query', [OrderStatusController::class,'searchQuery']);

Route::get('/inventory/steel_work_number', [InventoryController::class,'steelWorkNumber']);
Route::get('/inventory/receive_coil_mill', [InventoryController::class,'receiveCoilMill']);
Route::get('/inventory/receive_coil_stamping', [InventoryController::class,'receiveCoilStamping']);
Route::get('/inventory/mesh_receiving', [InventoryController::class,'meshReceiving']);
Route::get('/inventory/mesh_inventory', [InventoryController::class,'meshInventory']);
Route::get('/inventory/mesh_allocated', [InventoryController::class,'meshAllocated']);
Route::get('/inventory/used_mesh', [InventoryController::class,'usedMesh']);
Route::get('/inventory/packing_list_entry', [InventoryController::class,'packingListEntry']);

Route::get('/reports/job_status', [ReportsController::class,'jobStatus']);
Route::get('/reports/pdf_generator', [ReportsController::class,'pdfGenerator']);
Route::get('/reports/standard_prices', [ReportsController::class,'standardPrices']);
Route::get('/reports/training', [ReportsController::class,'training']);
Route::get('/reports/steel_receive', [ReportsController::class,'steelReceive']);
Route::get('/reports/audit', [ReportsController::class,'audit']);
Route::get('/reports/order_status', [ReportsController::class,'orderStatus']);

Route::get('/excess_stock/part', [ExcessStockController::class,'part']);
Route::get('/excess_stock/ring', [ExcessStockController::class,'ring']);

Route::get('/quotes/new_quotes', [QuotesController::class,'newQuotes']);
Route::get('/quotes/pricing_search', [QuotesController::class,'pricingSearch']);

Route::get('/setting/users', [SettingController::class,'users']);
Route::get('/setting/instruction_type', [SettingController::class,'instructionType']);
Route::get('/setting/status_type', [SettingController::class,'statusType']);
Route::get('/setting/tpm_type', [SettingController::class,'tpmType']);
Route::get('/setting/unit_table', [SettingController::class,'unitTable']);
Route::get('/setting/container', [SettingController::class,'container']);
Route::get('/setting/ship_method', [SettingController::class,'shipMethod']);
Route::get('/setting/die_table', [SettingController::class,'dieTable']);
Route::get('/setting/stamping_die_table', [SettingController::class,'stampingDieTable']);
Route::get('/setting/drifts', [SettingController::class,'drifts']);
Route::get('/setting/employee', [SettingController::class,'employee']);
Route::get('/setting/excluder_rings', [SettingController::class,'excluderRings']);
Route::get('/setting/fraction_table', [SettingController::class,'fractionTable']);
Route::get('/setting/gage_table', [SettingController::class,'gageTable']);
Route::get('/setting/material_table', [SettingController::class,'materialTable']);
Route::get('/setting/mesh_types', [SettingController::class,'meshTypes']);
Route::get('/setting/micron', [SettingController::class,'micron']);
Route::get('/setting/operator_list', [SettingController::class,'operatorList']);
Route::get('/setting/pattern_table', [SettingController::class,'patternTable']);
Route::get('/setting/weld_spec_mil', [SettingController::class,'weldSpecMil']);
Route::get('/setting/ship_via_list', [SettingController::class,'shipViaList']);
Route::get('/setting/rings', [SettingController::class,'rings']);
Route::get('/setting/footer_settings', [SettingController::class,'footerSettings']);

Route::get('/material_requirements', [MaterialReqController::class,'index']);
Route::get('/uni_screen', [UniScreenController::class,'index']);
Route::get('/uni_quotes', [UniQuotesController::class,'index']);
Route::get('/part_information', [PartInfoController::class,'index']);
Route::get('/ring_adjustment', [RingAdjustController::class,'index']);
Route::get('/ship_info', [ShipInfoController::class,'index']);

Route::get('/datatables', [PagesController::class,'datatables']);
Route::get('/ktdatatables', [PagesController::class,'ktDatatables']);
Route::get('/select2', [PagesController::class,'select2']);
Route::get('/icons/custom-icons', [PagesController::class,'customIcons']);
Route::get('/icons/flaticon', [PagesController::class,'flaticon']);
Route::get('/icons/fontawesome', [PagesController::class,'fontawesome']);
Route::get('/icons/lineawesome', [PagesController::class,'lineawesome']);
Route::get('/icons/socicons', [PagesController::class,'socicons']);
Route::get('/icons/svg', [PagesController::class,'svg']);

//
//// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', [PagesController::class,'quickSearch'])->name('quick-search');
