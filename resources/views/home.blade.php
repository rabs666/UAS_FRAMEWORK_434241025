@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} - {{ session('user_name') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="mb-3">{{ __('You are logged in!') }} <strong>{{ session('user_role_name') }}</strong></p>
                    
                    <div class="mb-4">
                        <a href="{{ url('/') }}" class="btn btn-primary">Visit Website</a>
                        <a href="{{ route('home') }}" class="btn btn-success">Refresh</a>
                    </div>

                    {{-- Menu untuk Administrator --}}
                    @if(session('user_role') == 'Administrator')
                    <hr>
                    <h5 class="mb-3">Menu Administrator</h5>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark btn-block w-100">
                                <i class="bi bi-speedometer2"></i> Dashboard Admin
                            </a>
                        </div>
                        <div class="col-md-4 mb-2">
                            <a href="{{ route('admin.jenis_hewan.index') }}" class="btn btn-outline-primary btn-block w-100">
                                <i class="bi bi-list-ul"></i> Jenis Hewan
                            </a>
                        </div>
                        <div class="col-md-4 mb-2">
                            <a href="{{ route('admin.ras_hewan.index') }}" class="btn btn-outline-success btn-block w-100">
                                <i class="bi bi-list-ul"></i> Ras Hewan
                            </a>
                        </div>
                        <div class="col-md-4 mb-2">
                            <a href="{{ route('admin.kategori.index') }}" class="btn btn-outline-warning btn-block w-100">
                                <i class="bi bi-list-ul"></i> Kategori
                            </a>
                        </div>
                        <div class="col-md-4 mb-2">
                            <a href="{{ route('admin.kategori_klinis.index') }}" class="btn btn-outline-info btn-block w-100">
                                <i class="bi bi-list-ul"></i> Kategori Klinis
                            </a>
                        </div>
                        <div class="col-md-4 mb-2">
                            <a href="{{ route('admin.role.index') }}" class="btn btn-outline-secondary btn-block w-100">
                                <i class="bi bi-shield-lock"></i> Roles
                            </a>
                        </div>
                        <div class="col-md-4 mb-2">
                            <a href="{{ route('admin.pemilik.index') }}" class="btn btn-outline-primary btn-block w-100">
                                <i class="bi bi-people"></i> Pemilik
                            </a>
                        </div>
                        <div class="col-md-4 mb-2">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-success btn-block w-100">
                                <i class="bi bi-person-circle"></i> Users
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection