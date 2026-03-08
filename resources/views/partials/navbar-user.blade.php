<style>
.main-nav {
    background: #ffffff;
    border-bottom: 1px solid #e2e8f0;
    padding: 0 32px; height: 64px;
    display: flex; align-items: center; justify-content: space-between;
    position: sticky; top: 0; z-index: 1000;
    box-shadow: 0 1px 8px rgba(0,0,0,.06); flex-shrink: 0;
}
.nav-brand { display: flex; align-items: center; gap: 10px; text-decoration: none; }
.nav-brand-icon {
    width: 40px; height: 40px;
    background: linear-gradient(135deg, #1c64f2, #1e3a5f);
    border-radius: 10px; display: flex; align-items: center; justify-content: center;
    color: white; font-size: 20px; flex-shrink: 0;
}
.nav-brand-text { display: flex; flex-direction: column; line-height: 1.15; }
.nav-brand-sub  { font-size: 9px; font-weight: 700; letter-spacing: .12em; color: #64748b; text-transform: uppercase; }
.nav-brand-name { font-size: 16px; font-weight: 800; color: #0d1b3e; }

.nav-links { display: flex; align-items: center; gap: 4px; list-style: none; margin: 0; padding: 0; }
.nav-links a {
    display: block; padding: 6px 14px; border-radius: 8px;
    font-size: 13.5px; font-weight: 500; color: #334155;
    text-decoration: none; transition: all .18s;
}
.nav-links a:hover  { background: #f1f5f9; color: #1c64f2; }
.nav-links a.active { color: #1c64f2; font-weight: 700; border-bottom: 2px solid #1c64f2; border-radius: 0; }

.user-chip {
    display: flex; align-items: center; gap: 10px;
    padding: 5px 12px 5px 5px;
    border: 1.5px solid #e2e8f0; border-radius: 40px;
    cursor: pointer; transition: all .18s; background: white; position: relative;
}
.user-chip:hover { border-color: #bfdbfe; background: #eff6ff; }
.user-avatar {
    width: 32px; height: 32px; border-radius: 50%;
    background: linear-gradient(135deg, #1c64f2, #1e3a5f);
    display: flex; align-items: center; justify-content: center;
    color: white; font-size: 12px; font-weight: 800; flex-shrink: 0;
    overflow: hidden;
}
.user-avatar img { width: 100%; height: 100%; object-fit: cover; }
.user-info { line-height: 1.2; }
.user-name { font-size: 13px; font-weight: 700; color: #0d1b3e; }
.user-role { font-size: 10px; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: .05em; }
.user-dropdown {
    position: absolute; top: calc(100% + 8px); right: 0;
    background: white; border: 1px solid #e2e8f0;
    border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,.1);
    min-width: 190px; overflow: hidden; display: none; z-index: 200;
}
.user-chip.open .user-dropdown { display: block; }
.dd-item {
    display: flex; align-items: center; gap: 9px;
    padding: 10px 16px; font-size: 13px; font-weight: 500;
    color: #334155; text-decoration: none; transition: background .15s;
    background: none; border: none; width: 100%; cursor: pointer; text-align: left;
}
.dd-item:hover { background: #f1f5f9; color: #0d1b3e; }
.dd-item.danger { color: #ef4444; }
.dd-item.danger:hover { background: #fef2f2; }
.dd-divider { border-top: 1px solid #e2e8f0; margin: 4px 0; }

@media (max-width: 991px) {
    .nav-links { display: none; }
    .main-nav  { padding: 0 16px; }
}
</style>

@php
    $user     = Auth::user();
    $fullName = $user->nama ?? $user->name ?? 'User';
    $parts    = explode(' ', $fullName);
    $initials = strtoupper(substr($parts[0], 0, 1)) . strtoupper(substr($parts[1] ?? '', 0, 1));
@endphp

<nav class="main-nav">
    <a href="{{ route('home') }}" class="nav-brand">
        <div class="nav-brand-icon"><i class="bi bi-bank2"></i></div>
        <div class="nav-brand-text">
            <span class="nav-brand-sub">Kota Serang</span>
            <span class="nav-brand-name">Kelurahan Teritih</span>
        </div>
    </a>

    <ul class="nav-links">
        <li><a href="{{ route('home') }}"      class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a></li>
        <li><a href="{{ route('profil') }}"    class="{{ request()->routeIs('profil') ? 'active' : '' }}">Profil</a></li>
        <li><a href="{{ route('layanan') }}"   class="{{ request()->routeIs('layanan') ? 'active' : '' }}">Layanan</a></li>
        <li><a href="{{ route('informasi') }}" class="{{ request()->routeIs('informasi', 'informasi.berita') ? 'active' : '' }}">Informasi</a></li>
        <li><a href="{{ route('kontak') }}"    class="{{ request()->routeIs('kontak') ? 'active' : '' }}">Kontak</a></li>
    </ul>

    <div class="user-chip" id="userChipNav">
        <div class="user-avatar">
            @if($user->foto ?? null)
                <img src="{{ asset('storage/' . $user->foto) }}" alt="{{ $fullName }}">
            @else
                {{ $initials }}
            @endif
        </div>
        <div class="user-info">
            <div class="user-name">{{ $fullName }}</div>
            <div class="user-role">Masyarakat</div>
        </div>
        <i class="bi bi-chevron-down ms-1" style="font-size:11px;color:#64748b"></i>

        <div class="user-dropdown">
            {{-- Tidak ada lagi link Dashboard --}}
            <a href="{{ route('profile.edit') }}" class="dd-item">
                <i class="bi bi-person-circle"></i> Profil Saya
            </a>
            <a href="{{ route('user.permohonan.index') }}" class="dd-item">
                <i class="bi bi-file-earmark-text"></i> Permohonan Saya
            </a>
            <div class="dd-divider"></div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dd-item danger">
                    <i class="bi bi-box-arrow-right"></i> Keluar
                </button>
            </form>
        </div>
    </div>
</nav>

<script>
(function() {
    const chip = document.getElementById('userChipNav');
    if (!chip) return;
    chip.addEventListener('click', function(e) { e.stopPropagation(); this.classList.toggle('open'); });
    document.addEventListener('click', function() { chip.classList.remove('open'); });
})();
</script>