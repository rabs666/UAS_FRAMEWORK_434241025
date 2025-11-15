@extends('layouts.lte.main')

@section('title', 'Edit Ras Hewan')

@section('content')
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Edit Ras Hewan</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Master Data</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.ras_hewan.index') }}">Ras Hewan</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Form Edit Ras Hewan</h3>
            </div>
            <form action="{{ route('admin.ras_hewan.update', $rasHewan->idras_hewan) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="mb-3">
                  <label for="idjenis_hewan" class="form-label">Jenis Hewan</label>
                  <select class="form-select @error('idjenis_hewan') is-invalid @enderror" 
                          id="idjenis_hewan" name="idjenis_hewan">
                    <option value="">-- Pilih Jenis Hewan --</option>
                    @foreach($jenisHewan as $jenis)
                      <option value="{{ $jenis->idjenis_hewan }}" 
                              {{ old('idjenis_hewan', $rasHewan->idjenis_hewan) == $jenis->idjenis_hewan ? 'selected' : '' }}>
                        {{ $jenis->nama_jenis_hewan }}
                      </option>
                    @endforeach
                  </select>
                  @error('idjenis_hewan')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="nama_ras" class="form-label">Nama Ras</label>
                  <input type="text" class="form-control @error('nama_ras') is-invalid @enderror" 
                         id="nama_ras" name="nama_ras" 
                         placeholder="Masukkan nama ras" 
                         value="{{ old('nama_ras', $rasHewan->nama_ras) }}">
                  @error('nama_ras')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-info">
                  <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('admin.ras_hewan.index') }}" class="btn btn-secondary">
                  <i class="bi bi-arrow-left"></i> Batal
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
