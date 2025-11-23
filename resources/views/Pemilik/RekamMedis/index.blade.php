@extends('layouts.lte.app')

@section('title', 'Rekam Medis Pet - Pemilik')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Rekam Medis Pet</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('pemilik.dashboard') }}">Home</a></li>
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
                    <h3 class="card-title">Daftar Rekam Medis Pet Saya</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Pet</th>
                                    <th>Keluhan</th>
                                    <th>Diagnosa</th>
                                    <th>Dokter</th>
                                    <th>Perawat</th>
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
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if(method_exists($rekamMedis, 'links'))
                    <div class="mt-3">
                        {{ $rekamMedis->links('pagination::bootstrap-5') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
