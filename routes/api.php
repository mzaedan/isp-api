<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\PaketController;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('teknisi/index', [TeknisiController::class, 'index']);


Route::get('order/index', [OrderController::class, 'index']);
Route::get('order/store', [OrderController::class, 'store']);
Route::get('order/load-order-list-status', [OrderController::class, 'loadOrderListStatus']);
Route::get('order/load-order-list-paket', [OrderController::class, 'loadOrderListPaket']);


Route::get('paket/index', [PaketController::class, 'index']);
