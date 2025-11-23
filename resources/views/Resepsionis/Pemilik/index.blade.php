@extends('layouts.lte.main')

@section('title', 'Data Pemilik - Resepsionis')

@section('content')
  {{-- Content Header --}}
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Data Pemilik</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('resepsionis.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Pemilik</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  {{-- Main Content --}}
  <div class="app-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Pemilik</h3>
              <div class="card-tools">
                <a href="{{ route('resepsionis.pemilik.create') }}" class="btn btn-primary btn-sm">
                  <i class="bi bi-plus-circle"></i> Tambah Pemilik
                </a>
              </div>
            </div>
            <div class="card-body">
              @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
              @endif
              @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('error') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
              @endif

              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID</th>
                      <th>Nama Pemilik</th>
                      <th>Alamat</th>
                      <th>No WA</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($pemilik as $index => $item)
                    <tr>
                      <td>{{ $pemilik->firstItem() + $index }}</td>
                      <td>{{ $item->idpemilik }}</td>
                      <td>{{ $item->nama_pemilik ?? 'Tidak ada' }}</td>
                      <td>{{ $item->alamat ?? '-' }}</td>
                      <td>{{ $item->no_wa ?? '-' }}</td>
                      <td>
                        <a href="{{ route('resepsionis.pemilik.edit', $item->idpemilik) }}" class="btn btn-warning btn-sm">
                          <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('resepsionis.pemilik.destroy', $item->idpemilik) }}" method="POST" style="display:inline-block;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                            <i class="bi bi-trash"></i> Hapus
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

              <div class="mt-3">
                {{ $pemilik->links('pagination::bootstrap-5') }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
