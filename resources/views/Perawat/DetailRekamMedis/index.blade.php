@extends('layouts.lte.app')

@section('title', 'Detail Rekam Medis - Perawat')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Detail Rekam Medis</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('perawat.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Detail Rekam Medis</li>
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
                    <h3 class="card-title">Daftar Detail Rekam Medis</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Pet</th>
                                    <th>Tindakan</th>
                                    <th>Hasil</th>
                                    <th>Catatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($detailRekam as $index => $item)
                                <tr>
                                    <td>{{ $detailRekam->firstItem() + $index }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                    <td>{{ $item->nama_pet }}</td>
                                    <td>{{ $item->kode }} - {{ $item->deskripsi_tindakan_terapi }}</td>
                                    <td>{{ $item->hasil ?? '-' }}</td>
                                    <td>{{ $item->catatan ?? '-' }}</td>
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
                        {{ $detailRekam->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
