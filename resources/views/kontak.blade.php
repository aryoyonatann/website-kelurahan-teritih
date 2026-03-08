<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami – Kelurahan Teritih</title>

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

    /* ── HERO ──────────────────────────────────── */
    .kontak-hero {
        background: linear-gradient(135deg, var(--navy) 0%, var(--navy2) 55%, #1e4d8c 100%);
        margin: 24px 32px; border-radius: 20px;
        padding: 52px 56px; position: relative; overflow: hidden;
        display: flex; align-items: center; min-height: 230px;
    }
    .kontak-hero::before {
        content: ''; position: absolute; right: -60px; top: -60px;
        width: 360px; height: 360px; border-radius: 50%;
        border: 50px solid rgba(255,255,255,.04);
    }
    .kontak-hero::after {
        content: ''; position: absolute; right: 60px; bottom: -50px;
        width: 200px; height: 200px; border-radius: 50%;
        border: 28px solid rgba(255,255,255,.05);
    }
    .hero-badge {
        display: inline-flex; align-items: center; gap: 6px;
        background: rgba(255,255,255,.12); border: 1px solid rgba(255,255,255,.2);
        border-radius: 20px; padding: 4px 14px;
        font-size: 10px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase;
        color: #fbbf24; margin-bottom: 14px;
    }
    .hero-title       { font-size: 40px; font-weight: 800; color: white; line-height: 1.15; margin-bottom: 12px; }
    .hero-title span  { color: #60a5fa; }
    .hero-desc        { font-size: 14px; color: rgba(255,255,255,.72); max-width: 500px; line-height: 1.75; }
    .hero-emblem {
        position: absolute; right: 80px; top: 50%; transform: translateY(-50%);
        width: 150px; height: 150px;
        background: rgba(255,255,255,.08); border: 2px solid rgba(255,255,255,.15); border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        color: rgba(255,255,255,.55); font-size: 62px;
    }

    /* ── LAYOUT ────────────────────────────────── */
    .content-area { flex: 1; padding: 32px 32px 52px; }

    /* ── INFORMASI KONTAK CARD ─────────────────── */
    .info-kontak-card {
        background: white; border: 1px solid var(--border); border-radius: 16px; overflow: hidden; margin-bottom: 16px;
    }
    .card-header-title {
        padding: 16px 22px; border-bottom: 1px solid var(--border);
        font-size: 15px; font-weight: 800; color: var(--navy);
        display: flex; align-items: center; gap: 9px;
    }
    .card-header-title i { color: var(--blue); font-size: 18px; }

    .kontak-item {
        display: flex; align-items: flex-start; gap: 14px;
        padding: 16px 22px; border-bottom: 1px solid var(--border);
    }
    .kontak-item:last-child { border-bottom: none; }
    .kontak-item-icon {
        width: 40px; height: 40px; border-radius: 10px; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center; font-size: 18px;
    }
    .kontak-item-label { font-size: 12px; font-weight: 700; color: var(--navy); margin-bottom: 3px; }
    .kontak-item-value { font-size: 13px; color: var(--slate); line-height: 1.6; }
    .kontak-item-note  { font-size: 11px; color: var(--muted); margin-top: 2px; }

    /* ── JAM OPERASIONAL CARD ──────────────────── */
    .jam-card { background: white; border: 1px solid var(--border); border-radius: 16px; overflow: hidden; }
    .jam-card-header {
        padding: 16px 22px; border-bottom: 1px solid var(--border);
        font-size: 15px; font-weight: 800; color: var(--navy);
        display: flex; align-items: center; gap: 9px;
    }
    .jam-card-header i { color: var(--orange); font-size: 18px; }
    .jam-body  { padding: 8px 0; }
    .jam-row   { display: flex; justify-content: space-between; align-items: center; padding: 11px 22px; border-bottom: 1px solid var(--border); font-size: 13px; }
    .jam-row:last-child { border-bottom: none; }
    .jam-day   { font-weight: 600; color: var(--navy); }
    .jam-time  { color: var(--slate); font-size: 13px; font-weight: 600; }
    .jam-tutup {
        display: inline-flex; padding: 3px 10px; border-radius: 20px;
        font-size: 11px; font-weight: 700; background: #fef2f2; color: var(--red);
        letter-spacing: .04em;
    }

    /* ── KIRIM PESAN CARD ──────────────────────── */
    .pesan-card { background: white; border: 1px solid var(--border); border-radius: 16px; overflow: hidden; height: 100%; }
    .pesan-card-header { padding: 16px 24px; border-bottom: 1px solid var(--border); }
    .pesan-card-title  { font-size: 15px; font-weight: 800; color: var(--navy); display: flex; align-items: center; gap: 9px; margin-bottom: 4px; }
    .pesan-card-title i { color: var(--blue); font-size: 18px; }
    .pesan-card-sub    { font-size: 12.5px; color: var(--muted); line-height: 1.55; }
    .pesan-card-body   { padding: 22px 24px; }

    /* Form elements */
    .form-label-custom { font-size: 12.5px; font-weight: 700; color: var(--navy); margin-bottom: 6px; display: block; }
    .form-control-custom {
        width: 100%; padding: 10px 14px; border-radius: 9px;
        border: 1.5px solid var(--border); background: white;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 13.5px; color: var(--slate);
        transition: border-color .18s, box-shadow .18s; outline: none;
    }
    .form-control-custom::placeholder { color: #cbd5e1; }
    .form-control-custom:focus { border-color: var(--blue); box-shadow: 0 0 0 3px rgba(28,100,242,.1); }
    select.form-control-custom { appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%2394a3b8' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 14px center; padding-right: 36px; }
    textarea.form-control-custom { resize: vertical; min-height: 130px; }

    .btn-kirim {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 12px 28px; border-radius: 10px;
        font-size: 14px; font-weight: 700;
        background: var(--blue); color: white;
        border: none; cursor: pointer; transition: background .18s;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .btn-kirim:hover { background: var(--blue-dk); }

    /* ── PETA SECTION ──────────────────────────── */
    .peta-section { margin-top: 32px; }
    .peta-section-header {
        display: flex; align-items: flex-end; justify-content: space-between;
        flex-wrap: wrap; gap: 10px; margin-bottom: 16px;
    }
    .sec-title { font-size: 18px; font-weight: 800; color: var(--navy); display: flex; align-items: center; gap: 9px; margin-bottom: 3px; }
    .sec-sub   { font-size: 12.5px; color: var(--muted); margin: 0; }
    .btn-gmaps {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 8px 16px; border-radius: 9px;
        font-size: 12.5px; font-weight: 700;
        background: var(--blue-lt); color: var(--blue);
        border: 1px solid #bfdbfe; text-decoration: none; transition: all .18s;
    }
    .btn-gmaps:hover { background: var(--blue); color: white; border-color: var(--blue); }

    .peta-card { background: white; border: 1px solid var(--border); border-radius: 16px; overflow: hidden; }

    /* ── SUCCESS STATE ─────────────────────────── */
    .alert-success-custom {
        background: #ecfdf5; border: 1px solid #a7f3d0; border-radius: 10px;
        padding: 14px 18px; display: flex; align-items: center; gap: 10px;
        font-size: 13px; font-weight: 600; color: #065f46; margin-top: 16px;
        display: none;
    }
    .alert-success-custom i { font-size: 18px; color: var(--green); }

    @media (max-width: 991px) {
        .kontak-hero  { margin: 16px; padding: 36px 24px; }
        .hero-title   { font-size: 26px; }
        .hero-emblem  { display: none; }
        .content-area { padding: 20px 16px 36px; }
    }
    </style>
</head>
<body>

@include('partials.navbar')

{{-- HERO --}}
<div class="kontak-hero">
    <div style="position:relative;z-index:2;max-width:560px;">
        <div class="hero-badge">
            <i class="bi bi-headset" style="font-size:10px"></i>
            Layanan Masyarakat
        </div>
        <h1 class="hero-title">Hubungi <span>Kami</span></h1>
        <p class="hero-desc">
            Kami siap melayani Anda. Sampaikan pertanyaan, saran, pengaduan, atau butuh bantuan administrasi melalui saluran komunikasi yang tersedia.
        </p>
    </div>
    <div class="hero-emblem"><i class="bi bi-question-lg"></i></div>
</div>

<div class="content-area">

    {{-- ══ BARIS 1: KONTAK + JAM + KIRIM PESAN ══ --}}
    <div class="row g-4">

        {{-- Kolom kiri: Informasi Kontak + Jam Operasional --}}
        <div class="col-lg-4">

            {{-- Informasi Kontak --}}
            <div class="info-kontak-card">
                <div class="card-header-title">
                    <i class="bi bi-person-lines-fill"></i> Informasi Kontak
                </div>

                <div class="kontak-item">
                    <div class="kontak-item-icon" style="background:#eff6ff;color:#1c64f2">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <div>
                        <div class="kontak-item-label">Alamat Kantor</div>
                        <div class="kontak-item-value">
                            Jl. Raya Teritih No. 123, Kelurahan Teritih,<br>
                            Kecamatan Walantaka, Kota Serang,<br>
                            Banten 42183
                        </div>
                    </div>
                </div>

                <div class="kontak-item">
                    <div class="kontak-item-icon" style="background:#ecfdf5;color:#10b981">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <div>
                        <div class="kontak-item-label">Telepon</div>
                        <div class="kontak-item-value">(0254) 123456</div>
                        <div class="kontak-item-note">Layanan tersedia di jam kerja</div>
                    </div>
                </div>

                <div class="kontak-item">
                    <div class="kontak-item-icon" style="background:#fff7ed;color:#f59e0b">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <div>
                        <div class="kontak-item-label">Email &amp; WhatsApp</div>
                        <div class="kontak-item-value">admin@teritih.go.id</div>
                        <div class="kontak-item-value">+62 812-3456-7890 (WA Only)</div>
                    </div>
                </div>
            </div>

            {{-- Jam Operasional --}}
            <div class="jam-card">
                <div class="jam-card-header">
                    <i class="bi bi-clock-fill"></i> Jam Operasional
                </div>
                <div class="jam-body">
                    <div class="jam-row">
                        <span class="jam-day">Senin–Kamis</span>
                        <span class="jam-time">08:00 – 16:00 WIB</span>
                    </div>
                    <div class="jam-row">
                        <span class="jam-day">Jumat</span>
                        <span class="jam-time">08:00 – 16:30 WIB</span>
                    </div>
                    <div class="jam-row">
                        <span class="jam-day">Sabtu–Minggu</span>
                        <span class="jam-tutup">TUTUP / LIBUR</span>
                    </div>
                </div>
            </div>

        </div>

        {{-- Kolom kanan: Form Kirim Pesan --}}
        <div class="col-lg-8">
            <div class="pesan-card">
                <div class="pesan-card-header">
                    <div class="pesan-card-title">
                        <i class="bi bi-send-fill"></i> Kirim Pesan
                    </div>
                    <div class="pesan-card-sub">
                        Silakan isi formulir di bawah ini untuk mengirimkan pesan, pertanyaan, atau saran Anda secara langsung kepada staf kelurahan.
                    </div>
                </div>
                <div class="pesan-card-body">
                    <form id="formKirimPesan" onsubmit="handleSubmit(event)">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label-custom">Nama Lengkap</label>
                                <input type="text" class="form-control-custom" placeholder="Masukkan nama Anda" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label-custom">Email</label>
                                <input type="email" class="form-control-custom" placeholder="contoh@email.com" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">Subjek / Perihal</label>
                            <select class="form-control-custom" required>
                                <option value="" disabled selected>Pilih Kategori Pesan</option>
                                <option>Pertanyaan Layanan</option>
                                <option>Pengaduan</option>
                                <option>Saran &amp; Masukan</option>
                                <option>Informasi Administrasi</option>
                                <option>Lainnya</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label-custom">Isi Pesan</label>
                            <textarea class="form-control-custom" placeholder="Tuliskan pesan Anda secara detail di sini..." required></textarea>
                        </div>

                        <button type="submit" class="btn-kirim">
                            Kirim Pesan <i class="bi bi-send-fill"></i>
                        </button>

                        <div class="alert-success-custom" id="alertSukses">
                            <i class="bi bi-check-circle-fill"></i>
                            Pesan Anda berhasil dikirim! Kami akan merespons dalam 1×24 jam kerja.
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    {{-- ══ PETA LOKASI ══ --}}
    <div class="peta-section">
        <div class="peta-section-header">
            <div>
                <div class="sec-title">
                    <i class="bi bi-map-fill" style="color:var(--red)"></i> Peta Lokasi
                </div>
                <p class="sec-sub">Temukan lokasi Kantor Kelurahan Teritih dengan mudah.</p>
            </div>
            <a href="https://maps.google.com/?q=Walantaka,Kota+Serang,Banten" target="_blank" class="btn-gmaps">
                <i class="bi bi-box-arrow-up-right"></i> Buka di Google Maps
            </a>
        </div>

        <div class="peta-card">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15866.25!2d106.1543!3d-6.1227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e418a2a78a50e07%3A0x74c78c4f5c5eed87!2sWalantaka%2C%20Kota%20Serang%2C%20Banten!5e0!3m2!1sid!2sid!4v1700000000000"
                width="100%" height="420" style="border:0;display:block;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>
    </div>

</div>

@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
function handleSubmit(e) {
    e.preventDefault();
    const btn = document.querySelector('.btn-kirim');
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Mengirim...';
    setTimeout(() => {
        document.getElementById('alertSukses').style.display = 'flex';
        btn.disabled = false;
        btn.innerHTML = 'Kirim Pesan <i class="bi bi-send-fill"></i>';
        document.getElementById('formKirimPesan').reset();
        document.getElementById('alertSukses').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }, 1200);
}
</script>
</body>
</html>