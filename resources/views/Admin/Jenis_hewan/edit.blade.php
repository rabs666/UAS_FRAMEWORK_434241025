@extends('layouts.lte.main')

@section('title', 'Edit Jenis Hewan')

@section('content')
  {{-- Content Header --}}
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Edit Jenis Hewan</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.jenis_hewan.index') }}">Jenis Hewan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  {{-- Main Content --}}
  <div class="app-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Form Edit Jenis Hewan</h3>
            </div>
            
            <form action="{{ route('admin.jenis_hewan.update', $jenisHewan->idjenis_hewan) }}" method="POST">
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

                <div class="mb-3">
                  <label for="nama_jenis_hewan" class="form-label">
                    Nama Jenis Hewan <span class="text-danger">*</span>
                  </label>
                  <input type="text" 
                         class="form-control @error('nama_jenis_hewan') is-invalid @enderror" 
                         id="nama_jenis_hewan" 
                         name="nama_jenis_hewan" 
                         value="{{ old('nama_jenis_hewan', $jenisHewan->nama_jenis_hewan) }}" 
                         placeholder="Masukkan nama jenis hewan"
                         required>
                  @error('nama_jenis_hewan')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                  <small class="form-text text-muted">
                    Contoh: Anjing, Kucing, Kelinci, dll.
                  </small>
                </div>

              </div>
              
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                  <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('admin.jenis_hewan.index') }}" class="btn btn-secondary">
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
