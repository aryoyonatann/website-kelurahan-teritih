<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun – Kelurahan Teritih</title>

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
        --red:     #ef4444;
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background: var(--bg);
        color: var(--slate);
        font-size: 14px;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    /* =====================================================
       NAVBAR
    ===================================================== */
    .reg-nav {
        background: white;
        border-bottom: 1px solid var(--border);
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

    .reg-nav-brand {
        display: flex; align-items: center; gap: 10px;
        text-decoration: none;
    }
    .reg-nav-icon {
        width: 40px; height: 40px;
        background: linear-gradient(135deg, var(--blue), var(--navy2));
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        color: white; font-size: 20px;
    }
    .reg-nav-text { display: flex; flex-direction: column; line-height: 1.15; }
    .reg-nav-sub  { font-size: 9px; font-weight: 700; letter-spacing: .12em; color: var(--muted); text-transform: uppercase; }
    .reg-nav-name { font-size: 16px; font-weight: 800; color: var(--navy); }

    .reg-nav-links {
        display: flex; align-items: center; gap: 4px;
        list-style: none; margin: 0; padding: 0;
    }
    .reg-nav-links a {
        display: block; padding: 6px 14px; border-radius: 8px;
        font-size: 13.5px; font-weight: 500;
        color: var(--slate); text-decoration: none; transition: all .18s;
    }
    .reg-nav-links a:hover { background: var(--bg); color: var(--blue); }

    .reg-nav-cta { display: flex; align-items: center; gap: 10px; }

    .btn-masuk {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 7px 18px; border-radius: 8px;
        font-size: 13px; font-weight: 700;
        background: var(--navy); color: white;
        border: none; text-decoration: none;
        transition: background .18s;
    }
    .btn-masuk:hover { background: var(--navy2); color: white; }

    /* =====================================================
       PAGE BODY
    ===================================================== */
    .page-body {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 36px 20px;
    }

    /* =====================================================
       REGISTER CARD
    ===================================================== */
    .reg-card {
        width: 100%;
        max-width: 980px;
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 16px 48px rgba(0,0,0,.10);
        display: flex;
        align-items: stretch;
    }

    /* LEFT PANEL */
    .left-panel {
        flex: 0 0 42%;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 36px 32px 28px;
    }

    .left-panel::before {
        content: '';
        position: absolute; inset: 0;
        background:
            linear-gradient(to top, rgba(10,20,50,.97) 0%, rgba(10,20,50,.65) 45%, rgba(10,20,50,.35) 100%),
            url('https://images.unsplash.com/photo-1486325212027-8081e485255e?w=900&q=80') center/cover no-repeat;
        z-index: 0;
    }

    .lp-top, .lp-mid, .lp-bot { position: relative; z-index: 1; }

    .lp-badge {
        display: inline-flex; align-items: center; gap: 6px;
        background: rgba(255,255,255,.15);
        border: 1px solid rgba(255,255,255,.25);
        border-radius: 20px; padding: 5px 13px;
        font-size: 11px; font-weight: 700;
        color: rgba(255,255,255,.9); margin-bottom: 20px;
    }

    .lp-title {
        font-size: 30px; font-weight: 800;
        color: white; line-height: 1.2; margin-bottom: 14px;
    }

    .lp-desc {
        font-size: 13px; color: rgba(255,255,255,.72); line-height: 1.7;
    }

    /* Manfaat box */
    .lp-manfaat {
        background: rgba(255,255,255,.1);
        border: 1px solid rgba(255,255,255,.18);
        border-radius: 12px;
        padding: 16px 18px;
        backdrop-filter: blur(4px);
    }
    .lp-manfaat-title {
        font-size: 12px; font-weight: 700;
        color: white; margin-bottom: 10px;
    }
    .lp-manfaat-item {
        display: flex; align-items: center; gap: 8px;
        font-size: 12px; color: rgba(255,255,255,.85);
        margin-bottom: 7px;
    }
    .lp-manfaat-item:last-child { margin-bottom: 0; }
    .lp-manfaat-item i { color: #34d399; font-size: 14px; flex-shrink: 0; }

    .lp-copy {
        font-size: 11px; color: rgba(255,255,255,.38);
        border-top: 1px solid rgba(255,255,255,.12); padding-top: 12px;
    }

    /* RIGHT PANEL */
    .right-panel {
        flex: 1;
        padding: 36px 44px;
        overflow-y: auto;
    }

    .rp-title    { font-size: 24px; font-weight: 800; color: var(--navy); margin-bottom: 4px; }
    .rp-subtitle { font-size: 13px; color: var(--muted); margin-bottom: 24px; line-height: 1.6; }

    .field-label { font-size: 13px; font-weight: 600; color: var(--navy); margin-bottom: 6px; display: block; }

    /* Input wrap */
    .input-wrap { position: relative; }
    .input-wrap .ico-l {
        position: absolute; left: 14px; top: 50%;
        transform: translateY(-50%);
        color: #94a3b8; font-size: 15px; z-index: 2;
        pointer-events: none;
    }
    .input-wrap .ico-r {
        position: absolute; right: 14px; top: 50%;
        transform: translateY(-50%);
        color: #94a3b8; font-size: 15px; z-index: 2;
        cursor: pointer; transition: color .18s;
    }
    .input-wrap .ico-r:hover { color: var(--blue); }

    .input-wrap input,
    .input-wrap textarea {
        display: block; width: 100%;
        padding: 0 42px;
        border-radius: 9px;
        border: 1.5px solid var(--border);
        font-size: 13px; font-family: inherit;
        color: var(--navy); background: white;
        outline: none; transition: border-color .18s, box-shadow .18s;
    }
    .input-wrap input       { height: 44px; }
    .input-wrap textarea    { height: 80px; padding-top: 11px; padding-bottom: 11px; resize: none; line-height: 1.5; }

    /* textarea icon stays at top */
    .input-wrap.textarea-wrap .ico-l { top: 14px; transform: none; }

    .input-wrap input:focus,
    .input-wrap textarea:focus {
        border-color: var(--blue);
        box-shadow: 0 0 0 3px rgba(28,100,242,.12);
    }
    .input-wrap input.is-invalid,
    .input-wrap textarea.is-invalid { border-color: var(--red); }

    .invalid-feedback { font-size: 12px; color: var(--red); margin-top: 5px; display: block; }

    .btn-register {
        width: 100%; height: 48px;
        background: var(--blue); color: white;
        border: none; border-radius: 10px;
        font-size: 14px; font-weight: 700;
        cursor: pointer; transition: background .18s;
        display: flex; align-items: center; justify-content: center; gap: 8px;
    }
    .btn-register:hover { background: var(--blue-dk); }

    .divider-row {
        text-align: center; font-size: 13px;
        color: var(--muted); margin: 14px 0 4px;
    }
    .divider-row a { font-weight: 700; color: var(--blue); text-decoration: none; }
    .divider-row a:hover { text-decoration: underline; }

    .secure-note {
        border: 1.5px solid var(--border); border-radius: 10px;
        padding: 10px 16px; text-align: center;
        font-size: 12px; color: var(--muted);
        display: flex; align-items: center; justify-content: center; gap: 6px;
        margin-top: 10px;
    }
    .secure-note i { color: var(--green); font-size: 14px; }

    /* =====================================================
       FOOTER
    ===================================================== */
    .main-footer { background: #0f172a; flex-shrink: 0; padding: 48px 32px 0; }

    .footer-logo {
        width: 36px; height: 36px; background: var(--blue);
        border-radius: 8px; display: flex;
        align-items: center; justify-content: center;
        color: white; font-size: 18px; flex-shrink: 0;
    }
    .footer-brand-name { font-size: 15px; font-weight: 800; color: white; line-height: 1.2; }
    .footer-brand-sub  { font-size: 10px; color: #64748b; text-transform: uppercase; letter-spacing: .05em; }
    .footer-desc       { font-size: 12.5px; color: #94a3b8; line-height: 1.75; margin-bottom: 16px; }

    .footer-social {
        width: 32px; height: 32px; background: #1e293b;
        border-radius: 7px; display: inline-flex;
        align-items: center; justify-content: center;
        color: #94a3b8; text-decoration: none;
        font-size: 15px; transition: all .18s;
    }
    .footer-social:hover { background: var(--blue); color: white; }

    .footer-heading {
        font-size: 12px; font-weight: 700; color: #cbd5e1;
        text-transform: uppercase; letter-spacing: .08em; margin-bottom: 16px;
    }
    .footer-links        { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px; }
    .footer-links a      { color: #94a3b8; text-decoration: none; font-size: 13px; transition: color .18s; }
    .footer-links a:hover{ color: #60a5fa; }

    .footer-contact      { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px; }
    .footer-contact li   { display: flex; gap: 10px; font-size: 12.5px; color: #94a3b8; align-items: flex-start; }
    .footer-contact li i { color: #60a5fa; flex-shrink: 0; margin-top: 2px; }

    .footer-map { border-radius: 10px; overflow: hidden; border: 1px solid #1e293b; }

    .footer-bottom {
        border-top: 1px solid #1e293b; padding: 16px 0; margin-top: 16px;
        display: flex; justify-content: space-between; align-items: center;
        flex-wrap: wrap; gap: 10px; font-size: 12px; color: #475569;
    }
    .footer-bottom a { color: #64748b; text-decoration: none; transition: color .18s; }
    .footer-bottom a:hover { color: #94a3b8; }

    /* =====================================================
       RESPONSIVE
    ===================================================== */
    @media (max-width: 767px) {
        .left-panel     { display: none; }
        .right-panel    { padding: 28px 20px; }
        .reg-nav-links  { display: none; }
        .reg-nav        { padding: 0 16px; }
        .page-body      { padding: 20px 12px; }
        .main-footer    { padding: 36px 16px 0; }
    }
    </style>
</head>
<body>

{{-- =====================================================
     NAVBAR
===================================================== --}}
<nav class="reg-nav">
    <a href="{{ route('home') }}" class="reg-nav-brand">
        <div class="reg-nav-icon"><i class="bi bi-bank2"></i></div>
        <div class="reg-nav-text">
            <span class="reg-nav-sub">Kota Serang</span>
            <span class="reg-nav-name">Kelurahan Teritih</span>
        </div>
    </a>

    <ul class="reg-nav-links">
        <li><a href="{{ route('home') }}">Beranda</a></li>
        <li><a href="#">Profil</a></li>
        <li><a href="#">Layanan</a></li>
        <li><a href="#">Informasi</a></li>
        <li><a href="#">Kontak</a></li>
    </ul>

    <div class="reg-nav-cta">
        <a href="{{ route('login') }}" class="btn-masuk">
            <i class="bi bi-box-arrow-in-right"></i> Masuk
        </a>
    </div>
</nav>


{{-- =====================================================
     PAGE BODY
===================================================== --}}
<div class="page-body">
    <div class="reg-card">

        {{-- LEFT PANEL --}}
        <div class="left-panel">
            <div class="lp-top">
                <div class="lp-badge">
                    <i class="bi bi-person-plus-fill" style="font-size:11px"></i>
                    Registrasi Warga Baru
                </div>
                <h2 class="lp-title">Mulai Akses<br>Layanan Digital</h2>
                <p class="lp-desc">
                    Daftarkan diri Anda untuk menikmati kemudahan layanan administrasi kependudukan tanpa antri.
                </p>
            </div>

            <div class="lp-mid">
                <div class="lp-manfaat">
                    <div class="lp-manfaat-title">Manfaat Akun Terdaftar:</div>
                    <div class="lp-manfaat-item">
                        <i class="bi bi-check-circle-fill"></i>
                        Pantau status pengajuan surat realtime
                    </div>
                    <div class="lp-manfaat-item">
                        <i class="bi bi-check-circle-fill"></i>
                        Riwayat pelayanan tersimpan rapi
                    </div>
                    <div class="lp-manfaat-item">
                        <i class="bi bi-check-circle-fill"></i>
                        Notifikasi langsung ke perangkat Anda
                    </div>
                </div>
            </div>

            <div class="lp-bot">
                <div class="lp-copy">
                    © {{ date('Y') }} Pemerintah Kota Serang. All rights reserved.
                </div>
            </div>
        </div>

        {{-- RIGHT PANEL --}}
        <div class="right-panel">
            <div class="rp-title">Pendaftaran Akun</div>
            <div class="rp-subtitle">Lengkapi data diri Anda di bawah ini dengan benar.</div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Nama Lengkap --}}
                <div class="mb-3">
                    <label class="field-label">Nama Lengkap</label>
                    <div class="input-wrap">
                        <i class="bi bi-person ico-l"></i>
                        <input type="text" name="nama"
                               class="{{ $errors->has('nama') ? 'is-invalid' : '' }}"
                               placeholder="Nama sesuai KTP"
                               value="{{ old('nama') }}" required>
                    </div>
                    @error('nama') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                {{-- NIK --}}
                <div class="mb-3">
                    <label class="field-label">NIK</label>
                    <div class="input-wrap">
                        <i class="bi bi-credit-card ico-l"></i>
                        <input type="text" name="nik"
                               class="{{ $errors->has('nik') ? 'is-invalid' : '' }}"
                               placeholder="Masukkan 16 digit NIK"
                               value="{{ old('nik') }}" required maxlength="16">
                    </div>
                    @error('nik') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                {{-- Alamat --}}
                <div class="mb-3">
                    <label class="field-label">Alamat</label>
                    <div class="input-wrap textarea-wrap">
                        <i class="bi bi-house ico-l"></i>
                        <textarea name="alamat"
                                  class="{{ $errors->has('alamat') ? 'is-invalid' : '' }}"
                                  placeholder="Alamat lengkap sesuai KTP"
                                  required>{{ old('alamat') }}</textarea>
                    </div>
                    @error('alamat') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                {{-- No HP --}}
                <div class="mb-3">
                    <label class="field-label">No. Telepon</label>
                    <div class="input-wrap">
                        <i class="bi bi-telephone ico-l"></i>
                        <input type="text" name="no_hp"
                               class="{{ $errors->has('no_hp') ? 'is-invalid' : '' }}"
                               placeholder="08xxxxxxxxxx"
                               value="{{ old('no_hp') }}" required>
                    </div>
                    @error('no_hp') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                {{-- Alamat Email --}}
                <div class="mb-3">
                    <label class="field-label">Alamat Email</label>
                    <div class="input-wrap">
                        <i class="bi bi-envelope ico-l"></i>
                        <input type="email" name="email"
                               class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                               placeholder="contoh@email.com"
                               value="{{ old('email') }}" required>
                    </div>
                    @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                {{-- Tempat & Tanggal Lahir --}}
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="field-label">Tempat Lahir</label>
                        <div class="input-wrap">
                            <i class="bi bi-geo-alt ico-l"></i>
                            <input type="text" name="tempat_lahir"
                                   placeholder="Kota kelahiran"
                                   value="{{ old('tempat_lahir') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="field-label">Tanggal Lahir</label>
                        <div class="input-wrap">
                            <i class="bi bi-calendar3 ico-l"></i>
                            <input type="date" name="tanggal_lahir"
                                   value="{{ old('tanggal_lahir') }}">
                        </div>
                    </div>
                </div>

                {{-- Kata Sandi --}}
                <div class="mb-3">
                    <label class="field-label">Kata Sandi</label>
                    <div class="input-wrap">
                        <i class="bi bi-lock ico-l"></i>
                        <input type="password" name="password"
                               id="password"
                               class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                               placeholder="Minimal 8 karakter"
                               required>
                        <i class="bi bi-eye-slash ico-r" id="togglePassword"></i>
                    </div>
                    @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                {{-- Ulangi Kata Sandi --}}
                <div class="mb-3">
                    <label class="field-label">Ulangi Kata Sandi</label>
                    <div class="input-wrap">
                        <i class="bi bi-shield-lock ico-l"></i>
                        <input type="password" name="password_confirmation"
                               id="password2"
                               placeholder="Masukkan ulang kata sandi"
                               required>
                        <i class="bi bi-eye-slash ico-r" id="togglePassword2"></i>
                    </div>
                </div>

                {{-- Checkbox Syarat --}}
                <div class="form-check mb-4" style="margin-left:2px">
                    <input class="form-check-input" type="checkbox" id="syarat" required>
                    <label class="form-check-label" for="syarat" style="font-size:13px;color:var(--slate)">
                        Saya menyatakan data yang diisi adalah benar dan menyetujui
                        <a href="#" style="color:var(--blue);font-weight:600;text-decoration:none">Syarat &amp; Ketentuan</a>
                        layanan.
                    </label>
                </div>

                <button type="submit" class="btn-register">
                    <i class="bi bi-person-plus-fill"></i> Daftar Sekarang
                </button>
            </form>

            <div class="divider-row">
                Sudah memiliki akun terdaftar? <a href="{{ route('login') }}">Masuk Disini</a>
            </div>

            <div class="secure-note">
                <i class="bi bi-shield-fill-check"></i>
                Data Anda dilindungi enkripsi SSL 256-bit
            </div>
        </div>

    </div>
</div>


{{-- =====================================================
     FOOTER
===================================================== --}}
<footer class="main-footer">
    <div class="container-fluid px-0">
        <div class="row g-4 pb-2">

            {{-- Brand --}}
            <div class="col-lg-3 col-md-6">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="footer-logo"><i class="bi bi-bank2"></i></div>
                    <div>
                        <div class="footer-brand-name">Kelurahan Teritih</div>
                        <div class="footer-brand-sub">Kota Serang</div>
                    </div>
                </div>
                <p class="footer-desc">
                    Mewujudkan tata kelola pemerintahan yang baik, bersih, dan melayani masyarakat dengan sepenuh hati.
                </p>
                <div class="d-flex gap-2">
                    <a href="#" class="footer-social"><i class="bi bi-globe2"></i></a>
                    <a href="#" class="footer-social"><i class="bi bi-envelope-fill"></i></a>
                    <a href="#" class="footer-social"><i class="bi bi-telephone-fill"></i></a>
                </div>
            </div>

            {{-- Tautan Cepat --}}
            <div class="col-lg-2 col-md-6">
                <div class="footer-heading">Tautan Cepat</div>
                <ul class="footer-links">
                    <li><a href="#">Profil Kelurahan</a></li>
                    <li><a href="#">Struktur Organisasi</a></li>
                    <li><a href="#">Layanan Online</a></li>
                    <li><a href="#">Transparansi Anggaran</a></li>
                    <li><a href="#">Peta Wilayah</a></li>
                </ul>
            </div>

            {{-- Kontak --}}
            <div class="col-lg-4 col-md-6">
                <div class="footer-heading">Kontak Kami</div>
                <ul class="footer-contact">
                    <li>
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>Jl. Raya Teritih No. 123, Kecamatan Walantaka, Kota Serang, Banten 42183</span>
                    </li>
                    <li><i class="bi bi-telephone-fill"></i><span>(0254) 123456</span></li>
                    <li><i class="bi bi-envelope-fill"></i><span>admin@teritih.go.id</span></li>
                    <li><i class="bi bi-clock-fill"></i><span>Senin–Jumat: 08.00–16.00</span></li>
                </ul>
            </div>

            {{-- Peta --}}
            <div class="col-lg-3 col-md-6">
                <div class="footer-heading">Lokasi Kantor</div>
                <div class="footer-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15866.25!2d106.1543!3d-6.1227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e418a2a78a50e07%3A0x74c78c4f5c5eed87!2sSerang%2C%20Kota%20Serang%2C%20Banten!5e0!3m2!1sen!2sid!4v1700000000000"
                        width="100%" height="130" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>

        </div>

        <div class="footer-bottom">
            <span>© {{ date('Y') }} Kelurahan Teritih, Kota Serang. Hak Cipta Dilindungi.</span>
            <div class="d-flex gap-4">
                <a href="#">Kebijakan Privasi</a>
                <a href="#">Syarat &amp; Ketentuan</a>
                <a href="#">Peta Situs</a>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Toggle password
function makeToggle(inputId, toggleId) {
    const input  = document.getElementById(inputId);
    const toggle = document.getElementById(toggleId);
    if (!input || !toggle) return;
    toggle.addEventListener('click', function () {
        input.type = input.type === 'password' ? 'text' : 'password';
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });
}
makeToggle('password',  'togglePassword');
makeToggle('password2', 'togglePassword2');
</script>
</body>
</html>