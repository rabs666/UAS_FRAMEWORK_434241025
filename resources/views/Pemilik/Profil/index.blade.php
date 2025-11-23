@extends('layouts.lte.app')

@section('title', 'Profil Pemilik')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Profil Saya</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('pemilik.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Profil</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Informasi Akun</h3>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="200">Nama</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>{{ $user->username }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        @if($pemilik)
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Informasi Pemilik</h3>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="200">ID Pemilik</th>
                            <td>{{ $pemilik->idpemilik }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $pemilik->alamat ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>No Telepon</th>
                            <td>{{ $pemilik->no_wa ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $pemilik->email ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>

    @if($pets->count() > 0)
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Pet Saya</h3>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pets as $index => $pet)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $pet->nama_pet }}</td>
                                    <td>{{ $pet->nama_ras }}</td>
                                    <td>{{ $pet->jenis_kelamin == 'L' ? 'Jantan' : 'Betina' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($pet->tanggal_lahir)->format('d-m-Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
