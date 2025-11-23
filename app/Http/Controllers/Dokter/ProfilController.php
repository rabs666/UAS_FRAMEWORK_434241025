<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dokter = DB::table('dokter')
            ->where('id_user', $user->id)
            ->first();

        return view('Dokter.Profil.index', compact('user', 'dokter'));
    }
}
