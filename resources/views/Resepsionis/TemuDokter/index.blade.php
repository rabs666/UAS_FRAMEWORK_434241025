@extends('layouts.lte.main')

@section('title', 'Data Temu Dokter')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Data Temu Dokter</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('resepsionis.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Temu Dokter</li>
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
                        <a href="{{ route('resepsionis.temu_dokter.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah Temu Dokter
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
                                        <th>ID</th>
                                        <th>Nama Pet</th>
                                        <th>Dokter</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Keluhan Awal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($temuDokter as $index => $td)
                                        <tr>
                                            <td>{{ $temuDokter->firstItem() + $index }}</td>
                                            <td>{{ $td->id_temu_dokter }}</td>
                                            <td>{{ $td->nama_pet ?? '-' }}</td>
                                            <td>{{ $td->nama_dokter ?? '-' }}</td>
                                            <td>{{ date('d-m-Y', strtotime($td->tanggal_temu)) }}</td>
                                            <td>{{ $td->jam_temu }}</td>
                                            <td>{{ $td->keluhan_awal ?? '-' }}</td>
                                            <td>
                                                @if($td->status == 'Menunggu')
                                                    <span class="badge bg-warning">{{ $td->status }}</span>
                                                @elseif($td->status == 'Selesai')
                                                    <span class="badge bg-success">{{ $td->status }}</span>
                                                @else
                                                    <span class="badge bg-danger">{{ $td->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('resepsionis.temu_dokter.edit', $td->id_temu_dokter) }}" class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </a>
                                                <form action="{{ route('resepsionis.temu_dokter.destroy', $td->id_temu_dokter) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                            {{ $temuDokter->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
