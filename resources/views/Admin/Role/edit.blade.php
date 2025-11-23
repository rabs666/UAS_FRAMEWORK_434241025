@extends('layouts.lte.main')

@section('title', 'Edit Role')

@section('content')
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Edit Role</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Master Data</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.role.index') }}">Role</a></li>
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
              <h3 class="card-title">Form Edit Role</h3>
            </div>
            <form action="{{ route('admin.role.update', $role->idrole) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="mb-3">
                  <label for="nama_role" class="form-label">Nama Role</label>
                  <input type="text" class="form-control @error('nama_role') is-invalid @enderror" 
                         id="nama_role" name="nama_role" 
                         placeholder="Masukkan nama role" 
                         value="{{ old('nama_role', $role->nama_role) }}">
                  @error('nama_role')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-info">
                  <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('admin.role.index') }}" class="btn btn-secondary">
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
