@extends('layouts.lte.app')

@section('title', 'Jadwal Temu Dokter - Pemilik')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Jadwal Temu Dokter</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('pemilik.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Temu Dokter</li>
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
                    <h3 class="card-title">Daftar Jadwal Temu Dokter</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Pet</th>
                                    <th>Dokter</th>
                                    <th>Keluhan Awal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($temuDokter as $index => $item)
                                <tr>
                                    <td>{{ $temuDokter->firstItem() + $index }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_temu)->format('d-m-Y') }}</td>
                                    <td>{{ $item->jam_temu }}</td>
                                    <td>{{ $item->nama_pet }}</td>
                                    <td>{{ $item->nama_dokter ?? '-' }}</td>
                                    <td>{{ $item->keluhan_awal ?? '-' }}</td>
                                    <td>
                                        @if($item->status == 'Menunggu')
                                            <span class="badge bg-warning">{{ $item->status }}</span>
                                        @elseif($item->status == 'Selesai')
                                            <span class="badge bg-success">{{ $item->status }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $item->status }}</span>
                                        @endif
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

                    @if(method_exists($temuDokter, 'links'))
                    <div class="mt-3">
                        {{ $temuDokter->links('pagination::bootstrap-5') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
