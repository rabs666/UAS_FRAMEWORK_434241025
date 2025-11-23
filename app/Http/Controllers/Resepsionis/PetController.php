<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetController extends Controller
{
    public function index()
    {
        $pets = DB::table('pet')
            ->leftJoin('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
            ->leftJoin('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->leftJoin('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->leftJoin('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pet.*', 'jenis_hewan.nama_jenis_hewan', 'ras_hewan.nama_ras', 'user.nama as nama_pemilik', 'pemilik.no_wa')
            ->orderBy('pet.id_pet', 'desc')
            ->paginate(10);

        return view('Resepsionis.Pet.index', compact('pets'));
    }

    public function create()
    {
        $ras = DB::table('ras_hewan')
            ->leftJoin('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->select('ras_hewan.*', 'jenis_hewan.nama_jenis_hewan')
            ->get();
        $pemilik = DB::table('pemilik')
            ->leftJoin('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pemilik.*', 'user.nama as nama_pemilik')
            ->get();
        return view('Resepsionis.Pet.create', compact('ras', 'pemilik'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pet' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'idras_hewan' => 'required|exists:ras_hewan,idras_hewan',
            'idpemilik' => 'required|exists:pemilik,idpemilik',
        ]);

        try {
            DB::table('pet')->insert([
                'nama_pet' => $validated['nama_pet'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
                'tanggal_lahir' => $validated['tanggal_lahir'],
                'idras_hewan' => $validated['idras_hewan'],
                'idpemilik' => $validated['idpemilik'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('resepsionis.pet.index')
                ->with('success', 'Data pet berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menambahkan data: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit($id)
    {
        $pet = DB::table('pet')->where('id_pet', $id)->first();

        if (!$pet) {
            return redirect()->route('resepsionis.pet.index')
                ->with('error', 'Data tidak ditemukan.');
        }

        $ras = DB::table('ras_hewan')
            ->leftJoin('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->select('ras_hewan.*', 'jenis_hewan.nama_jenis_hewan')
            ->get();
        $pemilik = DB::table('pemilik')
            ->leftJoin('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pemilik.*', 'user.nama as nama_pemilik')
            ->get();
        return view('Resepsionis.Pet.edit', compact('pet', 'ras', 'pemilik'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_pet' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'idras_hewan' => 'required|exists:ras_hewan,idras_hewan',
            'idpemilik' => 'required|exists:pemilik,idpemilik',
        ]);

        try {
            $updated = DB::table('pet')
                ->where('id_pet', $id)
                ->update([
                    'nama_pet' => $validated['nama_pet'],
                    'jenis_kelamin' => $validated['jenis_kelamin'],
                    'tanggal_lahir' => $validated['tanggal_lahir'],
                    'idras_hewan' => $validated['idras_hewan'],
                    'idpemilik' => $validated['idpemilik'],
                    'updated_at' => now(),
                ]);

            if ($updated) {
                return redirect()->route('resepsionis.pet.index')
                    ->with('success', 'Data pet berhasil diupdate.');
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
            $deleted = DB::table('pet')->where('id_pet', $id)->delete();

            if ($deleted) {
                return redirect()->route('resepsionis.pet.index')
                    ->with('success', 'Data pet berhasil dihapus.');
            }

            return redirect()->back()
                ->with('error', 'Gagal menghapus data.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
