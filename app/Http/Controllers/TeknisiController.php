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

   
}
