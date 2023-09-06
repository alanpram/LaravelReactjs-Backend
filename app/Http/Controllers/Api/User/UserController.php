<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        if (Auth::check()) {
            // Lakukan operasi membaca data di sini
            $user = Auth::user(); // Mendapatkan pengguna yang sudah login
            return response()->json(['message' => 'Data berhasil dibaca', 'user' => $user]);
        } else {
            return response()->json(['message' => 'Anda harus login terlebih dahulu'], 401); // Unauthorized
        }
    }
}
