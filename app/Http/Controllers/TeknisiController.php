<?php

namespace App\Http\Controllers;

use App\Models\Teknisi;
use Illuminate\Http\Request;

class TeknisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function loadData(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $id = $data['id'] ?? null;
        
        if ($id) {
            $teknisi = Teknisi::where('id', $id)->first();
        } else {
            $teknisi = Teknisi::all();
        }
        $response = [
            'code' => 0,
            'info' => 'OK',
            'data' => $teknisi,
        ];
        return response()->json($response);
    }

    public function loadTeknisiListTotalHandling(Request $request)
    {
        $orders = Teknisi::orderBy('total_handling', 'desc')->get();

        return response()->json([
            'code' => 0,
            'info' => 'OK',
            'data' => $orders
        ]);
    }

    public function loadDataTeknisi(Request $request)
    {
        // Cek apakah terdapat input id
        if ($request->has('id')) {
            // Jika terdapat input id, tampilkan data teknisi berdasarkan id
            $teknisi = Teknisi::find($request->id);
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
            $teknisi = Teknisi::all();
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
