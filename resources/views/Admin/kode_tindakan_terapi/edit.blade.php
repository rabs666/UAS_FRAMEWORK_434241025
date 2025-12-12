@extends('layouts.lte.main')

@section('title', 'Edit Kode Tindakan Terapi')

@section('content')
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Edit Kode Tindakan Terapi</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.kode_tindakan_terapi.index') }}">Kode Tindakan Terapi</a></li>
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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Form Edit Kode Tindakan Terapi</h3>
            </div>
            
            <form action="{{ route('admin.kode_tindakan_terapi.update', $kodeTindakan->idkode_tindakan_terapi) }}" method="POST">
              @csrf
              @method('PUT')
              
              <div class="card-body">
                
                @if($errors->any())
                  <div class="alert alert-danger alert-dismissible fade show">
                    <h5><i class="bi bi-exclamation-triangle"></i> Error!</h5>
                    <ul class="mb-0">
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  </div>
                @endif

                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="kode" class="form-label">
                        Kode <span class="text-danger">*</span>
                      </label>
                      <input type="text" 
                             class="form-control @error('kode') is-invalid @enderror" 
                             id="kode" 
                             name="kode" 
                             value="{{ old('kode', $kodeTindakan->kode) }}" 
                             placeholder="Contoh: T001"
                             style="text-transform: uppercase;"
                             required>
                      @error('kode')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      <small class="form-text text-muted">
                        Kode unik untuk tindakan terapi (akan diubah menjadi huruf besar)
                      </small>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="idkategori" class="form-label">
                        Kategori <span class="text-danger">*</span>
                      </label>
                      <select class="form-select @error('idkategori') is-invalid @enderror" 
                              id="idkategori" 
                              name="idkategori" 
                              required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategori as $kat)
                          <option value="{{ $kat->idkategori }}" 
                                  {{ old('idkategori', $kodeTindakan->idkategori) == $kat->idkategori ? 'selected' : '' }}>
                            {{ $kat->nama_kategori }}
                          </option>
                        @endforeach
                      </select>
                      @error('idkategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="idkategori_klinis" class="form-label">
                        Kategori Klinis <span class="text-danger">*</span>
                      </label>
                      <select class="form-select @error('idkategori_klinis') is-invalid @enderror" 
                              id="idkategori_klinis" 
                              name="idkategori_klinis" 
                              required>
                        <option value="">-- Pilih Kategori Klinis --</option>
                        @foreach($kategoriKlinis as $katKlinis)
                          <option value="{{ $katKlinis->idkategori_klinis }}" 
                                  {{ old('idkategori_klinis', $kodeTindakan->idkategori_klinis) == $katKlinis->idkategori_klinis ? 'selected' : '' }}>
                            {{ $katKlinis->nama_kategori_klinis }}
                          </option>
                        @endforeach
                      </select>
                      @error('idkategori_klinis')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="deskripsi_tindakan_terapi" class="form-label">
                    Deskripsi Tindakan Terapi <span class="text-danger">*</span>
                  </label>
                  <textarea class="form-control @error('deskripsi_tindakan_terapi') is-invalid @enderror" 
                            id="deskripsi_tindakan_terapi" 
                            name="deskripsi_tindakan_terapi" 
                            rows="4" 
                            placeholder="Masukkan deskripsi detail tindakan terapi"
                            required>{{ old('deskripsi_tindakan_terapi', $kodeTindakan->deskripsi_tindakan_terapi) }}</textarea>
                  @error('deskripsi_tindakan_terapi')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                  <small class="form-text text-muted">
                    Deskripsikan tindakan terapi secara lengkap dan jelas
                  </small>
                </div>

              </div>
              
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                  <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('admin.kode_tindakan_terapi.index') }}" class="btn btn-secondary">
                  <i class="bi bi-x-circle"></i> Batal
                </a>
              </div>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
