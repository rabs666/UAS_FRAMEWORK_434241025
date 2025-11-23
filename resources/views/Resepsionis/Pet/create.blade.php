@extends('layouts.lte.main')

@section('title', 'Tambah Pet')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Tambah Pet</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('resepsionis.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('resepsionis.pet.index') }}">Pet</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Pet</h3>
                    </div>
                    <form action="{{ route('resepsionis.pet.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @if(session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <div class="mb-3">
                                <label for="nama_pet" class="form-label">Nama Pet <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_pet') is-invalid @enderror" 
                                       id="nama_pet" name="nama_pet" value="{{ old('nama_pet') }}" required>
                                @error('nama_pet')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select class="form-select @error('jenis_kelamin') is-invalid @enderror" 
                                        id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                       id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="idras_hewan" class="form-label">Jenis & Ras Hewan <span class="text-danger">*</span></label>
                                <select class="form-select @error('idras_hewan') is-invalid @enderror" 
                                        id="idras_hewan" name="idras_hewan" required>
                                    <option value="">Pilih Jenis & Ras Hewan</option>
                                    @foreach($ras as $r)
                                        <option value="{{ $r->idras_hewan }}" {{ old('idras_hewan') == $r->idras_hewan ? 'selected' : '' }}>
                                            {{ $r->nama_jenis_hewan ?? 'Jenis Tidak Diketahui' }} - {{ $r->nama_ras }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('idras_hewan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="idpemilik" class="form-label">Pemilik <span class="text-danger">*</span></label>
                                <select class="form-select @error('idpemilik') is-invalid @enderror" 
                                        id="idpemilik" name="idpemilik" required>
                                    <option value="">Pilih Pemilik</option>
                                    @foreach($pemilik as $p)
                                        <option value="{{ $p->idpemilik }}" {{ old('idpemilik') == $p->idpemilik ? 'selected' : '' }}>
                                            {{ $p->nama_pemilik ?? 'Nama tidak tersedia' }} - {{ $p->no_wa ?? 'No WA tidak tersedia' }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('idpemilik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan
                            </button>
                            <a href="{{ route('resepsionis.pet.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
