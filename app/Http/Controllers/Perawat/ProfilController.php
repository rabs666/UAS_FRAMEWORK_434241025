<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $perawat = DB::table('perawat')
            ->where('id_user', $user->id)
            ->first();

        return view('Perawat.Profil.index', compact('user', 'perawat'));
    }
}
