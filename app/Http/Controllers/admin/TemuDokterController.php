<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TemuDokterController extends Controller
{
    public function index()
    {
        $temuDokter = DB::table('temu_dokter')
            ->leftJoin('pet', 'temu_dokter.id_pet', '=', 'pet.id_pet')
            ->leftJoin('dokter', 'temu_dokter.id_dokter', '=', 'dokter.id_dokter')
            ->leftJoin('users', 'dokter.id_user', '=', 'users.id')
            ->select(
                'temu_dokter.*',
                'pet.nama_pet',
                'users.name as nama_dokter'
            )
            ->orderBy('temu_dokter.tanggal_temu', 'desc')
            ->paginate(10);

        return view('Admin.TemuDokter.index', compact('temuDokter'));
    }

    public function create()
    {
        $pets = DB::table('pet')->get();
        $dokters = DB::table('dokter')
            ->join('users', 'dokter.id_user', '=', 'users.id')
            ->select('dokter.id_dokter', 'users.name')
            ->get();

        return view('Admin.TemuDokter.create', compact('pets', 'dokters'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pet' => 'required|exists:pet,id_pet',
            'id_dokter' => 'required|exists:dokter,id_dokter',
            'tanggal_temu' => 'required|date',
            'jam_temu' => 'required',
            'keluhan_awal' => 'nullable|string',
            'status' => 'required|in:Menunggu,Selesai,Batal',
        ]);

        try {
            DB::table('temu_dokter')->insert([
                'id_pet' => $validated['id_pet'],
                'id_dokter' => $validated['id_dokter'],
                'tanggal_temu' => $validated['tanggal_temu'],
                'jam_temu' => $validated['jam_temu'],
                'keluhan_awal' => $validated['keluhan_awal'],
                'status' => $validated['status'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('admin.temu_dokter.index')
                ->with('success', 'Data temu dokter berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menambahkan data: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit($id)
    {
        $temuDokter = DB::table('temu_dokter')->where('id_temu_dokter', $id)->first();

        if (!$temuDokter) {
            return redirect()->route('admin.temu_dokter.index')
                ->with('error', 'Data tidak ditemukan.');
        }

        $pets = DB::table('pet')->get();
        $dokters = DB::table('dokter')
            ->join('users', 'dokter.id_user', '=', 'users.id')
            ->select('dokter.id_dokter', 'users.name')
            ->get();

        return view('Admin.TemuDokter.edit', compact('temuDokter', 'pets', 'dokters'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_pet' => 'required|exists:pet,id_pet',
            'id_dokter' => 'required|exists:dokter,id_dokter',
            'tanggal_temu' => 'required|date',
            'jam_temu' => 'required',
            'keluhan_awal' => 'nullable|string',
            'status' => 'required|in:Menunggu,Selesai,Batal',
        ]);

        try {
            $updated = DB::table('temu_dokter')
                ->where('id_temu_dokter', $id)
                ->update([
                    'id_pet' => $validated['id_pet'],
                    'id_dokter' => $validated['id_dokter'],
                    'tanggal_temu' => $validated['tanggal_temu'],
                    'jam_temu' => $validated['jam_temu'],
                    'keluhan_awal' => $validated['keluhan_awal'],
                    'status' => $validated['status'],
                    'updated_at' => now(),
                ]);

            if ($updated) {
                return redirect()->route('admin.temu_dokter.index')
                    ->with('success', 'Data temu dokter berhasil diupdate.');
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
            $deleted = DB::table('temu_dokter')->where('id_temu_dokter', $id)->delete();

            if ($deleted) {
                return redirect()->route('admin.temu_dokter.index')
                    ->with('success', 'Data temu dokter berhasil dihapus.');
            }

            return redirect()->back()
                ->with('error', 'Gagal menghapus data.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
