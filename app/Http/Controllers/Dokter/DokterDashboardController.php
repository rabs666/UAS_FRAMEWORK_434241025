<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Rekam_Medis;
use App\Models\Pet;
use Illuminate\Http\Request;

class DokterDashboardController extends Controller
{
    public function index()
    {
        // Data rekam medis dengan relasi
        $rekamMedis = Rekam_Medis::with(['pet.pemilik.user', 'pet.rasHewan.jenisHewan'])
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();
        
        // Pet yang sedang/pernah dirawat
        $pets = Pet::has('rekamMedis')
            ->with(['rasHewan.jenisHewan', 'pemilik.user'])
            ->take(15)
            ->get();
        
        return view('Dokter.dashboard', compact('rekamMedis', 'pets'));
    }
}
