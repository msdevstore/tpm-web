<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function() {
    Route::post('/login', [AuthController::class,'signin']);

    Route::get('/get_all/{table}/{field?}', [UtilsController::class,'getAll']);
    Route::get('/get_latest/{table}', [UtilsController::class,'getLatest']);

    Route::get('/get_parts_by_cust/{id}', [MainController::class,'getPartsByCust']);
    Route::post('/get_part_info', [MainController::class,'getPartInfo']);

    Route::get('/get_mesh_total/{job_no}', [MainController::class,'getMeshTotal']);
    Route::get('/get_weight/{job}', [MainController::class,'getWeight']);
    Route::get('/cust_order_wise', [MainController::class,'custOrderWise']);
    Route::get('/get_weight_list/{job}', [MainController::class,'getWeightList']);
    Route::get('/get_active_jobs', [MainController::class,'getActiveJobs']);
    Route::get('/get_parts/{job}', [MainController::class,'getParts']);
    Route::get('/get_drawing/{part}/{cust_id}', [MainController::class,'getDrawing']);

    Route::post('/order_list_coil', [MainController::class,'getOrderListCoil']);
    Route::post('/update_allocation', [MainController::class,'updateAllocation']);
    Route::post('/order_list_mesh_order', [MainController::class,'orderListMeshOrder']);

    Route::get('/get_job_detail/{job}', [MainController::class, 'getJobDetail']);
    Route::get('/get_part_detail/{part}', [MainController::class, 'getPartDetail']);

    Route::post('/update_paused_job', [MainController::class, 'updatePausedJob']);
    Route::post('/update_upcoming_orders', [MainController::class, 'updateUpcomingOrders']);

    Route::delete('/delete_row/{table}/{field}/{job}', [UtilsController::class, 'deleteOne']);
    Route::post('/create/{table}/{primary}', [MainController::class, 'createOne']);

    Route::post('/stamping_orders_tbl/create', [MainController::class, 'createStampingOrder']);
    Route::post('/steel_tbl/create', [MainController::class, 'createSteelWork']);
    Route::post('/coil_tbl/create', [MainController::class, 'createCoilWork']);
    Route::post('/mesh_tbl/create', [MainController::class, 'createMeshWork']);
    Route::post('/used_mesh/create', [MainController::class, 'createUsedMesh']);
    Route::post('/packing_list_entry/create', [MainController::class, 'createPackingList']);
    Route::post('/excess_part/create', [MainController::class, 'createExcessPart']);
    Route::post('/excess_ring/create', [MainController::class, 'createExcessRing']);
    Route::post('/mat_req/create', [MainController::class, 'createMatReq']);
    Route::post('/quote_tbl/create', [MainController::class, 'createQuote']);
    Route::post('/part_tbl/create', [MainController::class, 'createPart']);
    Route::post('/ring_detail/create', [MainController::class, 'createRingDetail']);
    Route::post('/ship_info/create', [MainController::class, 'createShipInfo']);
    Route::post('/users/create', [MainController::class, 'createUser']);
    Route::post('/users/update', [MainController::class, 'updateUser']);
    Route::post('/footer_for_pdf/create', [MainController::class, 'createFooter']);

    Route::post('/users_permissions/activate', [MainController::class, 'activateUsersPermissions']);
    Route::delete('/delete_partial_ship/{job}/{cust_id}', [MainController::class, 'deletePartialShip']);

    Route::get('/get_part_specs/{part_name}', [MainController::class, 'getPartSpecs']);
});

