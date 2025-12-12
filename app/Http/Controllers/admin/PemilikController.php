<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\User;

class PemilikController extends Controller
{
    public function index()
    {
        $pemilik = \DB::table('pemilik')
            ->leftJoin('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pemilik.*', 'user.nama as nama_user', 'user.email')
            ->whereNull('pemilik.deleted_at')
            ->get();
        return view('admin.pemilik.index', compact('pemilik'));
    }

    public function create()
    {
        // Get only users with Pemilik role (idrole = 5)
        $users = User::whereHas('roleUsers', function($query) {
            $query->where('idrole', 5)->where('status', 1);
        })->get();
        return view('admin.pemilik.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required|exists:user,iduser',
            'alamat' => 'required|string|max:255',
            'no_wa' => 'required|string|max:20',
        ]);

        // Generate idpemilik manually (get max + 1)
        $maxId = Pemilik::max('idpemilik') ?? 0;
        
        Pemilik::create([
            'idpemilik' => $maxId + 1,
            'iduser' => $request->iduser,
            'alamat' => $request->alamat,
            'no_wa' => $request->no_wa,
        ]);

        return redirect()->route('admin.pemilik.index')->with('success', 'Data pemilik berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pemilik = Pemilik::findOrFail($id);
        // Get only users with Pemilik role (idrole = 5)
        $users = User::whereHas('roleUsers', function($query) {
            $query->where('idrole', 5)->where('status', 1);
        })->get();
        return view('admin.pemilik.edit', compact('pemilik', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'iduser' => 'required|exists:user,iduser',
            'alamat' => 'required|string|max:255',
            'no_wa' => 'required|string|max:20',
        ]);

        $pemilik = Pemilik::findOrFail($id);
        $pemilik->update($request->all());

        return redirect()->route('admin.pemilik.index')->with('success', 'Data pemilik berhasil diupdate!');
    }

    public function destroy($id)
    {
        // Soft delete manual untuk model tanpa timestamps
        \DB::table('pemilik')
            ->where('idpemilik', $id)
            ->update([
                'deleted_at' => now(),
                'deleted_by' => auth()->id(),
            ]);

        return redirect()->route('admin.pemilik.index')->with('success', 'Data pemilik berhasil dihapus!');
    }
}
