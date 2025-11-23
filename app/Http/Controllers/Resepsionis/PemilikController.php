<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemilikController extends Controller
{
    public function index()
    {
        $pemilik = DB::table('pemilik')
            ->leftJoin('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pemilik.*', 'user.nama as nama_pemilik')
            ->orderBy('pemilik.idpemilik', 'desc')
            ->paginate(10);

        return view('Resepsionis.Pemilik.index', compact('pemilik'));
    }

    public function create()
    {
        return view('Resepsionis.Pemilik.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'alamat' => 'nullable|string',
            'no_wa' => 'required|string|max:20',
        ]);

        try {
            DB::table('pemilik')->insert([
                'alamat' => $validated['alamat'],
                'no_wa' => $validated['no_wa'],
            ]);

            return redirect()->route('resepsionis.pemilik.index')
                ->with('success', 'Data pemilik berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menambahkan data: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit($id)
    {
        $pemilik = DB::table('pemilik')
            ->leftJoin('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pemilik.*', 'user.nama as nama_pemilik')
            ->where('pemilik.idpemilik', $id)
            ->first();

        if (!$pemilik) {
            return redirect()->route('resepsionis.pemilik.index')
                ->with('error', 'Data tidak ditemukan.');
        }

        return view('Resepsionis.Pemilik.edit', compact('pemilik'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'alamat' => 'nullable|string',
            'no_wa' => 'required|string|max:20',
        ]);

        try {
            $updated = DB::table('pemilik')
                ->where('idpemilik', $id)
                ->update([
                    'alamat' => $validated['alamat'],
                    'no_wa' => $validated['no_wa'],
                ]);

            if ($updated) {
                return redirect()->route('resepsionis.pemilik.index')
                    ->with('success', 'Data pemilik berhasil diupdate.');
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
            $deleted = DB::table('pemilik')->where('idpemilik', $id)->delete();

            if ($deleted) {
                return redirect()->route('resepsionis.pemilik.index')
                    ->with('success', 'Data pemilik berhasil dihapus.');
            }

            return redirect()->back()
                ->with('error', 'Gagal menghapus data.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
