@extends('layouts.lte.app')

@section('title', 'Data Pasien - Perawat')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Data Pasien</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('perawat.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Data Pasien</li>
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
                    <h3 class="card-title">Daftar Pasien</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pet</th>
                                    <th>Ras</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Pemilik</th>
                                    <th>No Telp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pasien as $index => $item)
                                <tr>
                                    <td>{{ $pasien->firstItem() + $index }}</td>
                                    <td>{{ $item->nama_pet }}</td>
                                    <td>{{ $item->nama_ras }}</td>
                                    <td>{{ $item->jenis_kelamin == 'L' ? 'Jantan' : 'Betina' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}</td>
                                    <td>{{ $item->nama_pemilik }}</td>
                                    <td>{{ $item->no_wa ?? '-' }}</td>
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
                        {{ $pasien->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
