@extends('layouts.lte.main')

@section('title', 'Role - Master Data')

@section('content')
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Role</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Master Data</a></li>
            <li class="breadcrumb-item active">Role</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
          <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif
      
      @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
          <i class="bi bi-exclamation-triangle me-1"></i> {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Data Role</h3>
              <div class="card-tools">
                <a href="{{ route('admin.role.create') }}" class="btn btn-primary btn-sm">
                  <i class="bi bi-plus-circle"></i> Tambah Data
                </a>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama Role</th>
                    <th style="width: 150px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($roles as $index => $item)
                    <tr>
                      <td>{{ ($roles->currentPage() - 1) * $roles->perPage() + $index + 1 }}</td>
                      <td>{{ $item->nama_role }}</td>
                      <td>
                        <a href="{{ route('admin.role.edit', $item->idrole) }}" class="btn btn-sm btn-info">
                          <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.role.destroy', $item->idrole) }}" method="POST" style="display: inline-block;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                            <i class="bi bi-trash"></i> Delete
                          </button>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr><td colspan="3" class="text-center">Tidak ada data</td></tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <div class="card-footer clearfix">
              {{ $roles->links('pagination::bootstrap-5') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
