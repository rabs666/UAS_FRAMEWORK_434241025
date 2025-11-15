@extends('layouts.lte.main')

@section('title', 'Tambah Kategori')

@section('content')
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Tambah Kategori</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Master Data</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.kategori.index') }}">Kategori</a></li>
            <li class="breadcrumb-item active">Tambah</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form Tambah Kategori</h3>
            </div>
            <form action="{{ route('admin.kategori.store') }}" method="POST">
              @csrf
              <div class="card-body">
                <div class="mb-3">
                  <label for="nama_kategori" class="form-label">Nama Kategori</label>
                  <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" 
                         id="nama_kategori" name="nama_kategori" 
                         placeholder="Masukkan nama kategori" 
                         value="{{ old('nama_kategori') }}">
                  @error('nama_kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                  <i class="bi bi-save"></i> Simpan
                </button>
                <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">
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