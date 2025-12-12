<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailRekamMedisController extends Controller
{
    public function index()
    {
        $detailRekam = DB::table('detail_rekaman_medis')
            ->leftJoin('rekam_medis', 'detail_rekaman_medis.idrekam_medis', '=', 'rekam_medis.idrekam_medis')
            ->leftJoin('pet', 'rekam_medis.id_pet', '=', 'pet.id_pet')
            ->leftJoin('kode_tindakan_terapi', 'detail_rekaman_medis.idkode_tindakan_terapi', '=', 'kode_tindakan_terapi.idkode_tindakan_terapi')
            ->select(
                'detail_rekaman_medis.*',
                'pet.nama_pet',
                'rekam_medis.tanggal',
                'kode_tindakan_terapi.kode',
                'kode_tindakan_terapi.deskripsi_tindakan_terapi'
            )
            ->whereNull('detail_rekaman_medis.deleted_at')
            ->orderBy('rekam_medis.tanggal', 'desc')
            ->paginate(10);

        return view('Admin.DetailRekamMedis.index', compact('detailRekam'));
    }

    public function create()
    {
        $rekamMedis = DB::table('rekam_medis')
            ->join('pet', 'rekam_medis.id_pet', '=', 'pet.id_pet')
            ->select('rekam_medis.idrekam_medis', 'pet.nama_pet', 'rekam_medis.tanggal')
            ->get();
        $kodeTindakan = DB::table('kode_tindakan_terapi')->get();

        return view('Admin.DetailRekamMedis.create', compact('rekamMedis', 'kodeTindakan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'idrekam_medis' => 'required|exists:rekam_medis,idrekam_medis',
            'idkode_tindakan_terapi' => 'required|exists:kode_tindakan_terapi,idkode_tindakan_terapi',
            'hasil' => 'nullable|string',
            'catatan' => 'nullable|string',
        ]);

        try {
            DB::table('detail_rekaman_medis')->insert([
                'idrekam_medis' => $validated['idrekam_medis'],
                'idkode_tindakan_terapi' => $validated['idkode_tindakan_terapi'],
                'hasil' => $validated['hasil'],
                'catatan' => $validated['catatan'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('admin.detail_rekam_medis.index')
                ->with('success', 'Data detail rekam medis berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menambahkan data: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit($id)
    {
        $detailRekam = DB::table('detail_rekaman_medis')->where('iddetail_rekaman_medis', $id)->first();

        if (!$detailRekam) {
            return redirect()->route('admin.detail_rekam_medis.index')
                ->with('error', 'Data tidak ditemukan.');
        }

        $rekamMedis = DB::table('rekam_medis')
            ->join('pet', 'rekam_medis.id_pet', '=', 'pet.id_pet')
            ->select('rekam_medis.idrekam_medis', 'pet.nama_pet', 'rekam_medis.tanggal')
            ->get();
        $kodeTindakan = DB::table('kode_tindakan_terapi')->get();

        return view('Admin.DetailRekamMedis.edit', compact('detailRekam', 'rekamMedis', 'kodeTindakan'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'idrekam_medis' => 'required|exists:rekam_medis,idrekam_medis',
            'idkode_tindakan_terapi' => 'required|exists:kode_tindakan_terapi,idkode_tindakan_terapi',
            'hasil' => 'nullable|string',
            'catatan' => 'nullable|string',
        ]);

        try {
            $updated = DB::table('detail_rekaman_medis')
                ->where('iddetail_rekaman_medis', $id)
                ->update([
                    'idrekam_medis' => $validated['idrekam_medis'],
                    'idkode_tindakan_terapi' => $validated['idkode_tindakan_terapi'],
                    'hasil' => $validated['hasil'],
                    'catatan' => $validated['catatan'],
                    'updated_at' => now(),
                ]);

            if ($updated) {
                return redirect()->route('admin.detail_rekam_medis.index')
                    ->with('success', 'Data detail rekam medis berhasil diupdate.');
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
            $deleted = DB::table('detail_rekaman_medis')
                ->where('iddetail_rekaman_medis', $id)
                ->update([
                    'deleted_at' => now(),
                    'deleted_by' => auth()->id(),
                ]);

            if ($deleted) {
                return redirect()->route('admin.detail_rekam_medis.index')
                    ->with('success', 'Data detail rekam medis berhasil dihapus.');
            }

            return redirect()->back()
                ->with('error', 'Gagal menghapus data.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
