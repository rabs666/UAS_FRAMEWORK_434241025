<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RasHewan;
use App\Models\JenisHewan;

class RasHewanController extends Controller
{
    public function index()
    {
        // Query Builder: Get all data with join and pagination
        $rasHewan = \DB::table('ras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->select('ras_hewan.*', 'jenis_hewan.nama_jenis_hewan')
            ->orderBy('ras_hewan.idras_hewan', 'desc')
            ->paginate(10);
        
        return view('admin.ras_hewan.index', compact('rasHewan'));
    }
    
    public function edit($id)
    {
        // Query Builder: Get single record
        $rasHewan = \DB::table('ras_hewan')
            ->where('idras_hewan', $id)
            ->first();
        
        if (!$rasHewan) {
            return redirect()->route('admin.ras_hewan.index')
                ->with('error', 'Data tidak ditemukan.');
        }
        
        // Get all jenis hewan for dropdown
        $jenisHewan = \DB::table('jenis_hewan')->get();
        
        return view('admin.ras_hewan.edit', compact('rasHewan', 'jenisHewan'));
    }
    
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $this->validateRasHewan($request, $id);
        
        // Query Builder: Update data
        try {
            $updated = \DB::table('ras_hewan')
                ->where('idras_hewan', $id)
                ->update([
                    'nama_ras' => $this->formatNamaRasHewan($validatedData['nama_ras']),
                    'idjenis_hewan' => $validatedData['idjenis_hewan'],
                    'updated_at' => now()
                ]);
            
            if ($updated) {
                return redirect()->route('admin.ras_hewan.index')
                    ->with('success', 'Ras hewan berhasil diupdate.');
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
            $deleted = \DB::table('ras_hewan')
                ->where('idras_hewan', $id)
                ->delete();
            
            if ($deleted) {
                return redirect()->route('admin.ras_hewan.index')
                    ->with('success', 'Ras hewan berhasil dihapus.');
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
        // Query Builder: Get all jenis hewan
        $jenisHewan = \DB::table('jenis_hewan')->get();
        return view('admin.ras_hewan.create', compact('jenisHewan'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $this->validateRasHewan($request);

        // Helper untuk menyimpan data
        $rasHewan = $this->createRasHewan($validatedData);

        return redirect()->route('admin.ras_hewan.index')
            ->with('success', 'Ras hewan berhasil ditambahkan.');
    }

    // Validation Helper
    protected function validateRasHewan(Request $request, $id = null)
    {
        $uniqueRule = $id ?
            'unique:ras_hewan,nama_ras,' . $id . ',idras_hewan' :
            'unique:ras_hewan,nama_ras';

        return $request->validate([
            'nama_ras' => [
                'required',
                'string',
                'max:255',
                'min:3',
                $uniqueRule
            ],
            'idjenis_hewan' => [
                'required',
                'exists:jenis_hewan,idjenis_hewan'
            ],
        ], [
            'nama_ras.required' => 'Nama ras hewan wajib diisi.',
            'nama_ras.unique' => 'Nama ras hewan sudah ada.',
            'nama_ras.min' => 'Nama ras hewan minimal 3 karakter.',
            'nama_ras.max' => 'Nama ras hewan maksimal 255 karakter.',
            'idjenis_hewan.required' => 'Jenis hewan wajib dipilih.',
            'idjenis_hewan.exists' => 'Jenis hewan yang dipilih tidak valid.',
        ]);
    }

    // Helper untuk membuat data baru
    protected function createRasHewan(array $data)
    {
        try {
            // Query Builder: Insert data
            \DB::table('ras_hewan')->insert([
                'nama_ras' => $this->formatNamaRasHewan($data['nama_ras']),
                'idjenis_hewan' => $data['idjenis_hewan'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
            return true;
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan data ras hewan: ' . $e->getMessage());
        }
    }

    // Helper untuk format nama menjadi Title Case
    protected function formatNamaRasHewan($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}
