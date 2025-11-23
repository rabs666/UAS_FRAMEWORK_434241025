<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\Detail_Rekaman_Medis;
use Illuminate\Http\Request;

class PerawatDashboardController extends Controller
{
    public function index()
    {
        // Pet yang sedang dalam perawatan (7 hari terakhir)
        $petsInCare = Pet::whereHas('rekamMedis', function($q) {
                $q->where('created_at', '>=', now()->subDays(7));
            })
            ->with(['rasHewan.jenisHewan', 'pemilik.user', 'rekamMedis' => function($q) {
                $q->latest()->take(1);
            }])
            ->get();
        
        // Detail treatment/tindakan terbaru
        $treatments = Detail_Rekaman_Medis::with(['rekamMedis.pet', 'kodeTindakanTerapi'])
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();
        
        return view('Perawat.dashboard', compact('petsInCare', 'treatments'));
    }
}
