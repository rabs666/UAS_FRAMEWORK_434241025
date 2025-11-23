@extends('layouts.lte.main')

@section('title', 'Edit Rekam Medis')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Edit Rekam Medis</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.rekam_medis.index') }}">Rekam Medis</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Rekam Medis</h3>
                    </div>
                    <form action="{{ route('admin.rekam_medis.update', $rekamMedis->idrekam_medis) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="id_pet" class="form-label">Pet <span class="text-danger">*</span></label>
                                        <select class="form-select @error('id_pet') is-invalid @enderror" 
                                                id="id_pet" name="id_pet" required>
                                            <option value="">Pilih Pet</option>
                                            @foreach($pets as $pet)
                                                <option value="{{ $pet->id_pet }}" 
                                                    {{ old('id_pet', $rekamMedis->id_pet) == $pet->id_pet ? 'selected' : '' }}>
                                                    {{ $pet->nama_pet }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_pet')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" 
                                               id="tanggal" name="tanggal" value="{{ old('tanggal', $rekamMedis->tanggal) }}" required>
                                        @error('tanggal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="keluhan" class="form-label">Keluhan <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('keluhan') is-invalid @enderror" 
                                          id="keluhan" name="keluhan" rows="3" required>{{ old('keluhan', $rekamMedis->keluhan) }}</textarea>
                                @error('keluhan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="diagnosa" class="form-label">Diagnosa</label>
                                <textarea class="form-control @error('diagnosa') is-invalid @enderror" 
                                          id="diagnosa" name="diagnosa" rows="3">{{ old('diagnosa', $rekamMedis->diagnosa) }}</textarea>
                                @error('diagnosa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="id_perawat" class="form-label">Perawat</label>
                                        <select class="form-select @error('id_perawat') is-invalid @enderror" 
                                                id="id_perawat" name="id_perawat">
                                            <option value="">Pilih Perawat</option>
                                            @foreach($perawats as $perawat)
                                                <option value="{{ $perawat->id_perawat }}" 
                                                    {{ old('id_perawat', $rekamMedis->id_perawat) == $perawat->id_perawat ? 'selected' : '' }}>
                                                    {{ $perawat->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_perawat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="id_dokter" class="form-label">Dokter</label>
                                        <select class="form-select @error('id_dokter') is-invalid @enderror" 
                                                id="id_dokter" name="id_dokter">
                                            <option value="">Pilih Dokter</option>
                                            @foreach($dokters as $dokter)
                                                <option value="{{ $dokter->id_dokter }}" 
                                                    {{ old('id_dokter', $rekamMedis->id_dokter) == $dokter->id_dokter ? 'selected' : '' }}>
                                                    {{ $dokter->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_dokter')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Update
                            </button>
                            <a href="{{ route('admin.rekam_medis.index') }}" class="btn btn-secondary">
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
