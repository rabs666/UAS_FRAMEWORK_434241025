<!doctype html>
<html lang="en">
  @include('layouts.lte.head')
  <body class="layout-fixed">
    <div class="app-wrapper">
      @include('layouts.lte.navbar')
      
      @php
        $user = Auth::user();
        $userRole = null;
        
        if ($user) {
            // Get user role from role_user table
            $roleUser = DB::table('role_user')
                ->join('role', 'role_user.idrole', '=', 'role.idrole')
                ->where('role_user.iduser', function($query) use ($user) {
                    $query->select('iduser')
                          ->from('user')
                          ->where('email', $user->email)
                          ->limit(1);
                })
                ->select('role.nama_role')
                ->first();
            
            if ($roleUser) {
                $userRole = strtolower($roleUser->nama_role);
            }
        }
      @endphp
      
      @if($userRole === 'administrator')
        @include('layouts.lte.sidebar-admin')
      @elseif($userRole === 'dokter')
        @include('layouts.lte.sidebar-dokter')
      @elseif($userRole === 'perawat')
        @include('layouts.lte.sidebar-perawat')
      @elseif($userRole === 'resepsionis')
        @include('layouts.lte.sidebar-resepsionis')
      @elseif($userRole === 'pemilik')
        @include('layouts.lte.sidebar-pemilik')
      @else
        @include('layouts.lte.sidebar')
      @endif
      
      <main class="app-main">
        @yield('content-header')
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
        
        // Handle menu treeview toggle
        document.querySelectorAll('[data-lte-toggle="treeview"] .nav-item > .nav-link').forEach(function(element) {
          element.addEventListener('click', function(e) {
            const parentItem = this.closest('.nav-item');
            const subMenu = parentItem.querySelector('.nav-treeview');
            
            if (subMenu) {
              e.preventDefault();
              
              // Toggle menu-open class
              parentItem.classList.toggle('menu-open');
              
              // Toggle submenu visibility
              if (parentItem.classList.contains('menu-open')) {
                subMenu.style.display = 'block';
              } else {
                subMenu.style.display = 'none';
              }
            }
          });
        });
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
