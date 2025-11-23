@extends('layouts.lte.app')

@section('title', 'Profil Perawat')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Profil Saya</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('perawat.dashboard') }}">Home</a></li>
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

        @if($perawat)
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Informasi Perawat</h3>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="200">ID Perawat</th>
                            <td>{{ $perawat->id_perawat }}</td>
                        </tr>
                        <tr>
                            <th>No Telepon</th>
                            <td>{{ $perawat->no_wa ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
