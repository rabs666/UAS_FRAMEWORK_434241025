@extends('layouts.lte.app')

@section('title', 'Rekam Medis - Perawat')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Rekam Medis</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('perawat.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Rekam Medis</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Rekam Medis</h3>
                    <div class="card-tools">
                        <a href="{{ route('perawat.rekam_medis.create') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-circle"></i> Tambah Data
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
                                    <th>Tanggal</th>
                                    <th>Nama Pet</th>
                                    <th>Keluhan</th>
                                    <th>Diagnosa</th>
                                    <th>Dokter</th>
                                    <th>Perawat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($rekamMedis as $index => $item)
                                <tr>
                                    <td>{{ $rekamMedis->firstItem() + $index }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                    <td>{{ $item->nama_pet }}</td>
                                    <td>{{ $item->keluhan }}</td>
                                    <td>{{ $item->diagnosa ?? '-' }}</td>
                                    <td>{{ $item->nama_dokter ?? '-' }}</td>
                                    <td>{{ $item->nama_perawat ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('perawat.rekam_medis.edit', $item->idrekam_medis) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('perawat.rekam_medis.destroy', $item->idrekam_medis) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $rekamMedis->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
