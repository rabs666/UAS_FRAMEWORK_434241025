<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        // Query Builder: Get all data with pagination
        $kategori = \DB::table('kategori')
            ->orderBy('idkategori', 'desc')
            ->paginate(10);
        
        return view('admin.kategori.index', compact('kategori'));
    }
    
    public function edit($id)
    {
        // Query Builder: Get single record
        $kategori = \DB::table('kategori')
            ->where('idkategori', $id)
            ->first();
        
        if (!$kategori) {
            return redirect()->route('admin.kategori.index')
                ->with('error', 'Data tidak ditemukan.');
        }
        
        return view('admin.kategori.edit', compact('kategori'));
    }
    
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $this->validateKategori($request, $id);
        
        // Query Builder: Update data
        try {
            $updated = \DB::table('kategori')
                ->where('idkategori', $id)
                ->update([
                    'nama_kategori' => $this->formatNamaKategori($validatedData['nama_kategori']),
                    'updated_at' => now()
                ]);
            
            if ($updated) {
                return redirect()->route('admin.kategori.index')
                    ->with('success', 'Kategori berhasil diupdate.');
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
            $deleted = \DB::table('kategori')
                ->where('idkategori', $id)
                ->delete();
            
            if ($deleted) {
                return redirect()->route('admin.kategori.index')
                    ->with('success', 'Kategori berhasil dihapus.');
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
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $this->validateKategori($request);

        // Helper untuk menyimpan data
        $kategori = $this->createKategori($validatedData);

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Validation Helper
    protected function validateKategori(Request $request, $id = null)
    {
        // Data yang bersifat unik
        $uniqueRule = $id ?
            'unique:kategori,nama_kategori,' . $id . ',idkategori' :
            'unique:kategori,nama_kategori';

        // Validasi data input
        return $request->validate([
            'nama_kategori' => [
                'required',
                'string',
                'max:255',
                'min:3',
                $uniqueRule
            ],
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.unique' => 'Nama kategori sudah ada.',
            'nama_kategori.min' => 'Nama kategori minimal 3 karakter.',
            'nama_kategori.max' => 'Nama kategori maksimal 255 karakter.',
            'nama_kategori.string' => 'Nama kategori harus berupa teks.',
        ]);
    }

    // Helper untuk membuat data baru
    protected function createKategori(array $data)
    {
        try {
            // Query Builder: Insert data
            \DB::table('kategori')->insert([
                'nama_kategori' => $this->formatNamaKategori($data['nama_kategori']),
                'created_at' => now(),
                'updated_at' => now()
            ]);
            return true;
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan data kategori: ' . $e->getMessage());
        }
    }

    // Helper untuk format nama menjadi Title Case
    protected function formatNamaKategori($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}
