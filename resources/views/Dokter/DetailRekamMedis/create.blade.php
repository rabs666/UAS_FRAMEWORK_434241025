@extends('layouts.lte.app')

@section('title', 'Tambah Detail Rekam Medis - Dokter')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Tambah Detail Rekam Medis</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('dokter.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dokter.detail_rekam_medis.index') }}">Detail Rekam Medis</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Detail Rekam Medis</h3>
                </div>
                <form action="{{ route('dokter.detail_rekam_medis.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="idrekam_medis" class="form-label">Rekam Medis <span class="text-danger">*</span></label>
                            <select class="form-select @error('idrekam_medis') is-invalid @enderror" id="idrekam_medis" name="idrekam_medis" required>
                                <option value="">-- Pilih Rekam Medis --</option>
                                @foreach($rekamMedis as $rm)
                                    <option value="{{ $rm->idrekam_medis }}" {{ old('idrekam_medis') == $rm->idrekam_medis ? 'selected' : '' }}>
                                        {{ $rm->nama_pet }} - {{ \Carbon\Carbon::parse($rm->tanggal)->format('d-m-Y') }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idrekam_medis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="idkode_tindakan_terapi" class="form-label">Tindakan Terapi <span class="text-danger">*</span></label>
                            <select class="form-select @error('idkode_tindakan_terapi') is-invalid @enderror" id="idkode_tindakan_terapi" name="idkode_tindakan_terapi" required>
                                <option value="">-- Pilih Tindakan --</option>
                                @foreach($kodeTindakan as $kt)
                                    <option value="{{ $kt->idkode_tindakan_terapi }}" {{ old('idkode_tindakan_terapi') == $kt->idkode_tindakan_terapi ? 'selected' : '' }}>
                                        {{ $kt->kode }} - {{ $kt->deskripsi_tindakan_terapi }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idkode_tindakan_terapi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="hasil" class="form-label">Hasil</label>
                            <textarea class="form-control @error('hasil') is-invalid @enderror" id="hasil" name="hasil" rows="3">{{ old('hasil') }}</textarea>
                            @error('hasil')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="catatan" class="form-label">Catatan</label>
                            <textarea class="form-control @error('catatan') is-invalid @enderror" id="catatan" name="catatan" rows="3">{{ old('catatan') }}</textarea>
                            @error('catatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('dokter.detail_rekam_medis.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
