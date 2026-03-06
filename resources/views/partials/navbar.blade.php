<style>
/* =====================================================
   NAVBAR — shared partial styles
===================================================== */
.main-nav {
    background: #ffffff;
    border-bottom: 1px solid #e2e8f0;
    padding: 0 32px;
    height: 64px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: sticky;
    top: 0;
    z-index: 1000;
    box-shadow: 0 1px 8px rgba(0,0,0,.06);
    flex-shrink: 0;
}
.nav-brand {
    display: flex; align-items: center; gap: 10px;
    text-decoration: none;
}
.nav-brand-icon {
    width: 40px; height: 40px;
    background: linear-gradient(135deg, #1c64f2, #1e3a5f);
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    color: white; font-size: 20px; flex-shrink: 0;
}
.nav-brand-text { display: flex; flex-direction: column; line-height: 1.15; }
.nav-brand-sub  { font-size: 9px; font-weight: 700; letter-spacing: .12em; color: #64748b; text-transform: uppercase; }
.nav-brand-name { font-size: 16px; font-weight: 800; color: #0d1b3e; }

.nav-links {
    display: flex; align-items: center; gap: 4px;
    list-style: none; margin: 0; padding: 0;
}
.nav-links a {
    display: block; padding: 6px 14px; border-radius: 8px;
    font-size: 13.5px; font-weight: 500;
    color: #334155; text-decoration: none; transition: all .18s;
}
.nav-links a:hover  { background: #f1f5f9; color: #1c64f2; }
.nav-links a.active { color: #1c64f2; font-weight: 700; border-bottom: 2px solid #1c64f2; border-radius: 0; }

.nav-cta { display: flex; align-items: center; gap: 8px; }

.btn-admin {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 7px 16px; border-radius: 8px;
    font-size: 13px; font-weight: 600;
    border: 1.5px solid #e2e8f0;
    background: white; color: #0d1b3e;
    text-decoration: none; transition: all .18s;
}
.btn-admin:hover { border-color: #1c64f2; color: #1c64f2; }

.btn-masyarakat {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 7px 18px; border-radius: 8px;
    font-size: 13px; font-weight: 700;
    background: #1c64f2; color: white;
    border: none; text-decoration: none; transition: background .18s;
}
.btn-masyarakat:hover { background: #1a56db; color: white; }

@media (max-width: 991px) {
    .nav-links { display: none; }
    .main-nav  { padding: 0 16px; }
}
</style>

<nav class="main-nav">
    <a href="{{ route('home') }}" class="nav-brand">
        <div class="nav-brand-icon">
            <i class="bi bi-bank2"></i>
        </div>
        <div class="nav-brand-text">
            <span class="nav-brand-sub">Kota Serang</span>
            <span class="nav-brand-name">Kelurahan Teritih</span>
        </div>
    </a>

    <ul class="nav-links">
        <li><a href="{{ route('home') }}"   class="{{ request()->routeIs('home')   ? 'active' : '' }}">Beranda</a></li>
        <li><a href="{{ route('profil') }}" class="{{ request()->routeIs('profil') ? 'active' : '' }}">Profil</a></li>
        <li><a href="#">Layanan</a></li>
        <li><a href="#">Informasi</a></li>
        <li><a href="#">Kontak</a></li>
    </ul>

    <div class="nav-cta">
        <a href="{{ route('admin.login') }}" class="btn-admin">
            Login Admin
        </a>
        <a href="{{ route('login') }}" class="btn-masyarakat">
            <i class="bi bi-box-arrow-in-right"></i>
            Login Masyarakat
        </a>
    </div>
</nav>