<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAllPaket()
    {
        $paket = Paket::all();
        if ($paket) {
            return response()->json(['code' => 0, 'info' => 'OK', 'data' => $paket]);
        } else {
            return response()->json(['code' => 1, 'info' => 'Error', 'data' => []]);
        }
    }

    public function loadPaketListJumlahPenjualanTerbanyak(Request $request)
    {
        $orders = Paket::orderBy('jumlah_penjualan', 'desc')->get();

        return response()->json([
            'code' => 0,
            'info' => 'OK',
            'data' => $orders
        ]);
    }

    
}
