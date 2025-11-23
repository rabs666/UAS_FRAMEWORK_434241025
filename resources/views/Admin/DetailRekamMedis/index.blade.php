@extends('layouts.lte.main')

@section('title', 'Data Detail Rekam Medis')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Data Detail Rekam Medis</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Detail Rekam Medis</li>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Daftar Detail Rekam Medis</h3>
                            <a href="{{ route('admin.detail_rekam_medis.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle"></i> Tambah Detail
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
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Tanggal</th>
                                        <th>Pet</th>
                                        <th>Tindakan</th>
                                        <th>Hasil</th>
                                        <th>Catatan</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($detailRekam as $index => $dr)
                                        <tr>
                                            <td>{{ $detailRekam->firstItem() + $index }}</td>
                                            <td>{{ \Carbon\Carbon::parse($dr->tanggal)->format('d/m/Y') }}</td>
                                            <td>{{ $dr->nama_pet }}</td>
                                            <td>{{ $dr->kode }} - {{ $dr->deskripsi_tindakan_terapi }}</td>
                                            <td>{{ $dr->hasil ? Str::limit($dr->hasil, 50) : '-' }}</td>
                                            <td>{{ $dr->catatan ? Str::limit($dr->catatan, 50) : '-' }}</td>
                                            <td>
                                                <a href="{{ route('admin.detail_rekam_medis.edit', $dr->iddetail_rekaman_medis) }}" class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('admin.detail_rekam_medis.destroy', $dr->iddetail_rekaman_medis) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="bi bi-trash"></i>
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

                        <div class="mt-3">
                            {{ $detailRekam->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
