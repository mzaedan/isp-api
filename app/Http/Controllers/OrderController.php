<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Paket;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $order = new Order();

        if(empty($order)){
            return response()->json([
                'status' => false,
                'massage' => 'Data Tidak Ditemukan' 
            ]);
        }

        $rules = [
            'id_status' => 'required',
            // 'email' => 'required',
            // 'upload_identity' => 'required',
            // 'kota' => 'required',
            // 'kecamatan' => 'required',
            // 'jalan' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'massage' => 'Gagal',
                'data' => $validator->errors()
            ]);
        }

        $order->id_status =  $request->id_status;
        $order->id_users =  Auth::user()->id ?? null;
        $order->id_paket =  $request->id_paket;;
        $order->full_name = $request->full_name;
        $order->email =  $request->email;
        $order->upload_identity = 2;
        $order->kota =  $request->kota;
        $order->kecamatan =  $request->kecamatan;
        $order->jalan = $request->jalan;

        $post = $order->save();

        return response()->json([
            'code' => 0,
            'info' => 'OK',
        ]);
        
    }

    public function update(Request $request, string $id)
    {
        $order = Order::find($id);

        if(empty($order)){
            return response()->json([
                'status' => false,
                'massage' => 'Data Tidak Ditemukan' 
            ]);
        }

        $rules = [
            'id_status' => 'required',
            // 'email' => 'required',
            // 'upload_identity' => 'required',
            // 'kota' => 'required',
            // 'kecamatan' => 'required',
            // 'jalan' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'massage' => 'Gagal',
                'data' => $validator->errors()
            ]);
        }

        $order->id_status =  $request->id_status;
        $order->id_users =  Auth::user()->id ?? null;
        $order->id_paket =  $request->id_paket;;
        $order->full_name = $request->full_name;
        $order->email =  $request->email;
        $order->upload_identity = 2;
        $order->kota =  $request->kota;
        $order->kecamatan =  $request->kecamatan;
        $order->jalan = $request->jalan;

        $post = $order->save();

        return response()->json([
            'code' => 0,
            'info' => 'OK',
        ]);

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
