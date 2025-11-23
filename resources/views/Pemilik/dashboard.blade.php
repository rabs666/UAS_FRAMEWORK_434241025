@extends('layouts.lte.main')

@section('title', 'Dashboard Pemilik - RSHP')

@section('content')
  {{-- Content Header --}}
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Dashboard Pemilik</h3>
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
      
      @php
        $user = Auth::user();
        $pemilik = DB::table('pemilik')->where('iduser', $user->iduser)->first();
        $petCount = $pemilik ? DB::table('pet')->where('idpemilik', $pemilik->idpemilik)->count() : 0;
        $temuDokterCount = $pemilik ? DB::table('temu_dokter')
            ->join('pet', 'temu_dokter.id_pet', '=', 'pet.id_pet')
            ->where('pet.idpemilik', $pemilik->idpemilik)
            ->count() : 0;
        $rekamMedisCount = $pemilik ? DB::table('rekam_medis')
            ->join('pet', 'rekam_medis.id_pet', '=', 'pet.id_pet')
            ->where('pet.idpemilik', $pemilik->idpemilik)
            ->count() : 0;
      @endphp

      {{-- Info Boxes Row --}}
      <div class="row">
        {{-- Pet Saya --}}
        <div class="col-lg-4 col-6">
          <div class="small-box text-bg-primary">
            <div class="inner">
              <h3>{{ $petCount }}</h3>
              <p>Pet Saya</p>
            </div>
            <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M11.584 2.376a.75.75 0 01.832 0l9 6a.75.75 0 11-.832 1.248L12 3.901 3.416 9.624a.75.75 0 01-.832-1.248l9-6z"></path>
              <path fill-rule="evenodd" d="M20.25 10.332v9.918H21a.75.75 0 010 1.5H3a.75.75 0 010-1.5h.75v-9.918a.75.75 0 01.634-.74A49.109 49.109 0 0112 9c2.59 0 5.134.202 7.616.592a.75.75 0 01.634.74zm-7.5 2.418a.75.75 0 00-1.5 0v6.75a.75.75 0 001.5 0v-6.75zm3-.75a.75.75 0 01.75.75v6.75a.75.75 0 01-1.5 0v-6.75a.75.75 0 01.75-.75zM9 12.75a.75.75 0 00-1.5 0v6.75a.75.75 0 001.5 0v-6.75z" clip-rule="evenodd"></path>
              <path d="M12 7.875a1.125 1.125 0 100-2.25 1.125 1.125 0 000 2.25z"></path>
            </svg>
            <a href="{{ route('pemilik.profil.index') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
              Lihat Profil & Pet <i class="bi bi-link-45deg"></i>
            </a>
          </div>
        </div>

        {{-- Jadwal Temu Dokter (VIEW ONLY) --}}
        <div class="col-lg-4 col-6">
          <div class="small-box text-bg-success">
            <div class="inner">
              <h3>{{ $temuDokterCount }}</h3>
              <p>Jadwal Temu Dokter</p>
            </div>
            <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z"></path>
              <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd"></path>
            </svg>
            <a href="{{ route('pemilik.temu_dokter.index') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
              Lihat Jadwal <i class="bi bi-link-45deg"></i>
            </a>
          </div>
        </div>

        {{-- Rekam Medis Pet (VIEW ONLY) --}}
        <div class="col-lg-4 col-6">
          <div class="small-box text-bg-warning">
            <div class="inner">
              <h3>{{ $rekamMedisCount }}</h3>
              <p>Rekam Medis Pet</p>
            </div>
            <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path clip-rule="evenodd" fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 013.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 013.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 01-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875zm6 16.5c.66 0 1.277-.19 1.797-.518l1.048 1.048a.75.75 0 001.06-1.06l-1.047-1.048A3.375 3.375 0 1011.625 18z"></path>
              <path d="M14.25 5.25a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963A5.23 5.23 0 0016.5 7.5h-1.875a.375.375 0 01-.375-.375V5.25z"></path>
            </svg>
            <a href="{{ route('pemilik.rekam_medis.index') }}" class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
              Lihat Rekam Medis <i class="bi bi-link-45deg"></i>
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
                <i class="bi bi-info-circle"></i> Anda login sebagai <strong>Pemilik Pet</strong> pada sistem Klinik Hewan.
              </div>
              <h5>Hak Akses Anda (VIEW ONLY):</h5>
              <div class="row">
                <div class="col-md-4">
                  <ul class="list-group">
                    <li class="list-group-item"><i class="bi bi-eye text-primary"></i> <strong>View</strong> Jadwal Temu Dokter</li>
                  </ul>
                </div>
                <div class="col-md-4">
                  <ul class="list-group">
                    <li class="list-group-item"><i class="bi bi-eye text-primary"></i> <strong>View</strong> Rekam Medis Pet</li>
                  </ul>
                </div>
                <div class="col-md-4">
                  <ul class="list-group">
                    <li class="list-group-item"><i class="bi bi-eye text-primary"></i> <strong>View</strong> Profil & Pet Saya</li>
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
