<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisHewan;
use Illuminate\Support\Facades\DB;

class JenisHewanController extends Controller
{
    public function create()
    {
        return view('admin.jenis_hewan.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $this->validateJenisHewan($request);

        // Helper untuk menyimpan data
        $jenisHewan = $this->createJenisHewan($validatedData);

        return redirect()->route('admin.jenis_hewan.index')
            ->with('success', 'Jenis hewan berhasil ditambahkan.');
    }

    public function index()
    {
        $jenisHewan = DB::table('jenis_hewan')->get();
        return view('admin.jenis_hewan.index', compact('jenisHewan'));
    }

    public function validateJenisHewan(Request $request, $id = null)
    {
       // data yang berdifat unik
         $uniqueRule = $id ?
         'unique:jenis_hewan,nama_jenis_hewan,' .$id . ',idjenis_hewan' :
         'unique:jenis_hewan,nama_jenis_hewan';

         // validasi data input
         return $request->validate([
             'nama_jenis_hewan' => [
                    'required',
                    'string',
                    'max:255',
                    'min:3',
                    $uniqueRule
             ],
            ], [
             'nama_jenis_hewan.required' => 'Nama jenis hewan wajib diisi.',
             'nama_jenis_hewan.unique' => 'Nama jenis hewan sudah ada.',
             'nama_jenis_hewan.min' => 'Nama jenis hewan minimal 3 karakter.',
             'nama_jenis_hewan.max' => 'Nama jenis hewan maksimal 255 karakter.',
             'nama_jenis_hewan.string' => 'Nama jenis hewan harus berupa teks.',
         ]);
    }

    protected function createJenisHewan(array $data)
    {
        try {
            //query builder
            $jenisHewan = DB::table('jenis_hewan')->insert(['nama_jenis_hewan' => $this->formatNamaJenisHewan($data['nama_jenis_hewan'])]);
            return $jenisHewan;
        } catch (\Exception $e) {
            throw new \Exception('Gagal menympan data jenis hewan: ' .$e->getMessage());
        }
    }
    protected function formatNamaJenisHewan($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}
