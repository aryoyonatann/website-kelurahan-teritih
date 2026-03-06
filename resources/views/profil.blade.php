<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Kelurahan – Kelurahan Teritih</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
    /* =====================================================
       VARIABLES & RESET
       CSS navbar & footer sudah ada di partials/navbar.blade.php
       dan partials/footer.blade.php
    ===================================================== */
    :root {
        --blue:    #1c64f2;
        --blue-dk: #1a56db;
        --blue-lt: #eff6ff;
        --navy:    #0d1b3e;
        --navy2:   #1e3a5f;
        --slate:   #334155;
        --muted:   #64748b;
        --border:  #e2e8f0;
        --bg:      #f1f5f9;
        --white:   #ffffff;
        --green:   #10b981;
        --orange:  #f59e0b;
        --red:     #ef4444;
    }

    *, *::before, *::after { box-sizing: border-box; }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background: var(--bg);
        color: var(--slate);
        font-size: 14px;
        line-height: 1.6;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    /* =====================================================
       PAGE HEADER (breadcrumb)
    ===================================================== */
    .page-header {
        background: white;
        border-bottom: 1px solid var(--border);
        padding: 14px 32px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .breadcrumb-custom { display: flex; align-items: center; gap: 6px; font-size: 13px; color: var(--muted); margin: 0; }
    .breadcrumb-custom a { color: var(--muted); text-decoration: none; transition: color .18s; }
    .breadcrumb-custom a:hover { color: var(--blue); }
    .breadcrumb-custom .sep { font-size: 12px; }
    .breadcrumb-custom .current { color: var(--navy); font-weight: 600; }

    .page-title { font-size: 22px; font-weight: 800; color: var(--navy); margin: 0; }

    .kelurahan-badge {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 5px 13px; border-radius: 20px;
        font-size: 12px; font-weight: 700;
        background: var(--blue-lt); color: var(--blue);
        border: 1px solid #bfdbfe;
    }

    /* =====================================================
       MAIN CONTENT
    ===================================================== */
    .content-area { flex: 1; padding: 28px 32px 40px; }

    /* About Card */
    .about-card { background: white; border: 1px solid var(--border); border-radius: 16px; overflow: hidden; margin-bottom: 24px; }
    .about-img-wrap { position: relative; height: 220px; overflow: hidden; }
    .about-img-wrap img { width: 100%; height: 100%; object-fit: cover; }
    .about-img-caption {
        position: absolute; bottom: 0; left: 0; right: 0;
        background: linear-gradient(to top, rgba(10,20,50,.8) 0%, transparent 100%);
        padding: 20px 20px 14px;
        display: flex; align-items: flex-end; gap: 8px;
        color: white; font-size: 13px; font-weight: 700;
    }
    .about-body { padding: 24px; }
    .about-body p { font-size: 13.5px; line-height: 1.8; color: var(--slate); margin-bottom: 14px; }
    .about-body p:last-child { margin-bottom: 0; }
    .about-body strong { color: var(--navy); font-weight: 700; }

    /* Data Singkat */
    .data-singkat-card { background: white; border: 1px solid var(--border); border-radius: 16px; overflow: hidden; margin-bottom: 16px; }
    .ds-header { padding: 14px 18px; border-bottom: 1px solid var(--border); display: flex; align-items: center; gap: 8px; font-size: 13.5px; font-weight: 700; color: var(--navy); }
    .ds-header i { color: var(--blue); font-size: 16px; }
    .ds-body { padding: 4px 0; }
    .ds-row { display: flex; justify-content: space-between; align-items: center; padding: 10px 18px; border-bottom: 1px solid var(--border); font-size: 13px; }
    .ds-row:last-child { border-bottom: none; }
    .ds-label { color: var(--muted); }
    .ds-value { font-weight: 700; color: var(--navy); }

    /* Layanan Digital */
    .layanan-card { background: linear-gradient(135deg, var(--blue), var(--blue-dk)); border-radius: 16px; padding: 22px 20px; }
    .layanan-card-title { font-size: 15px; font-weight: 800; color: white; margin-bottom: 6px; }
    .layanan-card-desc  { font-size: 12.5px; color: rgba(255,255,255,.78); line-height: 1.6; margin-bottom: 16px; }
    .btn-layanan {
        display: block; width: 100%; padding: 9px;
        background: white; color: var(--blue);
        border: none; border-radius: 9px;
        font-size: 13px; font-weight: 700;
        text-align: center; text-decoration: none;
        transition: all .18s; cursor: pointer;
    }
    .btn-layanan:hover { background: #f0f7ff; color: var(--blue-dk); }

    /* =====================================================
       VISI MISI
    ===================================================== */
    .visi-card {
        background: white; border: 1px solid var(--border);
        border-top: 3px solid var(--blue);
        border-radius: 16px; padding: 32px 28px;
        text-align: center; height: 100%;
    }
    .visi-icon { width: 56px; height: 56px; border-radius: 50%; background: var(--blue-lt); display: flex; align-items: center; justify-content: center; font-size: 24px; color: var(--blue); margin: 0 auto 18px; }
    .visi-title { font-size: 18px; font-weight: 800; color: var(--navy); margin-bottom: 16px; }
    .visi-text  { font-size: 14px; color: var(--slate); line-height: 1.8; font-style: italic; font-weight: 500; }

    .misi-card { background: white; border: 1px solid var(--border); border-top: 3px solid var(--blue); border-radius: 16px; padding: 28px; height: 100%; }
    .misi-header { display: flex; align-items: center; gap: 10px; margin-bottom: 20px; }
    .misi-icon  { width: 40px; height: 40px; border-radius: 10px; background: var(--blue-lt); display: flex; align-items: center; justify-content: center; font-size: 20px; color: var(--blue); flex-shrink: 0; }
    .misi-title { font-size: 18px; font-weight: 800; color: var(--navy); }
    .misi-item  { display: flex; align-items: flex-start; gap: 10px; margin-bottom: 14px; font-size: 13.5px; color: var(--slate); line-height: 1.6; }
    .misi-item:last-child { margin-bottom: 0; }
    .misi-item i { color: var(--blue); font-size: 16px; flex-shrink: 0; margin-top: 2px; }

    /* =====================================================
       STRUKTUR ORGANISASI
    ===================================================== */
    .struktur-section { background: white; border: 1px solid var(--border); border-radius: 16px; padding: 36px 28px; margin-top: 24px; }
    .struktur-label    { font-size: 11px; font-weight: 700; color: var(--blue); letter-spacing: .1em; text-transform: uppercase; text-align: center; margin-bottom: 8px; }
    .struktur-title    { font-size: 26px; font-weight: 800; color: var(--navy); text-align: center; margin-bottom: 8px; }
    .struktur-subtitle { font-size: 13px; color: var(--muted); text-align: center; margin-bottom: 36px; }

    .org-chart     { display: flex; flex-direction: column; align-items: center; }
    .org-node-wrap { display: flex; flex-direction: column; align-items: center; }
    .org-node {
        background: white; border: 2px solid var(--border);
        border-radius: 12px; padding: 16px 24px;
        text-align: center; min-width: 180px; transition: box-shadow .18s;
    }
    .org-node.lurah { border-color: var(--blue); box-shadow: 0 4px 16px rgba(28,100,242,.15); }
    .org-node:hover { box-shadow: 0 6px 20px rgba(28,100,242,.12); }
    .org-avatar { width: 48px; height: 48px; border-radius: 50%; background: var(--bg); border: 2px solid var(--border); display: flex; align-items: center; justify-content: center; font-size: 22px; color: var(--muted); margin: 0 auto 10px; }
    .org-avatar.lurah-av { background: var(--blue-lt); border-color: #bfdbfe; color: var(--blue); }
    .org-name { font-size: 13.5px; font-weight: 700; color: var(--navy); line-height: 1.3; }
    .org-role  { font-size: 10px; font-weight: 700; color: var(--blue); text-transform: uppercase; letter-spacing: .08em; margin-top: 3px; }
    .org-role.sekre { color: var(--muted); }
    .org-role.kasi  { color: var(--slate); }

    .org-line-v   { width: 2px; height: 32px; background: var(--border); }
    .org-children { display: flex; gap: 24px; justify-content: center; align-items: flex-start; }
    .org-child-wrap { display: flex; flex-direction: column; align-items: center; }
    .org-child-line { width: 2px; height: 32px; background: var(--border); }

    /* =====================================================
       RESPONSIVE (page content saja, navbar/footer ada di partial)
    ===================================================== */
    @media (max-width: 991px) {
        .page-header  { padding: 12px 16px; flex-wrap: wrap; gap: 8px; }
        .content-area { padding: 20px 16px 32px; }
        .org-children { flex-direction: column; align-items: center; }
    }
    </style>
</head>
<body>

@include('partials.navbar')

<div class="page-header">
    <div>
        <div class="breadcrumb-custom mb-1">
            <a href="{{ route('home') }}">Beranda</a>
            <span class="sep"><i class="bi bi-chevron-right" style="font-size:10px"></i></span>
            <span class="current">Profil Kelurahan</span>
        </div>
        <h1 class="page-title">Profil Kelurahan</h1>
    </div>
    <div class="kelurahan-badge">
        <i class="bi bi-check-circle-fill" style="font-size:12px"></i>
        Kelurahan Teritih
    </div>
</div>

<div class="content-area">
    <div class="row g-4">

        <div class="col-lg-8">

            {{-- About Card --}}
            <div class="about-card">
                <div class="about-img-wrap">
                    <img src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=900&q=80" alt="Kantor Kelurahan Teritih">
                    <div class="about-img-caption">
                        <i class="bi bi-building"></i> Tentang Kelurahan
                    </div>
                </div>
                <div class="about-body">
                    <p>
                        <strong>Kelurahan Teritih</strong> adalah salah satu kelurahan yang berada di wilayah Kecamatan Walantaka, Kota Serang, Provinsi Banten. Kelurahan ini memiliki peran strategis dalam pengembangan wilayah perkotaan Serang bagian timur, dengan fokus pada pelayanan publik yang prima dan pemberdayaan masyarakat yang berkelanjutan.
                    </p>
                    <p>
                        Secara geografis, Kelurahan Teritih berbatasan langsung dengan pusat pemerintahan kecamatan, menjadikannya area yang mudah diakses oleh masyarakat. Wilayah ini didominasi oleh kawasan pemukiman yang asri serta beberapa area pertanian yang masih dipertahankan sebagai ruang terbuka hijau.
                    </p>
                    <p>
                        Kami berkomitmen untuk terus berinovasi dalam memberikan pelayanan administrasi kependudukan yang cepat, transparan, dan akuntabel melalui pemanfaatan teknologi informasi, guna mewujudkan <em>Smart Village</em> di Kota Serang.
                    </p>
                </div>
            </div>

            {{-- Visi Misi --}}
            <div class="row g-4 mb-0">
                <div class="col-md-5">
                    <div class="visi-card">
                        <div class="visi-icon"><i class="bi bi-eye-fill"></i></div>
                        <div class="visi-title">Visi</div>
                        <div class="visi-text">
                            "Terwujudnya Kelurahan Teritih yang Maju, Sejahtera, dan Berkeadaban Melalui Pelayanan Publik yang Prima dan Inovatif."
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="misi-card">
                        <div class="misi-header">
                            <div class="misi-icon"><i class="bi bi-flag-fill"></i></div>
                            <div class="misi-title">Misi</div>
                        </div>
                        <div class="misi-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Meningkatkan kualitas sumber daya manusia yang berakhlak mulia dan berdaya saing.</span>
                        </div>
                        <div class="misi-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Mewujudkan tata kelola pemerintahan yang bersih, transparan, dan akuntabel.</span>
                        </div>
                        <div class="misi-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Meningkatkan infrastruktur wilayah yang mendukung perekonomian masyarakat.</span>
                        </div>
                        <div class="misi-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Mengembangkan potensi ekonomi lokal berbasis pemberdayaan masyarakat.</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Struktur Organisasi --}}
            <div class="struktur-section">
                <div class="struktur-label">Pemerintahan</div>
                <div class="struktur-title">Struktur Organisasi</div>
                <div class="struktur-subtitle">Bagan susunan organisasi dan tata kerja pemerintah Kelurahan Teritih.</div>

                <div class="org-chart">
                    <div class="org-node-wrap">
                        <div class="org-node lurah">
                            <div class="org-avatar lurah-av"><i class="bi bi-person-fill"></i></div>
                            <div class="org-name">H. Ahmad Fauzi, S.Sos</div>
                            <div class="org-role">Lurah</div>
                        </div>
                    </div>

                    <div class="org-line-v"></div>

                    <div class="org-node-wrap">
                        <div class="org-node">
                            <div class="org-avatar"><i class="bi bi-person-fill"></i></div>
                            <div class="org-name">Rina Wulandari, S.IP</div>
                            <div class="org-role sekre">Sekretaris Kelurahan</div>
                        </div>
                    </div>

                    <div class="org-line-v"></div>

                    <div style="position:relative;width:100%;display:flex;justify-content:center;">
                        <div style="position:absolute;top:0;left:50%;transform:translateX(-50%);width:520px;height:2px;background:var(--border);max-width:90vw;"></div>
                    </div>

                    <div class="org-children mt-0 pt-0" style="margin-top:0">
                        <div class="org-child-wrap">
                            <div class="org-child-line"></div>
                            <div class="org-node" style="min-width:150px">
                                <div class="org-avatar"><i class="bi bi-person-fill"></i></div>
                                <div class="org-name">Budi Hartono</div>
                                <div class="org-role kasi">Kasi Pemerintahan</div>
                            </div>
                        </div>
                        <div class="org-child-wrap">
                            <div class="org-child-line"></div>
                            <div class="org-node" style="min-width:150px">
                                <div class="org-avatar"><i class="bi bi-person-fill"></i></div>
                                <div class="org-name">Siti Aminah</div>
                                <div class="org-role kasi">Kasi Kesos</div>
                            </div>
                        </div>
                        <div class="org-child-wrap">
                            <div class="org-child-line"></div>
                            <div class="org-node" style="min-width:150px">
                                <div class="org-avatar"><i class="bi bi-person-fill"></i></div>
                                <div class="org-name">Dedi Supriyadi</div>
                                <div class="org-role kasi">Kasi Pembangunan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-4">

            {{-- Data Singkat --}}
            <div class="data-singkat-card">
                <div class="ds-header">
                    <i class="bi bi-info-circle-fill"></i> Data Singkat
                </div>
                <div class="ds-body">
                    <div class="ds-row">
                        <span class="ds-label">Kode Pos</span>
                        <span class="ds-value">42183</span>
                    </div>
                    <div class="ds-row">
                        <span class="ds-label">Luas Wilayah</span>
                        <span class="ds-value">3.554 km²</span>
                    </div>
                    <div class="ds-row">
                        <span class="ds-label">Jumlah Penduduk</span>
                        <span class="ds-value">10.518 Jiwa</span>
                    </div>
                    <div class="ds-row">
                        <span class="ds-label">Kecamatan</span>
                        <span class="ds-value">Walantaka</span>
                    </div>
                    <div class="ds-row">
                        <span class="ds-label">Kota</span>
                        <span class="ds-value">Serang</span>
                    </div>
                </div>
            </div>

            {{-- Layanan Digital --}}
            <div class="layanan-card">
                <div class="layanan-card-title">Layanan Digital</div>
                <div class="layanan-card-desc">Akses layanan kelurahan kapan saja dan di mana saja.</div>
                <a href="{{ route('user.dashboard') }}" class="btn-layanan">Buka Dashboard</a>
            </div>

        </div>

    </div>
</div>

@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>