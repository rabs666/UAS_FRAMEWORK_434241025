@extends('layouts.lte.main')

@section('title', 'Edit Kategori Klinis')

@section('content')
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Edit Kategori Klinis</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Master Data</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.kategori_klinis.index') }}">Kategori Klinis</a></li>
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
              <h3 class="card-title">Form Edit Kategori Klinis</h3>
            </div>
            <form action="{{ route('admin.kategori_klinis.update', $kategoriKlinis->idkategori_klinis) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="mb-3">
                  <label for="nama_kategori_klinis" class="form-label">Nama Kategori Klinis</label>
                  <input type="text" class="form-control @error('nama_kategori_klinis') is-invalid @enderror" 
                         id="nama_kategori_klinis" name="nama_kategori_klinis" 
                         placeholder="Masukkan nama kategori klinis" 
                         value="{{ old('nama_kategori_klinis', $kategoriKlinis->nama_kategori_klinis) }}">
                  @error('nama_kategori_klinis')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-info">
                  <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('admin.kategori_klinis.index') }}\" class="btn btn-secondary">
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
