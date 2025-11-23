<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ route('perawat.dashboard') }}" class="brand-link">
            <img src="/assets/img/AdminLTELogo.png" alt="Logo" class="brand-image opacity-75 shadow">
            <span class="brand-text fw-light">Klinik Hewan</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item">
                    <a href="{{ route('perawat.dashboard') }}" class="nav-link {{ request()->routeIs('perawat.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('perawat.pasien.index') }}" class="nav-link {{ request()->routeIs('perawat.pasien.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-eye"></i>
                        <p>Pasien <span class="badge text-bg-primary">VIEW</span></p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('perawat.rekam_medis.index') }}" class="nav-link {{ request()->routeIs('perawat.rekam_medis.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-pencil-square"></i>
                        <p>Rekam Medis <span class="badge text-bg-success">CRUD</span></p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('perawat.detail_rekam_medis.index') }}" class="nav-link {{ request()->routeIs('perawat.detail_rekam_medis.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-eye"></i>
                        <p>Detail Tindakan <span class="badge text-bg-primary">VIEW</span></p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('perawat.profil.index') }}" class="nav-link {{ request()->routeIs('perawat.profil.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-person-circle"></i>
                        <p>Profil Perawat</p>
                    </a>
                </li>



            </ul>
        </nav>
    </div>
</aside>
