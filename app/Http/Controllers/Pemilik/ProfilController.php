<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get pemilik record
        $pemilik = DB::table('pemilik')
            ->where('iduser', $user->iduser)
            ->first();

        // Get pets owned by this pemilik
        $pets = collect([]);
        if ($pemilik) {
            $pets = DB::table('pet')
                ->leftJoin('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
                ->where('pet.idpemilik', $pemilik->idpemilik)
                ->select('pet.*', 'ras_hewan.nama_ras')
                ->get();
        }

        return view('Pemilik.Profil.index', compact('user', 'pemilik', 'pets'));
    }
}
