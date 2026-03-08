<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Berita &amp; Pengumuman – Kelurahan Teritih</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
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
        --green:   #10b981;
        --orange:  #f59e0b;
        --red:     #ef4444;
    }
    *, *::before, *::after { box-sizing: border-box; }
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background: var(--bg); color: var(--slate);
        font-size: 14px; line-height: 1.6;
        min-height: 100vh; display: flex; flex-direction: column;
    }

    /* ── PAGE HEADER ───────────────────── */
    .page-header {
        background: white; border-bottom: 1px solid var(--border);
        padding: 14px 32px; display: flex; align-items: center; justify-content: space-between;
    }
    .breadcrumb-custom { display: flex; align-items: center; gap: 6px; font-size: 13px; color: var(--muted); margin: 0; }
    .breadcrumb-custom a { color: var(--muted); text-decoration: none; transition: color .18s; }
    .breadcrumb-custom a:hover { color: var(--blue); }
    .breadcrumb-custom .current { color: var(--navy); font-weight: 600; }
    .page-title { font-size: 22px; font-weight: 800; color: var(--navy); margin: 0; }

    /* ── LAYOUT ────────────────────────── */
    .content-area { flex: 1; padding: 28px 32px 52px; }

    /* ── FILTER BAR ────────────────────── */
    .filter-bar {
        background: white; border: 1px solid var(--border); border-radius: 12px;
        padding: 12px 16px; display: flex; align-items: center; gap: 8px;
        flex-wrap: wrap; margin-bottom: 24px;
    }
    .filter-label { font-size: 12px; font-weight: 600; color: var(--muted); margin-right: 4px; }
    .filter-btn {
        padding: 5px 14px; border-radius: 20px; font-size: 12px; font-weight: 600;
        border: 1.5px solid var(--border); background: white; color: var(--slate);
        cursor: pointer; transition: all .18s; text-decoration: none; display: inline-block;
    }
    .filter-btn:hover, .filter-btn.active {
        background: var(--blue); border-color: var(--blue); color: white;
    }

    /* ── FEATURED ARTICLE ──────────────── */
    .featured-wrap {
        background: white; border: 1px solid var(--border); border-radius: 16px;
        overflow: hidden; text-decoration: none; color: inherit; display: block; transition: box-shadow .2s;
    }
    .featured-wrap:hover { box-shadow: 0 8px 28px rgba(0,0,0,.1); }

    .featured-img {
        height: 320px; overflow: hidden; position: relative;
        background: var(--navy); display: flex; align-items: center; justify-content: center;
        color: rgba(255,255,255,.3); font-size: 64px;
    }
    .featured-img img { width: 100%; height: 100%; object-fit: cover; }
    .featured-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(10,20,50,.88) 0%, rgba(10,20,50,.2) 60%, transparent 100%);
        padding: 28px; display: flex; flex-direction: column; justify-content: flex-end;
    }
    .featured-meta { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; }
    .featured-title { font-size: 22px; font-weight: 800; color: white; line-height: 1.3; margin-bottom: 10px; }
    .featured-desc  { font-size: 13px; color: rgba(255,255,255,.75); line-height: 1.65; margin-bottom: 14px; }
    .btn-baca-full {
        display: inline-flex; align-items: center; gap: 6px;
        background: rgba(255,255,255,.18); border: 1px solid rgba(255,255,255,.3);
        border-radius: 8px; padding: 7px 16px;
        font-size: 12.5px; font-weight: 700; color: white; text-decoration: none; transition: all .18s;
    }
    .btn-baca-full:hover { background: rgba(255,255,255,.28); color: white; }

    /* ── SMALL BERITA SIDEBAR ──────────── */
    .berita-side {
        background: white; border: 1px solid var(--border); border-radius: 12px;
        overflow: hidden; text-decoration: none; color: inherit;
        display: flex; gap: 0; transition: box-shadow .18s; margin-bottom: 12px;
    }
    .berita-side:last-child { margin-bottom: 0; }
    .berita-side:hover { box-shadow: 0 4px 16px rgba(0,0,0,.08); }
    .berita-side-img {
        width: 90px; height: 90px; flex-shrink: 0; overflow: hidden;
        background: var(--bg); display: flex; align-items: center; justify-content: center;
        color: var(--muted); font-size: 24px;
    }
    .berita-side-img img { width: 100%; height: 100%; object-fit: cover; }
    .berita-side-body { padding: 11px 14px; flex: 1; display: flex; flex-direction: column; justify-content: center; }
    .berita-side-title { font-size: 12.5px; font-weight: 700; color: var(--navy); line-height: 1.4; margin-bottom: 6px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .berita-side-date  { font-size: 11px; color: var(--muted); }

    /* ── GRID BERITA (baris bawah) ─────── */
    .berita-grid-card {
        background: white; border: 1px solid var(--border); border-radius: 14px;
        overflow: hidden; text-decoration: none; color: inherit;
        display: flex; flex-direction: column; transition: all .2s; height: 100%;
    }
    .berita-grid-card:hover { box-shadow: 0 6px 20px rgba(0,0,0,.09); transform: translateY(-2px); }
    .berita-grid-img {
        height: 150px; overflow: hidden; position: relative;
        background: var(--bg); display: flex; align-items: center; justify-content: center;
        color: var(--muted); font-size: 32px;
    }
    .berita-grid-img img { width: 100%; height: 100%; object-fit: cover; }
    .date-pill {
        position: absolute; top: 10px; left: 10px;
        background: rgba(255,255,255,.92); backdrop-filter: blur(4px);
        border-radius: 7px; padding: 3px 9px; font-size: 11px; font-weight: 700; color: var(--navy);
    }
    .berita-grid-body { padding: 14px; flex: 1; display: flex; flex-direction: column; }
    .berita-grid-title { font-size: 13px; font-weight: 700; color: var(--navy); line-height: 1.4; margin-bottom: 8px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .link-baca { font-size: 12.5px; font-weight: 600; color: var(--blue); text-decoration: none; display: inline-flex; align-items: center; gap: 4px; margin-top: auto; }

    /* ── PAGINATION ────────────────────── */
    .pagination-wrap { display: flex; justify-content: center; align-items: center; gap: 6px; margin-top: 36px; }
    .page-btn {
        width: 36px; height: 36px; border-radius: 8px; border: 1.5px solid var(--border);
        background: white; color: var(--slate); font-size: 13px; font-weight: 600;
        display: flex; align-items: center; justify-content: center;
        cursor: pointer; transition: all .18s; text-decoration: none;
    }
    .page-btn:hover, .page-btn.active {
        background: var(--blue); border-color: var(--blue); color: white;
    }

    /* ── CATEGORY BADGES ───────────────── */
    .cat { display: inline-flex; padding: 3px 10px; border-radius: 20px; font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: .04em; }
    .cat-kegiatan    { background: #eff6ff; color: #1c64f2; }
    .cat-pengumuman  { background: #fff7ed; color: #d97706; }
    .cat-sosial      { background: #ecfdf5; color: #10b981; }
    .cat-pembangunan { background: #fdf4ff; color: #a855f7; }
    .cat-kesehatan   { background: #fff1f2; color: #f43f5e; }
    .cat-pendidikan  { background: #f0fdf4; color: #059669; }

    /* ── SECTION TITLE ─────────────────── */
    .sec-title { font-size: 18px; font-weight: 800; color: var(--navy); display: flex; align-items: center; gap: 9px; margin-bottom: 3px; }
    .sec-sub   { font-size: 12.5px; color: var(--muted); margin-bottom: 20px; }

    @media (max-width: 991px) {
        .page-header  { padding: 12px 16px; flex-wrap: wrap; gap: 8px; }
        .content-area { padding: 20px 16px 36px; }
        .featured-img { height: 220px; }
        .featured-title { font-size: 17px; }
    }
    </style>
</head>
<body>

@include('partials.navbar')

{{-- PAGE HEADER --}}
<div class="page-header">
    <div>
        <div class="breadcrumb-custom mb-1">
            <a href="{{ route('home') }}">Beranda</a>
            <span style="font-size:10px"><i class="bi bi-chevron-right"></i></span>
            <a href="{{ route('informasi') }}">Informasi</a>
            <span style="font-size:10px"><i class="bi bi-chevron-right"></i></span>
            <span class="current">Berita &amp; Pengumuman</span>
        </div>
        <h1 class="page-title">Berita &amp; Pengumuman</h1>
    </div>
    <div style="font-size:12px;color:var(--muted)">Menampilkan <strong style="color:var(--navy)">12</strong> dari 24 artikel</div>
</div>

<div class="content-area">

    {{-- FILTER BAR --}}
    <div class="filter-bar">
        <span class="filter-label">Filter:</span>
        <a href="#" class="filter-btn active">Semua</a>
        <a href="#" class="filter-btn">Kegiatan</a>
        <a href="#" class="filter-btn">Pengumuman</a>
        <a href="#" class="filter-btn">Sosial</a>
        <a href="#" class="filter-btn">Pembangunan</a>
        <a href="#" class="filter-btn">Kesehatan</a>
        <a href="#" class="filter-btn">Pendidikan</a>
    </div>

    {{-- SECTION HEADER --}}
    <div class="sec-title mb-1"><i class="bi bi-newspaper" style="color:var(--blue)"></i> Semua Berita &amp; Pengumuman</div>
    <div class="sec-sub">Update terkini kegiatan dan informasi penting.</div>

    {{-- FEATURED + SIDEBAR --}}
    <div class="row g-3 mb-3">
        {{-- Featured (kiri besar) --}}
        <div class="col-lg-6">
            <a href="#" class="featured-wrap h-100" style="display:flex;flex-direction:column;">
                <div class="featured-img" style="flex:1;min-height:280px;">
                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&q=80" alt="Kerja Bakti">
                    <div class="featured-overlay">
                        <div class="featured-meta">
                            <span class="cat cat-kegiatan">Kegiatan Utama</span>
                            <span style="font-size:11px;color:rgba(255,255,255,.7)"><i class="bi bi-calendar3 me-1"></i>12 Okt 2023</span>
                        </div>
                        <div class="featured-title">Kerja Bakti Masal: Warga RW 04 Bersinergi Membersihkan Lingkungan</div>
                        <div class="featured-desc">Antusiasme warga sangat tinggi dalam kegiatan jumat bersih yang diadakan serentak. Kegiatan ini dihadiri langsung oleh Bapak Lurah dan...</div>
                        <span class="btn-baca-full"><i class="bi bi-arrow-up-right"></i> Baca Berita Lengkap</span>
                    </div>
                </div>
            </a>
        </div>

        {{-- Sidebar kanan --}}
        <div class="col-lg-6">
            <a href="#" class="berita-side">
                <div class="berita-side-img">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=200&q=80" alt="">
                </div>
                <div class="berita-side-body">
                    <span class="cat cat-pengumuman d-inline-block mb-1" style="font-size:9px">Pengumuman</span>
                    <div class="berita-side-title">Jadwal Pelayanan Keliling Administrasi Kependudukan</div>
                    <div class="berita-side-date"><i class="bi bi-calendar3 me-1"></i>10 Okt 2023</div>
                </div>
            </a>
            <a href="#" class="berita-side">
                <div class="berita-side-img">
                    <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=200&q=80" alt="">
                </div>
                <div class="berita-side-body">
                    <span class="cat cat-sosial d-inline-block mb-1" style="font-size:9px">Sosial</span>
                    <div class="berita-side-title">Penyaluran Bantuan Langsung Tunai (BLT) Tahap 3</div>
                    <div class="berita-side-date"><i class="bi bi-calendar3 me-1"></i>05 Okt 2023</div>
                </div>
            </a>
            <a href="#" class="berita-side">
                <div class="berita-side-img" style="background:#fdf4ff;color:#a855f7;font-size:28px">
                    <i class="bi bi-cone-striped"></i>
                </div>
                <div class="berita-side-body">
                    <span class="cat cat-pembangunan d-inline-block mb-1" style="font-size:9px">Pembangunan</span>
                    <div class="berita-side-title">Perbaikan Jalan Lingkungan RW 02 Segera Rampung</div>
                    <div class="berita-side-date"><i class="bi bi-calendar3 me-1"></i>01 Okt 2023</div>
                </div>
            </a>
            <a href="#" class="berita-side" style="margin-bottom:0;">
                <div class="berita-side-img" style="background:#f0fdf4;color:#059669;font-size:28px">
                    <i class="bi bi-book-fill"></i>
                </div>
                <div class="berita-side-body">
                    <span class="cat cat-pendidikan d-inline-block mb-1" style="font-size:9px">Pendidikan</span>
                    <div class="berita-side-title">Pelatihan Kerajinan Tangan Ibu-Ibu PKK</div>
                    <div class="berita-side-date"><i class="bi bi-calendar3 me-1"></i>28 Sep 2023</div>
                </div>
            </a>
        </div>
    </div>

    {{-- GRID 3 KOLOM --}}
    <div class="row g-3">
        <div class="col-md-4">
            <a href="#" class="berita-grid-card">
                <div class="berita-grid-img">
                    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=500&q=80" alt="">
                    <span class="date-pill">01 Okt 2023</span>
                </div>
                <div class="berita-grid-body">
                    <span class="cat cat-pembangunan mb-2 d-inline-block">Pembangunan</span>
                    <div class="berita-grid-title">Perbaikan Jalan Lingkungan RW 02 Segera Rampung</div>
                    <span class="link-baca">Baca Selengkapnya <i class="bi bi-arrow-right"></i></span>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="#" class="berita-grid-card">
                <div class="berita-grid-img">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=500&q=80" alt="">
                    <span class="date-pill">28 Sep 2023</span>
                </div>
                <div class="berita-grid-body">
                    <span class="cat cat-pendidikan mb-2 d-inline-block">Pendidikan</span>
                    <div class="berita-grid-title">Pelatihan Kerajinan Tangan Ibu-Ibu PKK</div>
                    <span class="link-baca">Baca Selengkapnya <i class="bi bi-arrow-right"></i></span>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="#" class="berita-grid-card">
                <div class="berita-grid-img">
                    <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=500&q=80" alt="">
                    <span class="date-pill">25 Sep 2023</span>
                </div>
                <div class="berita-grid-body">
                    <span class="cat cat-kesehatan mb-2 d-inline-block">Kesehatan</span>
                    <div class="berita-grid-title">Pemeriksaan Kesehatan Gratis Posyandu Lansia</div>
                    <span class="link-baca">Baca Selengkapnya <i class="bi bi-arrow-right"></i></span>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="#" class="berita-grid-card">
                <div class="berita-grid-img" style="background:#ecfdf5;color:#10b981;">
                    <i class="bi bi-camera-video-fill"></i>
                    <span class="date-pill">20 Sep 2023</span>
                </div>
                <div class="berita-grid-body">
                    <span class="cat cat-kegiatan mb-2 d-inline-block">Kegiatan</span>
                    <div class="berita-grid-title">Lomba 17 Agustus: Semangat Kemerdekaan di Kelurahan Teritih</div>
                    <span class="link-baca">Baca Selengkapnya <i class="bi bi-arrow-right"></i></span>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="#" class="berita-grid-card">
                <div class="berita-grid-img" style="background:#fff7ed;color:#d97706;">
                    <i class="bi bi-megaphone-fill"></i>
                    <span class="date-pill">15 Sep 2023</span>
                </div>
                <div class="berita-grid-body">
                    <span class="cat cat-pengumuman mb-2 d-inline-block">Pengumuman</span>
                    <div class="berita-grid-title">Jadwal Pemutakhiran Data Kependudukan Semester II</div>
                    <span class="link-baca">Baca Selengkapnya <i class="bi bi-arrow-right"></i></span>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="#" class="berita-grid-card">
                <div class="berita-grid-img" style="background:#eff6ff;color:#1c64f2;">
                    <i class="bi bi-droplet-fill"></i>
                    <span class="date-pill">10 Sep 2023</span>
                </div>
                <div class="berita-grid-body">
                    <span class="cat cat-kegiatan mb-2 d-inline-block">Kegiatan</span>
                    <div class="berita-grid-title">Sosialisasi Program Hemat Air dan Pengolahan Sampah</div>
                    <span class="link-baca">Baca Selengkapnya <i class="bi bi-arrow-right"></i></span>
                </div>
            </a>
        </div>
    </div>

    {{-- PAGINATION --}}
    <div class="pagination-wrap">
        <a href="#" class="page-btn"><i class="bi bi-chevron-left" style="font-size:12px"></i></a>
        <a href="#" class="page-btn active">1</a>
        <a href="#" class="page-btn">2</a>
        <a href="#" class="page-btn">3</a>
        <span style="color:var(--muted);font-size:14px;font-weight:700;">...</span>
        <a href="#" class="page-btn">8</a>
        <a href="#" class="page-btn"><i class="bi bi-chevron-right" style="font-size:12px"></i></a>
    </div>

</div>

@include('partials.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>