<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = DB::table('pet')
            ->leftJoin('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
            ->leftJoin('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->leftJoin('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pet.*', 'ras_hewan.nama_ras', 'user.nama as nama_pemilik', 'pemilik.no_wa')
            ->orderBy('pet.id_pet', 'desc')
            ->paginate(10);

        return view('Dokter.Pasien.index', compact('pasien'));
    }
}
