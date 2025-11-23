<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailRekamMedisController extends Controller
{
    public function index()
    {
        $detailRekam = DB::table('detail_rekaman_medis')
            ->leftJoin('rekam_medis', 'detail_rekaman_medis.idrekam_medis', '=', 'rekam_medis.idrekam_medis')
            ->leftJoin('pet', 'rekam_medis.id_pet', '=', 'pet.id_pet')
            ->leftJoin('kode_tindakan_terapi', 'detail_rekaman_medis.idkode_tindakan_terapi', '=', 'kode_tindakan_terapi.idkode_tindakan_terapi')
            ->select(
                'detail_rekaman_medis.*',
                'pet.nama_pet',
                'rekam_medis.tanggal',
                'kode_tindakan_terapi.kode',
                'kode_tindakan_terapi.deskripsi_tindakan_terapi'
            )
            ->orderBy('rekam_medis.tanggal', 'desc')
            ->paginate(10);

        return view('Perawat.DetailRekamMedis.index', compact('detailRekam'));
    }
}
