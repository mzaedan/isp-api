<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Paket;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::all();
        return response()->json(['status' => 'success', 'data' => $order]);
    }

    /**
     * Store a newly created resource in storage.
     */

    
    public function loadOrderListStatus(Request $request)
    {
        // Ambil id_status dari input request
        $idStatus = $request->input('id_status');
        
        // Ambil data pemesanan berdasarkan id_status
        $orders = Order::where('id_status', $idStatus)->get();
        
        // Urutkan data berdasarkan id_status
        $sortedOrders = $orders->sortBy('id_status');
        
        // Kembalikan data JSON sebagai respons
        return response()->json([
            'status' => 'success',
            'data' => $sortedOrders,
        ]);
    }

    public function loadOrderListPaket(Request $request)
    {
        // Ambil id_status dari input request
        $idPaket = $request->input('id_paket');
        // Ambil data pemesanan berdasarkan id_status
        $orders = Order::orderBy('id_paket', 'desc')->get();
        // Urutkan data berdasarkan id_status
        $sortedOrders = $orders->sortBy('id_paket');
        // Hitung jumlah data berdasarkan id_paket di tabel paket
        $countByPaket = Paket::groupBy('id_paket')->select('id_paket', DB::raw('count(*) as total'))->get();
        // Kembalikan data JSON sebagai respons
        return response()->json([
            'status' => 'success',
            'data' => $sortedOrders,
            'countByPaket' => $countByPaket,
        ]);
    }

    public function loadOrderListTeknisi(Request $request)
    {
        // Ambil id_status dari input request
        $idPaket = $request->input('id_paket');

        // Ambil data pemesanan berdasarkan id_status
        $orders = Order::orderBy('id_paket', 'desc')->get();

        // Urutkan data berdasarkan id_status
        $sortedOrders = $orders->sortBy('id_paket');

        // Kembalikan data JSON sebagai respons
        return response()->json([
            'status' => 'success',
            'data' => $sortedOrders,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
