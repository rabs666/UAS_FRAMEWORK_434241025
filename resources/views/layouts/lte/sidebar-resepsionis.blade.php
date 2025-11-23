<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ route('resepsionis.dashboard') }}" class="brand-link">
            <img src="/assets/img/AdminLTELogo.png" alt="Logo" class="brand-image opacity-75 shadow">
            <span class="brand-text fw-light">Klinik Hewan</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item">
                    <a href="{{ route('resepsionis.dashboard') }}" class="nav-link {{ request()->routeIs('resepsionis.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('resepsionis.pet.index') }}" class="nav-link {{ request()->routeIs('resepsionis.pet.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-pencil-square"></i>
                        <p>Pet <span class="badge text-bg-success">CRUD</span></p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('resepsionis.pemilik.index') }}" class="nav-link {{ request()->routeIs('resepsionis.pemilik.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-pencil-square"></i>
                        <p>Pemilik <span class="badge text-bg-success">CRUD</span></p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('resepsionis.temu_dokter.index') }}" class="nav-link {{ request()->routeIs('resepsionis.temu_dokter.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-pencil-square"></i>
                        <p>Temu Dokter <span class="badge text-bg-success">CRUD</span></p>
                    </a>
                </li>



            </ul>
        </nav>
    </div>
</aside>
