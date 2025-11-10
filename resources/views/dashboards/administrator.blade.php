@extends('layouts.lte.main')

@section('title', 'Dashboard Admin - RSHP')

@section('content')
  
  {{-- DEBUG: Test content visibility --}}
  <div style="background: red; color: white; padding: 30px; margin: 20px; font-size: 24px; z-index: 9999; position: relative;">
    <h1>🔴 TEST: Content Section is Rendering!</h1>
    <p>If you see this, @yield('content') is working!</p>
  </div>

  {{-- Content Header --}}
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Dashboard</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
        {{-- New Orders --}}
        <div class="col-lg-3 col-6">
          <div class="small-box text-bg-primary">
            <div class="inner">
              <h3>150</h3>
              <p>New Orders</p>
            </div>
            <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"></path>
            </svg>
            <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
              More info <i class="bi bi-link-45deg"></i>
            </a>
          </div>
        </div>

        {{-- Bounce Rate --}}
        <div class="col-lg-3 col-6">
          <div class="small-box text-bg-success">
            <div class="inner">
              <h3>53<sup class="fs-5">%</sup></h3>
              <p>Bounce Rate</p>
            </div>
            <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z"></path>
            </svg>
            <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
              More info <i class="bi bi-link-45deg"></i>
            </a>
          </div>
        </div>

        {{-- User Registrations --}}
        <div class="col-lg-3 col-6">
          <div class="small-box text-bg-warning">
            <div class="inner">
              <h3>44</h3>
              <p>User Registrations</p>
            </div>
            <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
            </svg>
            <a href="#" class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
              More info <i class="bi bi-link-45deg"></i>
            </a>
          </div>
        </div>

        {{-- Unique Visitors --}}
        <div class="col-lg-3 col-6">
          <div class="small-box text-bg-danger">
            <div class="inner">
              <h3>65</h3>
              <p>Unique Visitors</p>
            </div>
            <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path clip-rule="evenodd" fill-rule="evenodd" d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z"></path>
              <path clip-rule="evenodd" fill-rule="evenodd" d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z"></path>
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
                <h3 class="card-title">Sales Value</h3>
              </div>
            </div>
            <div class="card-body">
              <div class="position-relative mb-4">
                <div id="sales-chart" style="height: 300px;"></div>
              </div>
            </div>
          </div>
        </div>

        {{-- Sales Value Map --}}
        <div class="col-lg-5">
          <div class="card mb-4">
            <div class="card-header border-0">
              <h3 class="card-title">Sales Value</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                  <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                  <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div id="world-map" style="height: 300px;"></div>
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
{{-- jsvectormap CDN --}}
<script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js" crossorigin="anonymous"></script>

<script>
  // Sales Chart
  var salesChartOptions = {
    series: [{
      name: 'Digital Goods',
      data: [28, 48, 40, 19, 86, 27, 90]
    }, {
      name: 'Electronics',
      data: [65, 59, 80, 81, 56, 89, 40]
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
      categories: ['Jan 23', 'Feb 23', 'Mar 23', 'Apr 23', 'May 23', 'Jun 23', 'Jul 23']
    },
    colors: ['#0d6efd', '#20c997'],
    legend: {
      position: 'top'
    },
    fill: {
      type: 'gradient',
      gradient: {
        shadeIntensity: 1,
        opacityFrom: 0.7,
        opacityTo: 0.3,
      }
    }
  };
  var salesChart = new ApexCharts(document.querySelector("#sales-chart"), salesChartOptions);
  salesChart.render();

  // World Map
  const visitorsData = {
    US: 398,
    SA: 400,
    CA: 1000,
    DE: 500,
    FR: 760,
    CN: 300,
    AU: 700,
    BR: 600,
    IN: 800,
    GB: 320,
    RU: 3000
  };

  const map = new jsVectorMap({
    selector: "#world-map",
    map: "world",
    zoomButtons: true,
    normalizeFunction: "polynomial",
    hoverOpacity: 0.5,
    hoverColor: false,
    zoomOnScroll: false,
    series: {
      regions: [{
        values: visitorsData,
        scale: ["#C8EEFF", "#0071A4"],
        normalizeFunction: "polynomial"
      }]
    },
    labels: {
      regions: {
        render(code) {
          return code.split("-")[1];
        }
      }
    },
    focusOn: {
      x: 0.5,
      y: 0.5,
      scale: 1
    },
    regionStyle: {
      initial: {
        fill: "#dee2e6"
      }
    }
  });
</script>
@endpush
