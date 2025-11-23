<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\Pemilik as PemilikModel;
use Illuminate\Http\Request;

class PemilikDashboardController extends Controller
{
    public function index()
    {
        // Ambil data pemilik dari user yang login
        $pemilik = PemilikModel::where('iduser', auth()->id())->first();
        
        if (!$pemilik) {
            return view('Pemilik.dashboard')->with('message', 'Anda belum terdaftar sebagai pemilik pet.');
        }
        
        // Ambil HANYA pet milik user yang login
        $pets = Pet::where('idpemilik', $pemilik->idpemilik)
            ->with(['rasHewan.jenisHewan', 'rekamMedis'])
            ->get();
        
        return view('Pemilik.dashboard', compact('pets', 'pemilik'));
    }
}
