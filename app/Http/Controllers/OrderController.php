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
        $orders = Order::orderBy('id_status', 'desc')->get();

        return response()->json([
            'code' => 0,
            'info' => 'OK',
            'data' => $orders
        ]);
    }
}
