<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilsController;
use App\Http\Controllers\MainController;

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
    Route::get('/get_all/{table}/{field?}', [UtilsController::class,'getAll']);
    Route::get('/get_latest/{table}', [UtilsController::class,'getLatest']);

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
});

