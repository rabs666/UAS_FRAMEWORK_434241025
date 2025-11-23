<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TemuDokterController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get pemilik record
        $pemilik = DB::table('pemilik')
            ->where('iduser', $user->iduser)
            ->first();

        if (!$pemilik) {
            return view('Pemilik.TemuDokter.index', ['temuDokter' => collect([])]);
        }

        // Get appointments for pets owned by this pemilik
        $temuDokter = DB::table('temu_dokter')
            ->join('pet', 'temu_dokter.id_pet', '=', 'pet.id_pet')
            ->leftJoin('dokter', 'temu_dokter.id_dokter', '=', 'dokter.id_dokter')
            ->leftJoin('user', 'dokter.id_user', '=', 'user.iduser')
            ->where('pet.idpemilik', $pemilik->idpemilik)
            ->select(
                'temu_dokter.*',
                'pet.nama_pet',
                'user.nama as nama_dokter'
            )
            ->orderBy('temu_dokter.tanggal_temu', 'desc')
            ->paginate(10);

        return view('Pemilik.TemuDokter.index', compact('temuDokter'));
    }
}
