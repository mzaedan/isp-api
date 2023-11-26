<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required'
    ]);

    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        $user = User::where('username', $request->username)->first();
        return response()->json([
            'code' => '0',
            'info' => 'OK',
            'data' => [
                'id' => $user->id,
                'nama' => $user->nama
            ]
        ]);
    } else {
        return response()->json([
            'code' => '1',
            'info' => 'Username atau password salah',
            'data' => null
        ]);
    }
}
}
