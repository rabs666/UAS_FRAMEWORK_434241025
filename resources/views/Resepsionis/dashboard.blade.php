@extends('layouts.lte.main')

@section('title', 'Dashboard Resepsionis - RSHP')

@section('content')
  {{-- Content Header --}}
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Dashboard Resepsionis</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  {{-- Main Content --}}
  <div class="app-content">
    <div class="container-fluid">
      
      {{-- Info Boxes Row --}}
      <div class="row">
        {{-- Total Pet --}}
        <div class="col-lg-4 col-6">
          <div class="small-box text-bg-primary">
            <div class="inner">
              <h3>{{ DB::table('pet')->count() }}</h3>
              <p>Total Pet</p>
            </div>
            <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M11.584 2.376a.75.75 0 01.832 0l9 6a.75.75 0 11-.832 1.248L12 3.901 3.416 9.624a.75.75 0 01-.832-1.248l9-6z"></path>
              <path fill-rule="evenodd" d="M20.25 10.332v9.918H21a.75.75 0 010 1.5H3a.75.75 0 010-1.5h.75v-9.918a.75.75 0 01.634-.74A49.109 49.109 0 0112 9c2.59 0 5.134.202 7.616.592a.75.75 0 01.634.74zm-7.5 2.418a.75.75 0 00-1.5 0v6.75a.75.75 0 001.5 0v-6.75zm3-.75a.75.75 0 01.75.75v6.75a.75.75 0 01-1.5 0v-6.75a.75.75 0 01.75-.75zM9 12.75a.75.75 0 00-1.5 0v6.75a.75.75 0 001.5 0v-6.75z" clip-rule="evenodd"></path>
              <path d="M12 7.875a1.125 1.125 0 100-2.25 1.125 1.125 0 000 2.25z"></path>
            </svg>
            <a href="{{ route('resepsionis.pet.index') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
              Kelola Data <i class="bi bi-link-45deg"></i>
            </a>
          </div>
        </div>

        {{-- Total Pemilik (CRUD) --}}
        <div class="col-lg-4 col-6">
          <div class="small-box text-bg-success">
            <div class="inner">
              <h3>{{ DB::table('pemilik')->count() }}</h3>
              <p>Total Pemilik</p>
            </div>
            <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z"></path>
            </svg>
            <a href="{{ route('resepsionis.pemilik.index') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
              Kelola Data <i class="bi bi-link-45deg"></i>
            </a>
          </div>
        </div>

        {{-- Jadwal Temu Dokter (CRUD) --}}
        <div class="col-lg-4 col-6">
          <div class="small-box text-bg-warning">
            <div class="inner">
              <h3>{{ DB::table('temu_dokter')->count() }}</h3>
              <p>Jadwal Temu Dokter</p>
            </div>
            <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z"></path>
              <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd"></path>
            </svg>
            <a href="{{ route('resepsionis.temu_dokter.index') }}" class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
              Kelola Data <i class="bi bi-link-45deg"></i>
            </a>
          </div>
        </div>
      </div>

      {{-- Welcome Card --}}
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Selamat Datang, {{ Auth::user()->name }}</h3>
            </div>
            <div class="card-body">
              <div class="alert alert-info mb-3">
                <i class="bi bi-info-circle"></i> Anda login sebagai <strong>Resepsionis</strong> pada sistem Klinik Hewan.
              </div>
              <h5>Hak Akses Anda:</h5>
              <div class="row">
                <div class="col-md-4">
                  <ul class="list-group">
                    <li class="list-group-item"><i class="bi bi-pencil-square text-success"></i> <strong>CRUD</strong> Data Pet</li>
                  </ul>
                </div>
                <div class="col-md-4">
                  <ul class="list-group">
                    <li class="list-group-item"><i class="bi bi-pencil-square text-success"></i> <strong>CRUD</strong> Data Pemilik</li>
                  </ul>
                </div>
                <div class="col-md-4">
                  <ul class="list-group">
                    <li class="list-group-item"><i class="bi bi-pencil-square text-success"></i> <strong>CRUD</strong> Jadwal Temu Dokter</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
