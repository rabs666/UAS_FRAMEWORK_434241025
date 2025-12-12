<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('iduser', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = \App\Models\Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|exists:role,idrole',
        ]);

        $user = User::create([
            'nama' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Create role_user entry
        \App\Models\Role_User::create([
            'iduser' => $user->iduser,
            'idrole' => $validated['role'],
            'status' => 1, // Active
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = \App\Models\Role::all();
        $currentRole = $user->roleUsers()->where('status', 1)->first();
        return view('admin.users.edit', compact('user', 'roles', 'currentRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email,' . $user->iduser . ',iduser',
            'password' => 'nullable|min:6|confirmed',
            'role' => 'required|exists:role,idrole',
        ]);

        $user->nama = $validated['name'];
        $user->email = $validated['email'];
        
        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }
        
        $user->save();

        // Update role - deactivate old role and create new one
        \App\Models\Role_User::where('iduser', $user->iduser)->update(['status' => 0]);
        
        // Check if role already exists for this user
        $existingRole = \App\Models\Role_User::where('iduser', $user->iduser)
            ->where('idrole', $validated['role'])
            ->first();
            
        if ($existingRole) {
            $existingRole->update(['status' => 1]);
        } else {
            \App\Models\Role_User::create([
                'iduser' => $user->iduser,
                'idrole' => $validated['role'],
                'status' => 1,
            ]);
        }

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Hard delete untuk user (tidak menggunakan soft delete)
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus!');
    }
}
