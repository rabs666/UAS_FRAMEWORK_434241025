<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <!--begin::Brand Image-->
            <img 
                src="/assets/img/AdminLTELogo.png"
                alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">RSHP</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="true">
                
                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
                {{-- Master Data --}}
                <li class="nav-item">
                    <a href="#masterDataMenu" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="masterDataMenu">
                        <i class="nav-icon bi bi-folder"></i>
                        <p>
                            Master Data
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview collapse" id="masterDataMenu">
                        <li class="nav-item">
                            <a href="{{ route('admin.jenis_hewan.index') }}" class="nav-link {{ request()->routeIs('admin.jenis_hewan.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Jenis Hewan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.ras_hewan.index') }}" class="nav-link {{ request()->routeIs('admin.ras_hewan.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Ras Hewan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.kategori.index') }}" class="nav-link {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.kategori_klinis.index') }}" class="nav-link {{ request()->routeIs('admin.kategori_klinis.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Kategori Klinis</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.role.index') }}" class="nav-link {{ request()->routeIs('admin.role.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Role</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pemilik.index') }}" class="nav-link {{ request()->routeIs('admin.pemilik.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Pemilik</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pet.index') }}" class="nav-link {{ request()->routeIs('admin.pet.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Pet</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.kode_tindakan_terapi.index') }}" class="nav-link {{ request()->routeIs('admin.kode_tindakan_terapi.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Kode Tindakan Terapi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                {{-- Transaksi Header --}}
                <li class="nav-header">TRANSAKSI</li>
                
                {{-- Rekam Medis --}}
                <li class="nav-item">
                    <a href="{{ route('admin.rekam_medis.index') }}" class="nav-link {{ request()->routeIs('admin.rekam_medis.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-file-medical"></i>
                        <p>Rekam Medis</p>
                    </a>
                </li>
                
                {{-- Temu Dokter --}}
                <li class="nav-item">
                    <a href="{{ route('admin.temu_dokter.index') }}" class="nav-link {{ request()->routeIs('admin.temu_dokter.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-calendar-check"></i>
                        <p>Temu Dokter</p>
                    </a>
                </li>
                
                {{-- DOCUMENTATIONS Header --}}
                <li class="nav-header">DOCUMENTATIONS</li>
                
                {{-- Manual Book --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-book"></i>
                        <p>Manual Book</p>
                    </a>
                </li>
                
                {{-- FAQ --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-question-circle"></i>
                        <p>FAQ</p>
                    </a>
                </li>
                
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>