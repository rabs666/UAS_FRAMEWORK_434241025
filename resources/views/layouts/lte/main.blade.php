<!doctype html>
<html lang="en">
  @include('layouts.lte.head')
  <body class="layout-fixed sidebar-expand-lg">
    <div class="app-wrapper">
      @include('layouts.lte.navbar')
      @php
        $role = session('user_role', 'guest');
      @endphp
      @if($role === 'Administrator')
        @include('layouts.lte.sidebar-admin')
      @elseif($role === 'Dokter')
        @include('layouts.lte.sidebar-dokter')
      @elseif($role === 'Perawat')
        @include('layouts.lte.sidebar-perawat')
      @elseif($role === 'Resepsionis')
        @include('layouts.lte.sidebar-resepsionis')
      @elseif($role === 'Pemilik')
        @include('layouts.lte.sidebar-pemilik')
      @else
        @include('layouts.lte.sidebar')
      @endif
      <main class="app-main">
        @yield('content')
      </main>
      @include('layouts.lte.footer')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    {{-- AdminLTE JS --}}
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta2/dist/js/adminlte.min.js" crossorigin="anonymous"></script>
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
      const Default = {
        scrollbarTheme: "os-theme-light",
        scrollbarAutoHide: "leave",
        scrollbarClickScroll: true,
      };
      document.addEventListener("DOMContentLoaded", function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (
          sidebarWrapper &&
          typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
        ) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
        
        // Handle Bootstrap collapse menu
        const masterDataToggle = document.querySelector('[href="#masterDataMenu"]');
        const masterDataMenu = document.getElementById('masterDataMenu');
        
        if (masterDataToggle && masterDataMenu) {
          masterDataMenu.addEventListener('show.bs.collapse', function() {
            masterDataToggle.closest('.nav-item').classList.add('menu-open');
          });
          
          masterDataMenu.addEventListener('hide.bs.collapse', function() {
            masterDataToggle.closest('.nav-item').classList.remove('menu-open');
          });
        }
      });
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
      crossorigin="anonymous"
    ></script>
    {{-- page specific scripts --}}
    @stack('scripts')
  </body>
</html>