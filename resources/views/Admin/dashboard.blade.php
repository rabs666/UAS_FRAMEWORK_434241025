@extends('layouts.lte.main')

@section('title', 'Dashboard Admin - RSHP')

@section('content')
  {{-- Content Header --}}
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Dashboard Admin</h3>
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
        {{-- Total Users --}}
        <div class="col-lg-3 col-6">
          <div class="small-box text-bg-primary">
            <div class="inner">
              <h3>150</h3>
              <p>Total Users</p>
            </div>
            <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
            </svg>
            <a href="{{ route('admin.users.index') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
              More info <i class="bi bi-link-45deg"></i>
            </a>
          </div>
        </div>

        {{-- Total Pets --}}
        <div class="col-lg-3 col-6">
          <div class="small-box text-bg-success">
            <div class="inner">
              <h3>53</h3>
              <p>Total Pets</p>
            </div>
            <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M11.584 2.376a.75.75 0 01.832 0l9 6a.75.75 0 11-.832 1.248L12 3.901 3.416 9.624a.75.75 0 01-.832-1.248l9-6z"></path>
              <path fill-rule="evenodd" d="M20.25 10.332v9.918H21a.75.75 0 010 1.5H3a.75.75 0 010-1.5h.75v-9.918a.75.75 0 01.634-.74A49.109 49.109 0 0112 9c2.59 0 5.134.202 7.616.592a.75.75 0 01.634.74zm-7.5 2.418a.75.75 0 00-1.5 0v6.75a.75.75 0 001.5 0v-6.75zm3-.75a.75.75 0 01.75.75v6.75a.75.75 0 01-1.5 0v-6.75a.75.75 0 01.75-.75zM9 12.75a.75.75 0 00-1.5 0v6.75a.75.75 0 001.5 0v-6.75z" clip-rule="evenodd"></path>
              <path d="M12 7.875a1.125 1.125 0 100-2.25 1.125 1.125 0 000 2.25z"></path>
            </svg>
            <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
              More info <i class="bi bi-link-45deg"></i>
            </a>
          </div>
        </div>

        {{-- Total Pemilik --}}
        <div class="col-lg-3 col-6">
          <div class="small-box text-bg-warning">
            <div class="inner">
              <h3>44</h3>
              <p>Total Pemilik</p>
            </div>
            <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z"></path>
            </svg>
            <a href="{{ route('admin.pemilik.index') }}" class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
              More info <i class="bi bi-link-45deg"></i>
            </a>
          </div>
        </div>

        {{-- Total Rekam Medis --}}
        <div class="col-lg-3 col-6">
          <div class="small-box text-bg-danger">
            <div class="inner">
              <h3>65</h3>
              <p>Rekam Medis</p>
            </div>
            <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path clip-rule="evenodd" fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 013.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 013.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 01-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875zm6 16.5c.66 0 1.277-.19 1.797-.518l1.048 1.048a.75.75 0 001.06-1.06l-1.047-1.048A3.375 3.375 0 1011.625 18z"></path>
              <path d="M14.25 5.25a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963A5.23 5.23 0 0016.5 7.5h-1.875a.375.375 0 01-.375-.375V5.25z"></path>
            </svg>
            <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
              More info <i class="bi bi-link-45deg"></i>
            </a>
          </div>
        </div>
      </div>

      {{-- Charts Row --}}
      <div class="row">
        {{-- Sales Chart --}}
        <div class="col-lg-7">
          <div class="card mb-4">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Statistik Bulanan</h3>
              </div>
            </div>
            <div class="card-body">
              <div class="position-relative mb-4">
                <div id="sales-chart" style="height: 300px;"></div>
              </div>
            </div>
          </div>
        </div>

        {{-- Pie Chart --}}
        <div class="col-lg-5">
          <div class="card mb-4">
            <div class="card-header border-0">
              <h3 class="card-title">Distribusi Jenis Hewan</h3>
            </div>
            <div class="card-body">
              <div id="pie-chart" style="height: 300px;"></div>
            </div>
          </div>
        </div>
      </div>

      {{-- Quick Access Menu Row --}}
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Quick Access - Master Data</h3>
            </div>
            <div class="card-body">
              <div class="row g-3">
                <div class="col-md-3">
                  <a href="{{ route('admin.jenis_hewan.index') }}" class="btn btn-outline-primary w-100">
                    <i class="bi bi-tag"></i> Jenis Hewan
                  </a>
                </div>
                <div class="col-md-3">
                  <a href="{{ route('admin.ras_hewan.index') }}" class="btn btn-outline-success w-100">
                    <i class="bi bi-tags"></i> Ras Hewan
                  </a>
                </div>
                <div class="col-md-3">
                  <a href="{{ route('admin.kategori.index') }}" class="btn btn-outline-warning w-100">
                    <i class="bi bi-folder"></i> Kategori
                  </a>
                </div>
                <div class="col-md-3">
                  <a href="{{ route('admin.kategori_klinis.index') }}" class="btn btn-outline-danger w-100">
                    <i class="bi bi-hospital"></i> Kategori Klinis
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection

@push('scripts')
{{-- ApexCharts CDN --}}
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.44.0/dist/apexcharts.min.js"></script>

<script>
  // Sales Chart
  var salesChartOptions = {
    series: [{
      name: 'Kunjungan',
      data: [31, 40, 28, 51, 42, 82, 56, 68, 52, 75, 63, 84]
    }, {
      name: 'Rekam Medis',
      data: [11, 32, 45, 32, 34, 52, 41, 52, 38, 55, 48, 62]
    }],
    chart: {
      height: 300,
      type: 'area',
      toolbar: {
        show: false
      }
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth'
    },
    xaxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    colors: ['#007bff', '#28a745'],
    legend: {
      position: 'top'
    }
  };
  var salesChart = new ApexCharts(document.querySelector("#sales-chart"), salesChartOptions);
  salesChart.render();

  // Pie Chart
  var pieChartOptions = {
    series: [44, 55, 13, 33],
    chart: {
      type: 'donut',
      height: 300
    },
    labels: ['Anjing', 'Kucing', 'Kelinci', 'Burung'],
    colors: ['#007bff', '#28a745', '#ffc107', '#dc3545'],
    legend: {
      position: 'bottom'
    }
  };
  var pieChart = new ApexCharts(document.querySelector("#pie-chart"), pieChartOptions);
  pieChart.render();
</script>
@endpush