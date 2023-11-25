<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\PaketController;
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

Route::get('paket/load-paket-jumlah-terbanyak', [PaketController::class, 'loadPaketListJumlahPenjualanTerbanyak']);

Route::get('teknisi/load-teknisi-total-handling', [TeknisiController::class, 'loadTeknisiListTotalHandling']);




