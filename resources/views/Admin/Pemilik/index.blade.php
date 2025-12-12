@extends('layouts.lte.main')

@section('title', 'Data Pemilik - Admin')

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
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pemilik</li>
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

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Data Pemilik</h3>
              <div class="card-tools">
                <a href="{{ route('admin.pemilik.create') }}" class="btn btn-primary btn-sm">
                  <i class="bi bi-plus-circle"></i> Tambah Data
                </a>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 80px">ID</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No WhatsApp</th>
                    <th style="width: 150px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($pemilik as $index => $item)
                    <tr>
                      <td>{{ $index + 1 }}</td>
                      <td><span class="badge bg-info">{{ $item->idpemilik }}</span></td>
                      <td>{{ $item->nama_user ?? '-' }}</td>
                      <td>{{ $item->email ?? '-' }}</td>
                      <td>{{ $item->alamat ?? '-' }}</td>
                      <td>{{ $item->no_wa ?? '-' }}</td>
                      <td>
                        <a href="{{ route('admin.pemilik.edit', $item->idpemilik) }}" 
                           class="btn btn-sm btn-info" title="Edit">
                          <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.pemilik.destroy', $item->idpemilik) }}" 
                              method="POST" style="display: inline-block;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                  onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <i class="bi bi-trash"></i> Delete
                          </button>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="7" class="text-center">Tidak ada data</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
