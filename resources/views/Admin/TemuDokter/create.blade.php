@extends('layouts.lte.main')

@section('title', 'Tambah Temu Dokter')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Tambah Temu Dokter</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.temu_dokter.index') }}">Temu Dokter</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Temu Dokter</h3>
                    </div>
                    <form action="{{ route('admin.temu_dokter.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="id_pet" class="form-label">Pet <span class="text-danger">*</span></label>
                                <select class="form-select @error('id_pet') is-invalid @enderror" 
                                        id="id_pet" name="id_pet" required>
                                    <option value="">Pilih Pet</option>
                                    @foreach($pets as $pet)
                                        <option value="{{ $pet->id_pet }}" {{ old('id_pet') == $pet->id_pet ? 'selected' : '' }}>
                                            {{ $pet->nama_pet }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_pet')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="id_dokter" class="form-label">Dokter <span class="text-danger">*</span></label>
                                <select class="form-select @error('id_dokter') is-invalid @enderror" 
                                        id="id_dokter" name="id_dokter" required>
                                    <option value="">Pilih Dokter</option>
                                    @foreach($dokters as $dokter)
                                        <option value="{{ $dokter->id_dokter }}" {{ old('id_dokter') == $dokter->id_dokter ? 'selected' : '' }}>
                                            {{ $dokter->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_dokter')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tanggal_temu" class="form-label">Tanggal Temu <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control @error('tanggal_temu') is-invalid @enderror" 
                                               id="tanggal_temu" name="tanggal_temu" value="{{ old('tanggal_temu') }}" required>
                                        @error('tanggal_temu')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="jam_temu" class="form-label">Jam Temu <span class="text-danger">*</span></label>
                                        <input type="time" class="form-control @error('jam_temu') is-invalid @enderror" 
                                               id="jam_temu" name="jam_temu" value="{{ old('jam_temu') }}" required>
                                        @error('jam_temu')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="keluhan_awal" class="form-label">Keluhan Awal</label>
                                <textarea class="form-control @error('keluhan_awal') is-invalid @enderror" 
                                          id="keluhan_awal" name="keluhan_awal" rows="3">{{ old('keluhan_awal') }}</textarea>
                                @error('keluhan_awal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select @error('status') is-invalid @enderror" 
                                        id="status" name="status" required>
                                    <option value="Menunggu" {{ old('status') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                    <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="Batal" {{ old('status') == 'Batal' ? 'selected' : '' }}>Batal</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan
                            </button>
                            <a href="{{ route('admin.temu_dokter.index') }}" class="btn btn-secondary">
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
