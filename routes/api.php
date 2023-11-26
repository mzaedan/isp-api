<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\PaketController;
use App\Models\Order;
use App\Models\Paket;
use App\Models\Teknisi;
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

Route::get('paket/get-paket', [PaketController::class, 'getAllPaket']); //API Get Package

Route::get('order/load-order-list-status', [OrderController::class, 'loadOrderListStatus']); //API load list data order + terdapat kondisional sorting desc by status_id

Route::post('order/store', [OrderController::class, 'store']); //API Submit/save order
Route::put('order/update/{id}', [OrderController::class, 'update']); //API Update data order
Route::get('order/load-data-order', [OrderController::class, 'loadDataOrder']); //API load data order


Route::get('paket/load-paket-jumlah-terbanyak', [PaketController::class, 'loadPaketListJumlahPenjualanTerbanyak']); //API load list data paket sort by jumlah terbanyak (desc)

Route::get('teknisi/load-teknisi-total-handling', [TeknisiController::class, 'loadTeknisiListTotalHandling']); // API load list data teknisi sort by jumlah terbanyak (desc) 
Route::get('teknisi/load-data-teknisi', [TeknisiController::class, 'loadDataTeknisi']); //API load data teknisi

Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/logout', [AuthController::class, 'logout']);

