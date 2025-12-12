@extends('layouts.lte.main')

@section('title', 'Kode Tindakan Terapi - Master Data')

@section('content')
  {{-- Content Header --}}
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Kode Tindakan Terapi</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Master Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kode Tindakan Terapi</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  {{-- Main Content --}}
  <div class="app-content">
    <div class="container-fluid">
      
      {{-- Alert Messages --}}
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      
      @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="bi bi-exclamation-triangle me-1"></i> {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Data Kode Tindakan Terapi</h3>
              <div class="card-tools">
                <a href="{{ route('admin.kode_tindakan_terapi.create') }}" class="btn btn-primary btn-sm">
                  <i class="bi bi-plus-circle"></i> Tambah Data
                </a>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 100px">Kode</th>
                    <th>Deskripsi Tindakan Terapi</th>
                    <th style="width: 150px">Kategori</th>
                    <th style="width: 150px">Kategori Klinis</th>
                    <th style="width: 150px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($kodeTindakanTerapi as $index => $kode)
                    <tr>
                      <td>{{ ($kodeTindakanTerapi->currentPage() - 1) * $kodeTindakanTerapi->perPage() + $index + 1 }}</td>
                      <td><span class="badge bg-primary">{{ $kode->kode }}</span></td>
                      <td>{{ $kode->deskripsi_tindakan_terapi }}</td>
                      <td>{{ $kode->nama_kategori }}</td>
                      <td>{{ $kode->nama_kategori_klinis }}</td>
                      <td>
                        <a href="{{ route('admin.kode_tindakan_terapi.edit', $kode->idkode_tindakan_terapi) }}" 
                           class="btn btn-sm btn-info" title="Edit">
                          <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.kode_tindakan_terapi.destroy', $kode->idkode_tindakan_terapi) }}" 
                              method="POST" style="display: inline-block;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                  onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <i class="bi bi-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="6" class="text-center">Tidak ada data</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <div class="card-footer clearfix">
              {{ $kodeTindakanTerapi->links('pagination::bootstrap-5') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
