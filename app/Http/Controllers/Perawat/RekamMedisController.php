<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

        return view('Perawat.RekamMedis.index', compact('rekamMedis'));
    }

    public function create()
    {
        $pets = DB::table('pet')->get();
        $dokters = DB::table('dokter')
            ->join('users', 'dokter.id_user', '=', 'users.id')
            ->select('dokter.id_dokter', 'users.name')
            ->get();
        $perawats = DB::table('perawat')
            ->join('users', 'perawat.id_user', '=', 'users.id')
            ->select('perawat.id_perawat', 'users.name')
            ->get();

        return view('Perawat.RekamMedis.create', compact('pets', 'dokters', 'perawats'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pet' => 'required|exists:pet,id_pet',
            'tanggal' => 'required|date',
            'keluhan' => 'required|string',
            'diagnosa' => 'nullable|string',
            'id_perawat' => 'nullable|exists:perawat,id_perawat',
            'id_dokter' => 'nullable|exists:dokter,id_dokter',
        ]);

        try {
            DB::table('rekam_medis')->insert([
                'id_pet' => $validated['id_pet'],
                'tanggal' => $validated['tanggal'],
                'keluhan' => $validated['keluhan'],
                'diagnosa' => $validated['diagnosa'],
                'id_perawat' => $validated['id_perawat'],
                'id_dokter' => $validated['id_dokter'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('perawat.rekam_medis.index')
                ->with('success', 'Data rekam medis berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menambahkan data: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit($id)
    {
        $rekamMedis = DB::table('rekam_medis')->where('idrekam_medis', $id)->first();

        if (!$rekamMedis) {
            return redirect()->route('perawat.rekam_medis.index')
                ->with('error', 'Data tidak ditemukan.');
        }

        $pets = DB::table('pet')->get();
        $dokters = DB::table('dokter')
            ->join('users', 'dokter.id_user', '=', 'users.id')
            ->select('dokter.id_dokter', 'users.name')
            ->get();
        $perawats = DB::table('perawat')
            ->join('users', 'perawat.id_user', '=', 'users.id')
            ->select('perawat.id_perawat', 'users.name')
            ->get();

        return view('Perawat.RekamMedis.edit', compact('rekamMedis', 'pets', 'dokters', 'perawats'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_pet' => 'required|exists:pet,id_pet',
            'tanggal' => 'required|date',
            'keluhan' => 'required|string',
            'diagnosa' => 'nullable|string',
            'id_perawat' => 'nullable|exists:perawat,id_perawat',
            'id_dokter' => 'nullable|exists:dokter,id_dokter',
        ]);

        try {
            $updated = DB::table('rekam_medis')
                ->where('idrekam_medis', $id)
                ->update([
                    'id_pet' => $validated['id_pet'],
                    'tanggal' => $validated['tanggal'],
                    'keluhan' => $validated['keluhan'],
                    'diagnosa' => $validated['diagnosa'],
                    'id_perawat' => $validated['id_perawat'],
                    'id_dokter' => $validated['id_dokter'],
                    'updated_at' => now(),
                ]);

            if ($updated) {
                return redirect()->route('perawat.rekam_medis.index')
                    ->with('success', 'Data rekam medis berhasil diupdate.');
            }

            return redirect()->back()
                ->with('error', 'Gagal mengupdate data.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal mengupdate data: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $deleted = DB::table('rekam_medis')->where('idrekam_medis', $id)->delete();

            if ($deleted) {
                return redirect()->route('perawat.rekam_medis.index')
                    ->with('success', 'Data rekam medis berhasil dihapus.');
            }

            return redirect()->back()
                ->with('error', 'Gagal menghapus data.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
