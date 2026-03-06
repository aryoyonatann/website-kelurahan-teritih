<header class="app-header shadow-sm">
    <div class="header-brand">
        <div class="brand-logo">
            <i class="bi bi-geo-alt-fill"></i>
        </div>
        <div class="brand-text">
            <span class="brand-top">ADMIN PORTAL</span>
            <span class="brand-name">Kelurahan Teritih</span>
        </div>
    </div>

    <nav class="header-nav d-none d-md-flex">
        <a href="{{ route('admin.dashboard') }}"
           class="nav-pill {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <a href="{{ route('jenis-surat.index') }}"
           class="nav-pill {{ request()->routeIs('jenis-surat.*') ? 'active' : '' }}">
            <i class="bi bi-file-earmark-text"></i> Jenis Surat
        </a>
        <a href="{{ route('permohonan.index') }}"
           class="nav-pill {{ request()->routeIs('permohonan.*') ? 'active' : '' }}">
            <i class="bi bi-envelope-open"></i> Permohonan
        </a>
        <a href="#"
           class="nav-pill {{ request()->routeIs('kependudukan.*') ? 'active' : '' }}">
            <i class="bi bi-people"></i> Kependudukan
        </a>
    </nav>

    <div class="d-flex align-items-center gap-2">
        <button class="hdr-icon-btn position-relative" title="Notifikasi">
            <i class="bi bi-bell fs-5"></i>
            <span class="hdr-badge">3</span>
        </button>

        <div class="admin-chip">
            <div class="admin-avatar">
                {{ strtoupper(substr(auth('admin')->user()->nama_admin ?? 'A', 0, 1)) }}
            </div>
            <div class="d-none d-lg-block">
                <div class="admin-uname">{{ auth('admin')->user()->nama_admin ?? 'Administrator' }}</div>
                <div class="admin-role">Administrator Kelurahan</div>
            </div>
            <i class="bi bi-chevron-down text-muted" style="font-size:11px"></i>
        </div>

        <form action="{{ route('admin.logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="hdr-icon-btn logout-btn" title="Keluar">
                <i class="bi bi-box-arrow-right fs-5"></i>
            </button>
        </form>
    </div>
</header>