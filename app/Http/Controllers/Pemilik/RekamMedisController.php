<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RekamMedisController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get pemilik record
        $pemilik = DB::table('pemilik')
            ->where('iduser', $user->iduser)
            ->first();

        if (!$pemilik) {
            return view('Pemilik.RekamMedis.index', ['rekamMedis' => collect([])]);
        }

        // Get medical records for pets owned by this pemilik
        $rekamMedis = DB::table('rekam_medis')
            ->join('pet', 'rekam_medis.id_pet', '=', 'pet.id_pet')
            ->leftJoin('dokter', 'rekam_medis.id_dokter', '=', 'dokter.id_dokter')
            ->leftJoin('perawat', 'rekam_medis.id_perawat', '=', 'perawat.id_perawat')
            ->leftJoin('user as user_dokter', 'dokter.id_user', '=', 'user_dokter.iduser')
            ->leftJoin('user as user_perawat', 'perawat.id_user', '=', 'user_perawat.iduser')
            ->where('pet.idpemilik', $pemilik->idpemilik)
            ->select(
                'rekam_medis.*',
                'pet.nama_pet',
                'user_dokter.nama as nama_dokter',
                'user_perawat.nama as nama_perawat'
            )
            ->orderBy('rekam_medis.tanggal', 'desc')
            ->paginate(10);

        return view('Pemilik.RekamMedis.index', compact('rekamMedis'));
    }
}
