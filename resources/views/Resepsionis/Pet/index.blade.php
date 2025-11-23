@extends('layouts.lte.main')

@section('title', 'Data Pet')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Data Pet</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('resepsionis.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pet</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('resepsionis.pet.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah Pet
                        </a>
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
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Pet</th>
                                        <th>Nama Pet</th>
                                        <th>Jenis Hewan</th>
                                        <th>Ras</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Pemilik</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pets as $index => $pet)
                                        <tr>
                                            <td>{{ $pets->firstItem() + $index }}</td>
                                            <td>{{ $pet->id_pet }}</td>
                                            <td>{{ $pet->nama_pet }}</td>
                                            <td>{{ $pet->nama_jenis_hewan ?? '-' }}</td>
                                            <td>{{ $pet->nama_ras ?? '-' }}</td>
                                            <td>{{ $pet->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                            <td>{{ date('d-m-Y', strtotime($pet->tanggal_lahir)) }}</td>
                                            <td>{{ $pet->nama_pemilik ?? 'Tidak ada' }}<br><small class="text-muted">{{ $pet->no_wa ?? '-' }}</small></td>
                                            <td>
                                                <a href="{{ route('resepsionis.pet.edit', $pet->id_pet) }}" class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </a>
                                                <form action="{{ route('resepsionis.pet.destroy', $pet->id_pet) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $pets->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
