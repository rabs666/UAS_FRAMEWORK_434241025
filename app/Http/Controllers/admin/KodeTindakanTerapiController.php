<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KodeTindakanTerapiController extends Controller
{
    public function index()
    {
        $kodeTindakanTerapi = DB::table('kode_tindakan_terapi')
            ->leftJoin('kategori', 'kode_tindakan_terapi.idkategori', '=', 'kategori.idkategori')
            ->leftJoin('kategori_klinis', 'kode_tindakan_terapi.idkategori_klinis', '=', 'kategori_klinis.idkategori_klinis')
            ->select('kode_tindakan_terapi.*', 'kategori.nama_kategori', 'kategori_klinis.nama_kategori_klinis')
            ->orderBy('kode_tindakan_terapi.idkode_tindakan_terapi', 'desc')
            ->paginate(10);
        
        return view('admin.kode_tindakan_terapi.index', compact('kodeTindakanTerapi'));
    }

    public function create()
    {
        $kategori = DB::table('kategori')->get();
        $kategoriKlinis = DB::table('kategori_klinis')->get();
        
        return view('admin.kode_tindakan_terapi.create', compact('kategori', 'kategoriKlinis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:50|unique:kode_tindakan_terapi,kode',
            'deskripsi_tindakan_terapi' => 'required|string',
            'idkategori' => 'required|exists:kategori,idkategori',
            'idkategori_klinis' => 'required|exists:kategori_klinis,idkategori_klinis'
        ]);

        try {
            DB::table('kode_tindakan_terapi')->insert([
                'kode' => strtoupper($validated['kode']),
                'deskripsi_tindakan_terapi' => $validated['deskripsi_tindakan_terapi'],
                'idkategori' => $validated['idkategori'],
                'idkategori_klinis' => $validated['idkategori_klinis'],
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return redirect()->route('admin.kode_tindakan_terapi.index')
                ->with('success', 'Kode tindakan terapi berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menambahkan data: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit($id)
    {
        $kodeTindakan = DB::table('kode_tindakan_terapi')
            ->where('idkode_tindakan_terapi', $id)
            ->first();
        
        if (!$kodeTindakan) {
            return redirect()->route('admin.kode_tindakan_terapi.index')
                ->with('error', 'Data tidak ditemukan.');
        }
        
        $kategori = DB::table('kategori')->get();
        $kategoriKlinis = DB::table('kategori_klinis')->get();
        
        return view('admin.kode_tindakan_terapi.edit', compact('kodeTindakan', 'kategori', 'kategoriKlinis'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:50|unique:kode_tindakan_terapi,kode,' . $id . ',idkode_tindakan_terapi',
            'deskripsi_tindakan_terapi' => 'required|string',
            'idkategori' => 'required|exists:kategori,idkategori',
            'idkategori_klinis' => 'required|exists:kategori_klinis,idkategori_klinis'
        ]);

        try {
            $updated = DB::table('kode_tindakan_terapi')
                ->where('idkode_tindakan_terapi', $id)
                ->update([
                    'kode' => strtoupper($validated['kode']),
                    'deskripsi_tindakan_terapi' => $validated['deskripsi_tindakan_terapi'],
                    'idkategori' => $validated['idkategori'],
                    'idkategori_klinis' => $validated['idkategori_klinis'],
                    'updated_at' => now()
                ]);

            if ($updated) {
                return redirect()->route('admin.kode_tindakan_terapi.index')
                    ->with('success', 'Kode tindakan terapi berhasil diupdate.');
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
            $deleted = DB::table('kode_tindakan_terapi')
                ->where('idkode_tindakan_terapi', $id)
                ->delete();

            if ($deleted) {
                return redirect()->route('admin.kode_tindakan_terapi.index')
                    ->with('success', 'Kode tindakan terapi berhasil dihapus.');
            }

            return redirect()->back()
                ->with('error', 'Gagal menghapus data.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
