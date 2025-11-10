<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
  <meta name="color-scheme" content="light dark" />
  <meta name="theme-color" content="#0d6efd" media="(prefers-color-scheme: light)" />
  <meta name="theme-color" content="#0f0b1f" media="(prefers-color-scheme: dark)" />
  <meta name="title" content="Admin | Dashboard" />
  <meta name="author" content="ColorlibHQ" />
  <meta
    name="description"
    content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance."
  />
  <meta
    name="keywords"
    content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datep"
  />
  <meta name="supported-color-schemes" content="light dark" />
  {{-- Core CSS - Load first --}}
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
    integrity="sha256-TwU/FIxP6G1TItiPPrJgLYqHVsHdcTNhK+ZBLhVZIoYmry+Q="
    crossorigin="anonymous"
  />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
    crossorigin="anonymous"
  />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    crossorigin="anonymous"
  />
  {{-- AdminLTE CSS - Main theme --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta2/dist/css/adminlte.min.css" crossorigin="anonymous" />
  
  <style>
    /* Force sidebar to be visible and positioned on left */
    .app-sidebar {
      position: fixed !important;
      left: 0 !important;
      top: 0 !important;
      bottom: 0 !important;
      width: 250px !important;
      display: block !important;
      z-index: 1000 !important;
      overflow-y: auto !important;
    }
    
    /* Adjust navbar to make room for sidebar */
    .app-header {
      position: fixed !important;
      top: 0 !important;
      left: 250px !important;
      right: 0 !important;
      z-index: 999 !important;
      display: block !important;
      height: 57px !important;
    }
    
    /* Adjust main content to make room for sidebar and navbar */
    .app-main {
      margin-left: 250px !important;
      margin-top: 57px !important;
      padding: 1rem !important;
      min-height: calc(100vh - 57px) !important;
      background: white !important;
      overflow-y: auto !important;
      display: block !important;
      position: relative !important;
      z-index: 1 !important;
    }
    
    /* Force content to be visible */
    .app-content,
    .app-content-header {
      display: block !important;
      visibility: visible !important;
      opacity: 1 !important;
    }
    
    /* Ensure body wrapper takes full height */
    .app-wrapper {
      min-height: 100vh !important;
    }
  </style>
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
    integrity="sha256-4MXQIN1BvvWFJ/UModLdfPzFKSBI/R1SnsOMgG550="
    crossorigin="anonymous"
  />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
    integrity="sha256-+GUJLMMTKOdqDr2ZEGKoys/NRXSN5CNXHUL@Fy/20/4="
    crossorigin="anonymous"
  />
</head>