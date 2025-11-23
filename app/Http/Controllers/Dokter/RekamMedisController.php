<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekamMedisController extends Controller
{
    public function index()
    {
        $rekamMedis = DB::table('rekam_medis')
            ->leftJoin('pet', 'rekam_medis.id_pet', '=', 'pet.id_pet')
            ->leftJoin('dokter', 'rekam_medis.id_dokter', '=', 'dokter.id_dokter')
            ->leftJoin('perawat', 'rekam_medis.id_perawat', '=', 'perawat.id_perawat')
            ->leftJoin('users as user_dokter', 'dokter.id_user', '=', 'user_dokter.id')
            ->leftJoin('users as user_perawat', 'perawat.id_user', '=', 'user_perawat.id')
            ->select(
                'rekam_medis.*',
                'pet.nama_pet',
                'user_dokter.name as nama_dokter',
                'user_perawat.name as nama_perawat'
            )
            ->orderBy('rekam_medis.tanggal', 'desc')
            ->paginate(10);

        return view('Dokter.RekamMedis.index', compact('rekamMedis'));
    }
}
