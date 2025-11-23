<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ route('dokter.dashboard') }}" class="brand-link">
            <img src="/assets/img/AdminLTELogo.png" alt="Logo" class="brand-image opacity-75 shadow">
            <span class="brand-text fw-light">Klinik Hewan</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('dokter.dashboard') }}" class="nav-link {{ request()->routeIs('dokter.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Pasien (VIEW ONLY) -->
                <li class="nav-item">
                    <a href="{{ route('dokter.pasien.index') }}" class="nav-link {{ request()->routeIs('dokter.pasien.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-eye"></i>
                        <p>Pasien <span class="badge text-bg-primary">VIEW</span></p>
                    </a>
                </li>

                <!-- Rekam Medis (VIEW ONLY) -->
                <li class="nav-item">
                    <a href="{{ route('dokter.rekam_medis.index') }}" class="nav-link {{ request()->routeIs('dokter.rekam_medis.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-eye"></i>
                        <p>Rekam Medis <span class="badge text-bg-primary">VIEW</span></p>
                    </a>
                </li>

                <!-- Detail Rekam Medis (CRUD) -->
                <li class="nav-item">
                    <a href="{{ route('dokter.detail_rekam_medis.index') }}" class="nav-link {{ request()->routeIs('dokter.detail_rekam_medis.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-pencil-square"></i>
                        <p>Detail Tindakan <span class="badge text-bg-success">CRUD</span></p>
                    </a>
                </li>

                <!-- Profil -->
                <li class="nav-item">
                    <a href="{{ route('dokter.profil.index') }}" class="nav-link {{ request()->routeIs('dokter.profil.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-person-circle"></i>
                        <p>Profil Dokter</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
