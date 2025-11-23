@extends('layouts.app')

@section('title', 'Tambah Pemilik - Admin RSHP')

@section('content')
    <div style="background:#fff;padding:2rem;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.06)">
        <div style="margin-bottom:1.5rem">
            <h2 style="color:#2463d6;font-size:1.75rem;margin-bottom:0.5rem">Tambah Pemilik</h2>
            <a href="{{ route('admin.pemilik.index') }}" style="color:#6b7280;text-decoration:none;font-size:0.875rem">← Kembali ke Daftar Pemilik</a>
        </div>

        @if($errors->any())
            <div style="background:#fee;border:1px solid #fcc;color:#c33;padding:1rem;border-radius:6px;margin-bottom:1.5rem">
                <ul style="margin:0;padding-left:1.5rem">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.pemilik.store') }}" method="POST">
            @csrf
            
            <div style="margin-bottom:1.5rem">
                <label style="display:block;margin-bottom:0.5rem;color:#1f2937;font-weight:600">User *</label>
                <select name="iduser" required style="width:100%;padding:0.75rem;border:1px solid #d1d5db;border-radius:6px;font-size:1rem">
                    <option value="">-- Pilih User --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->iduser }}" {{ old('iduser') == $user->iduser ? 'selected' : '' }}>
                            {{ $user->nama }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
                <small style="color:#6b7280;font-size:0.875rem">Pilih user yang akan menjadi pemilik</small>
            </div>

            <div style="margin-bottom:1.5rem">
                <label style="display:block;margin-bottom:0.5rem;color:#1f2937;font-weight:600">Alamat *</label>
                <textarea name="alamat" required rows="3" style="width:100%;padding:0.75rem;border:1px solid #d1d5db;border-radius:6px;font-size:1rem;font-family:inherit">{{ old('alamat') }}</textarea>
                <small style="color:#6b7280;font-size:0.875rem">Masukkan alamat lengkap</small>
            </div>

            <div style="margin-bottom:1.5rem">
                <label style="display:block;margin-bottom:0.5rem;color:#1f2937;font-weight:600">No WhatsApp *</label>
                <input type="text" name="no_wa" value="{{ old('no_wa') }}" required style="width:100%;padding:0.75rem;border:1px solid #d1d5db;border-radius:6px;font-size:1rem" placeholder="Contoh: 081234567890">
                <small style="color:#6b7280;font-size:0.875rem">Masukkan nomor WhatsApp aktif</small>
            </div>

            <div style="display:flex;gap:1rem;margin-top:2rem">
                <button type="submit" style="background:#2463d6;color:#fff;padding:0.75rem 2rem;border:none;border-radius:6px;font-size:1rem;font-weight:600;cursor:pointer">
                    Simpan
                </button>
                <a href="{{ route('admin.pemilik.index') }}" style="background:#6b7280;color:#fff;padding:0.75rem 2rem;border-radius:6px;text-decoration:none;font-weight:600;display:inline-block">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
