<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ route('pemilik.dashboard') }}" class="brand-link">
            <img src="/assets/img/AdminLTELogo.png" alt="Logo" class="brand-image opacity-75 shadow">
            <span class="brand-text fw-light">Klinik Hewan</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item">
                    <a href="{{ route('pemilik.dashboard') }}" class="nav-link {{ request()->routeIs('pemilik.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('pemilik.temu_dokter.index') }}" class="nav-link {{ request()->routeIs('pemilik.temu_dokter.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-eye"></i>
                        <p>Jadwal Temu Dokter <span class="badge text-bg-primary">VIEW</span></p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('pemilik.rekam_medis.index') }}" class="nav-link {{ request()->routeIs('pemilik.rekam_medis.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-eye"></i>
                        <p>Rekam Medis Pet <span class="badge text-bg-primary">VIEW</span></p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('pemilik.profil.index') }}" class="nav-link {{ request()->routeIs('pemilik.profil.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-eye"></i>
                        <p>Profil & Pet Saya <span class="badge text-bg-primary">VIEW</span></p>
                    </a>
                </li>



            </ul>
        </nav>
    </div>
</aside>
