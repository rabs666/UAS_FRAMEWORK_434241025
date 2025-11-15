<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori_Klinis;

class KategoriKlinisController extends Controller
{
    public function index()
    {
        // Query Builder: Get all data with pagination
        $kategoriKlinis = \DB::table('kategori_klinis')
            ->orderBy('idkategori_klinis', 'desc')
            ->paginate(10);
        
        return view('admin.kategori_klinis.index', compact('kategoriKlinis'));
    }
    
    public function edit($id)
    {
        // Query Builder: Get single record
        $kategoriKlinis = \DB::table('kategori_klinis')
            ->where('idkategori_klinis', $id)
            ->first();
        
        if (!$kategoriKlinis) {
            return redirect()->route('admin.kategori_klinis.index')
                ->with('error', 'Data tidak ditemukan.');
        }
        
        return view('admin.kategori_klinis.edit', compact('kategoriKlinis'));
    }
    
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $this->validateKategoriKlinis($request, $id);
        
        // Query Builder: Update data
        try {
            $updated = \DB::table('kategori_klinis')
                ->where('idkategori_klinis', $id)
                ->update([
                    'nama_kategori_klinis' => $this->formatNamaKategoriKlinis($validatedData['nama_kategori_klinis']),
                    'updated_at' => now()
                ]);
            
            if ($updated) {
                return redirect()->route('admin.kategori_klinis.index')
                    ->with('success', 'Kategori klinis berhasil diupdate.');
            }
            
            return redirect()->back()
                ->with('error', 'Gagal mengupdate data.');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal mengupdate data: ' . $e->getMessage());
        }
    }
    
    public function destroy($id)
    {
        // Query Builder: Delete data
        try {
            $deleted = \DB::table('kategori_klinis')
                ->where('idkategori_klinis', $id)
                ->delete();
            
            if ($deleted) {
                return redirect()->route('admin.kategori_klinis.index')
                    ->with('success', 'Kategori klinis berhasil dihapus.');
            }
            
            return redirect()->back()
                ->with('error', 'Gagal menghapus data.');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function create()
    {
        return view('admin.kategori_klinis.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $this->validateKategoriKlinis($request);

        // Helper untuk menyimpan data
        $kategoriKlinis = $this->createKategoriKlinis($validatedData);

        return redirect()->route('admin.kategori_klinis.index')
            ->with('success', 'Kategori klinis berhasil ditambahkan.');
    }

    // Validation Helper
    protected function validateKategoriKlinis(Request $request, $id = null)
    {
        $uniqueRule = $id ?
            'unique:kategori_klinis,nama_kategori_klinis,' . $id . ',idkategori_klinis' :
            'unique:kategori_klinis,nama_kategori_klinis';

        return $request->validate([
            'nama_kategori_klinis' => [
                'required',
                'string',
                'max:255',
                'min:3',
                $uniqueRule
            ],
        ], [
            'nama_kategori_klinis.required' => 'Nama kategori klinis wajib diisi.',
            'nama_kategori_klinis.unique' => 'Nama kategori klinis sudah ada.',
            'nama_kategori_klinis.min' => 'Nama kategori klinis minimal 3 karakter.',
            'nama_kategori_klinis.max' => 'Nama kategori klinis maksimal 255 karakter.',
            'nama_kategori_klinis.string' => 'Nama kategori klinis harus berupa teks.',
        ]);
    }

    // Helper untuk membuat data baru
    protected function createKategoriKlinis(array $data)
    {
        try {
            // Query Builder: Insert data
            \DB::table('kategori_klinis')->insert([
                'nama_kategori_klinis' => $this->formatNamaKategoriKlinis($data['nama_kategori_klinis']),
                'created_at' => now(),
                'updated_at' => now()
            ]);
            return true;
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan data kategori klinis: ' . $e->getMessage());
        }
    }

    // Helper untuk format nama menjadi Title Case
    protected function formatNamaKategoriKlinis($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}
