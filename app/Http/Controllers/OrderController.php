<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Paket;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

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
    
    public function loadOrderListStatus(Request $request)
    {
        $orders = Order::orderBy('id_status', 'desc')->get();

        return response()->json([
            'code' => 0,
            'info' => 'OK',
            'data' => $orders
        ]);
    }

    // public function store(OrderRequest $request)
    // {
    //     $order = $request->all();

    //     $order = Order::create($order);

    //     $responseData = [
    //         'code' => '0',
    //         'info' => 'OK',
    //         'data' => [
    //             'id_status' => 2,
    //             'id_paket' => $order['id_paket'],
    //         ],
    //     ];
        

    //     return response()->json($responseData);
    // }

    public function store(Request $request)
    {
        // Validasi data yang dikirimkan melalui API
        $request->validate([
            'id_status' => 'required|integer',
            'id_users' => 'required|integer',
            'id_paket' => 'required|integer',
            'full_name' => 'required|string',
            'email' => 'required|string',
            'upload_identity' => 'required|string',
            'kota'=> 'required|string',
            'kecamatan' => 'required|string',
            'jalan'  => 'required|string',
        ]);

        // Proses penyimpanan data ke dalam database
        $category = Order::create([
            'id_status' => 3,
            'id_users' => 1,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'upload_identity' => 2,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'jalan' => $request->jalan
        ]);

        // Kirimkan respon ke client berupa data yang telah disimpan
        return response()->json([
            'message' => 'Order created successfully',
            'data' => $category,
        ], 201);
    }

    public function loadDataOrder(Request $request)
    {
        // Cek apakah terdapat input id
        if ($request->has('id')) {
            // Jika terdapat input id, tampilkan data teknisi berdasarkan id
            $teknisi = Order::find($request->id);
            if ($teknisi) {
                $data = $teknisi;
                $code = 0;
                $info = "OK";
            } else {
                $data = [];
                $code = 1;
                $info = "Data teknisi tidak ditemukan";
            }
        } else {
            // Jika tidak terdapat input id, tampilkan semua data teknisi
            $teknisi = Order::all();
            $data = $teknisi;
            $code = 0;
            $info = "OK";
        }

        // Kirim response berupa JSON
        return response()->json([
            'code' => $code,
            'info' => $info,
            'data' => $data
        ]);
    }
}
