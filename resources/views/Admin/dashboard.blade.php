@extends('admin.layouts.app')

@section('title', 'Dashboard')

@push('styles')
{{-- Google Fonts --}}
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
{{-- Bootstrap Icons --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<style>
/* =========================================================
   GLOBAL
========================================================= */
:root {
    --blue:       #1c64f2;
    --blue-dk:    #1a56db;
    --blue-lt:    #eff6ff;
    --navy:       #0f172a;
    --slate:      #334155;
    --muted:      #64748b;
    --border:     #e2e8f0;
    --bg:         #f1f5f9;
    --white:      #ffffff;
    --green:      #10b981;
    --orange:     #f59e0b;
    --red:        #ef4444;
    --purple:     #8b5cf6;
    --yellow:     #eab308;
}

body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: var(--bg);
    color: var(--navy);
    font-size: 14px;
}

/* =========================================================
   PAGE CONTENT
========================================================= */
.page-wrapper { padding: 28px; }

.page-title    { font-size: 22px; font-weight: 800; color: var(--navy); }
.page-subtitle { font-size: 13px; color: var(--muted); margin-top: 2px; }

.btn-period {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 7px 14px; border-radius: 8px;
    font-size: 13px; font-weight: 500;
    border: 1px solid var(--border); background: white;
    color: var(--slate); cursor: pointer; text-decoration: none;
    transition: all .18s;
}
.btn-period:hover { border-color: var(--blue); color: var(--blue); }

.btn-report {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 7px 18px; border-radius: 8px;
    font-size: 13px; font-weight: 600;
    border: none; background: var(--blue);
    color: white; cursor: pointer; text-decoration: none;
    transition: background .18s;
}
.btn-report:hover { background: var(--blue-dk); color: white; }

/* =========================================================
   STAT CARDS
========================================================= */
.stat-card {
    background: white; border-radius: 12px;
    border: 1px solid var(--border);
    padding: 18px 20px;
    display: flex; align-items: flex-start; justify-content: space-between;
    transition: box-shadow .2s;
}
.stat-card:hover { box-shadow: 0 6px 20px rgba(0,0,0,.08); }

.stat-label { font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: .05em; color: var(--muted); margin-bottom: 4px; }
.stat-value { font-size: 28px; font-weight: 800; color: var(--navy); line-height: 1.1; }
.stat-sub   { font-size: 11px; margin-top: 6px; display: flex; align-items: center; gap: 4px; }
.stat-sub.up      { color: var(--green); }
.stat-sub.warn    { color: var(--orange); }
.stat-sub.info    { color: var(--blue); }
.stat-sub.danger  { color: var(--red); }

.stat-icon {
    width: 46px; height: 46px; border-radius: 11px;
    display: flex; align-items: center; justify-content: center;
    font-size: 22px; flex-shrink: 0;
}
.icon-blue   { background: #eff6ff; color: var(--blue); }
.icon-orange { background: #fffbeb; color: var(--orange); }
.icon-green  { background: #ecfdf5; color: var(--green); }
.icon-red    { background: #fef2f2; color: var(--red); }
.icon-purple { background: #f5f3ff; color: var(--purple); }

/* =========================================================
   QUICK MENU
========================================================= */
.quick-card {
    background: white; border-radius: 12px;
    border: 1px solid var(--border);
    padding: 18px 14px;
    text-align: center; text-decoration: none;
    color: var(--navy); display: block;
    transition: all .2s;
}
.quick-card:hover { box-shadow: 0 6px 20px rgba(0,0,0,.09); transform: translateY(-2px); color: var(--blue); }

.quick-icon {
    width: 48px; height: 48px; border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 22px; margin: 0 auto 10px;
}
.quick-title { font-size: 13px; font-weight: 700; margin-bottom: 2px; }
.quick-desc  { font-size: 11px; color: var(--muted); }

/* =========================================================
   CARD BASE
========================================================= */
.dash-card {
    background: white; border-radius: 12px;
    border: 1px solid var(--border);
    overflow: hidden;
}

.dash-card-header {
    display: flex; align-items: center; justify-content: space-between;
    padding: 14px 18px; border-bottom: 1px solid var(--border);
}
.dash-card-title {
    font-size: 14px; font-weight: 700; color: var(--navy);
    display: flex; align-items: center; gap: 7px;
}
.dash-card-title i { color: var(--blue); font-size: 16px; }

.dash-card-body { padding: 6px 18px 6px; }

.btn-card-add {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 5px 12px; border-radius: 6px;
    font-size: 12px; font-weight: 600;
    background: var(--blue); color: white;
    border: none; cursor: pointer; text-decoration: none;
    transition: background .18s;
}
.btn-card-add:hover { background: var(--blue-dk); color: white; }

.btn-card-link {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 5px 12px; border-radius: 6px;
    font-size: 12px; font-weight: 600;
    background: var(--blue-lt); color: var(--blue);
    border: none; cursor: pointer; text-decoration: none;
    transition: background .18s;
}
.btn-card-link:hover { background: #dbeafe; color: var(--blue-dk); }

/* =========================================================
   BERITA LIST
========================================================= */
.berita-item {
    display: flex; align-items: center; gap: 12px;
    padding: 12px 0; border-bottom: 1px solid var(--border);
}
.berita-item:last-child { border-bottom: none; }

.berita-thumb {
    width: 56px; height: 44px; border-radius: 8px;
    background: var(--bg); flex-shrink: 0;
    display: flex; align-items: center; justify-content: center;
    color: var(--muted); font-size: 22px;
    overflow: hidden;
}
.berita-thumb img { width: 100%; height: 100%; object-fit: cover; }

.berita-title { font-size: 13px; font-weight: 600; color: var(--navy); overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 300px; }
.berita-meta  { font-size: 11px; color: var(--muted); margin-top: 3px; }

.action-icon-btn {
    width: 28px; height: 28px; border-radius: 6px;
    border: 1px solid var(--border); background: white;
    cursor: pointer; display: inline-flex;
    align-items: center; justify-content: center;
    font-size: 13px; color: var(--muted);
    text-decoration: none; transition: all .18s;
}
.action-icon-btn.edit:hover  { background: var(--blue-lt); color: var(--blue); border-color: #93c5fd; }
.action-icon-btn.del:hover   { background: #fef2f2; color: var(--red); border-color: #fecaca; }

.card-more-link {
    display: block; text-align: center; padding: 11px;
    font-size: 12px; font-weight: 600; color: var(--blue);
    border-top: 1px solid var(--border); text-decoration: none;
    transition: background .18s;
}
.card-more-link:hover { background: var(--blue-lt); color: var(--blue-dk); }

/* =========================================================
   BADGES
========================================================= */
.bdg {
    display: inline-flex; align-items: center;
    padding: 2px 9px; border-radius: 20px;
    font-size: 10px; font-weight: 600;
}
.bdg-published  { background: #ecfdf5; color: var(--green); }
.bdg-draft      { background: #fffbeb; color: var(--orange); }
.bdg-pending    { background: #eff6ff; color: var(--blue); }
.bdg-approved   { background: #ecfdf5; color: var(--green); }
.bdg-rejected   { background: #fef2f2; color: var(--red); }
.bdg-processing { background: #f5f3ff; color: var(--purple); }

/* =========================================================
   AKTIVITAS TABLE
========================================================= */
.aktivitas-tbl { width: 100%; border-collapse: collapse; font-size: 13px; }
.aktivitas-tbl th {
    padding: 10px 14px;
    text-align: left; font-size: 11px; font-weight: 700;
    text-transform: uppercase; letter-spacing: .05em;
    color: var(--muted); border-bottom: 1px solid var(--border);
    background: #f8fafc;
}
.aktivitas-tbl td {
    padding: 11px 14px;
    border-bottom: 1px solid var(--border);
    color: var(--slate); vertical-align: middle;
}
.aktivitas-tbl tbody tr:last-child td { border-bottom: none; }
.aktivitas-tbl tbody tr:hover td { background: #f8fafc; }

.user-cell    { display: flex; align-items: center; gap: 9px; }
.user-av {
    width: 30px; height: 30px; border-radius: 7px;
    color: white; font-size: 11px; font-weight: 700;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.user-av.blue   { background: linear-gradient(135deg,var(--blue),#60a5fa); }
.user-av.green  { background: linear-gradient(135deg,var(--green),#6ee7b7); }
.user-av.purple { background: linear-gradient(135deg,var(--purple),#c4b5fd); }
.user-av.orange { background: linear-gradient(135deg,var(--orange),#fcd34d); }

.user-nm  { font-weight: 600; color: var(--navy); font-size: 13px; line-height: 1.2; }
.user-nik { font-size: 11px; color: var(--muted); }

/* =========================================================
   SIDEBAR
========================================================= */
.notif-item {
    display: flex; gap: 10px;
    padding: 10px 0; border-bottom: 1px dashed var(--border);
}
.notif-item:last-child { border-bottom: none; }

.notif-dot {
    width: 8px; height: 8px; border-radius: 50%;
    margin-top: 5px; flex-shrink: 0;
}
.dot-blue   { background: var(--blue); }
.dot-orange { background: var(--orange); }
.dot-green  { background: var(--green); }

.notif-text { font-size: 12px; color: var(--slate); line-height: 1.5; }
.notif-time { font-size: 11px; color: var(--muted); margin-top: 2px; }

.jam-row {
    display: flex; justify-content: space-between; align-items: center;
    padding: 9px 0; border-bottom: 1px dashed var(--border);
    font-size: 13px;
}
.jam-row:last-child { border-bottom: none; }
.jam-day  { font-weight: 600; color: var(--navy); }
.jam-time { color: var(--slate); font-size: 12px; }

.bdg-closed {
    display: inline-flex; padding: 2px 9px;
    border-radius: 20px; font-size: 10px; font-weight: 600;
    background: #fef2f2; color: var(--red);
}

.status-open {
    background: #f0fdf4; border: 1px solid #bbf7d0;
    border-radius: 8px; padding: 9px 12px;
    font-size: 12px; color: #166534;
    display: flex; align-items: center; gap: 6px;
    margin-top: 12px;
}
</style>
@endpush

@section('content')

{{-- HEADER --}}
@include('admin.partials.header')

<div class="page-wrapper">

    {{-- ── PAGE HEADER ── --}}
    <div class="d-flex align-items-start justify-content-between mb-4 flex-wrap gap-3">
        <div>
            <div class="page-title">Dashboard Overview</div>
            <div class="page-subtitle">Selamat datang kembali, berikut ringkasan aktivitas hari ini.</div>
        </div>
        <div class="d-flex gap-2 align-items-center">
            <button class="btn-period">
                <i class="bi bi-calendar3"></i>
                Periode: {{ \Carbon\Carbon::now()->translatedFormat('F Y') }}
            </button>
            <a href="{{ route('permohonan.index') }}" class="btn-report">
                <i class="bi bi-plus-lg"></i> Buat Laporan
            </a>
        </div>
    </div>

    {{-- ── STAT CARDS ── --}}
    <div class="row g-3 mb-3">
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div>
                    <div class="stat-label">Total Warga</div>
                    <div class="stat-value">{{ number_format($totalWarga) }}</div>
                    <div class="stat-sub info">
                        <i class="bi bi-people"></i> Warga terdaftar
                    </div>
                </div>
                <div class="stat-icon icon-blue"><i class="bi bi-people-fill"></i></div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div>
                    <div class="stat-label">Perlu Verifikasi</div>
                    <div class="stat-value">{{ number_format($perluVerifikasi) }}</div>
                    <div class="stat-sub warn">
                        <i class="bi bi-exclamation-circle"></i>
                        {{ $perluVerifikasi > 0 ? 'Segera ditindaklanjuti' : 'Semua sudah diproses' }}
                    </div>
                </div>
                <div class="stat-icon icon-orange"><i class="bi bi-clipboard2-check-fill"></i></div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div>
                    <div class="stat-label">Surat Keluar</div>
                    <div class="stat-value">{{ number_format($suratKeluar) }}</div>
                    <div class="stat-sub info">
                        <i class="bi bi-envelope-check"></i> Total disetujui
                    </div>
                </div>
                <div class="stat-icon icon-green"><i class="bi bi-envelope-paper-fill"></i></div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div>
                    <div class="stat-label">Laporan Warga</div>
                    <div class="stat-value">—</div>
                    <div class="stat-sub muted" style="color:var(--muted)">
                        <i class="bi bi-flag"></i> Belum tersedia
                    </div>
                </div>
                <div class="stat-icon icon-red"><i class="bi bi-megaphone-fill"></i></div>
            </div>
        </div>
    </div>

    {{-- ── QUICK MENU ── --}}
    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-6">
            <a href="{{ route('kependudukan.index') }}" class="quick-card">
                <div class="quick-icon icon-blue"><i class="bi bi-person-vcard-fill"></i></div>
                <div class="quick-title">Data Warga</div>
                <div class="quick-desc">Kelola data kependudukan</div>
            </a>
        </div>
        <div class="col-xl-3 col-6">
            <a href="{{ route('permohonan.index') }}" class="quick-card">
                <div class="quick-icon" style="background:#fffbeb;color:var(--yellow)"><i class="bi bi-shield-check"></i></div>
                <div class="quick-title">Verifikasi</div>
                <div class="quick-desc">Verifikasi dokumen masuk</div>
            </a>
        </div>
        <div class="col-xl-3 col-6">
            <div class="quick-card" style="cursor:default;opacity:.7">
                <div class="quick-icon icon-green"><i class="bi bi-file-earmark-arrow-up-fill"></i></div>
                <div class="quick-title">Laporan</div>
                <div class="quick-desc">Segera hadir</div>
            </div>
        </div>
        <div class="col-xl-3 col-6">
            <a href="{{ route('informasi-admin.index') }}" class="quick-card">
                <div class="quick-icon" style="background:#fff7ed;color:var(--orange)"><i class="bi bi-newspaper"></i></div>
                <div class="quick-title">Berita</div>
                <div class="quick-desc">Kelola konten berita</div>
            </a>
        </div>
    </div>

    {{-- ── MAIN GRID ── --}}
    <div class="row g-3 mb-3">

        {{-- LEFT COLUMN --}}
        <div class="col-xl-8">

            {{-- Manajemen Berita --}}
            <div class="dash-card mb-3">
                <div class="dash-card-header">
                    <div class="dash-card-title">
                        <i class="bi bi-newspaper"></i> Manajemen Berita
                    </div>
                    <a href="{{ route('informasi-admin.create') }}" class="btn-card-add">
                        <i class="bi bi-plus-lg"></i> Tulis Baru
                    </a>
                </div>
                <div class="dash-card-body">
                    @forelse($beritaTerbaru as $berita)
                    <div class="berita-item">
                        <div class="berita-thumb">
                            @if($berita->gambar)
                                <img src="{{ asset('storage/'.$berita->gambar) }}" alt="">
                            @else
                                <i class="bi bi-image"></i>
                            @endif
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <div class="berita-title">{{ $berita->judul }}</div>
                            <div class="berita-meta d-flex align-items-center gap-2">
                                @if($berita->status == 'publish')
                                    <span class="bdg bdg-published">Terbit</span>
                                @else
                                    <span class="bdg bdg-draft">Draft</span>
                                @endif
                                {{ $berita->tanggal_publish ? \Carbon\Carbon::parse($berita->tanggal_publish)->format('d M Y') : 'Belum terbit' }}
                            </div>
                        </div>
                        <div class="d-flex gap-1 flex-shrink-0">
                            <a href="{{ route('informasi-admin.edit', $berita->id_informasi) }}" class="action-icon-btn edit"><i class="bi bi-pencil"></i></a>
                        </div>
                    </div>
                    @empty
                    <div style="text-align:center;padding:24px;color:var(--muted);font-size:13px;">
                        <i class="bi bi-newspaper" style="font-size:28px;display:block;margin-bottom:8px;color:var(--border)"></i>
                        Belum ada berita. <a href="{{ route('informasi-admin.create') }}" style="color:var(--blue)">Tulis sekarang</a>
                    </div>
                    @endforelse
                </div>
                <a href="{{ route('informasi-admin.index') }}" class="card-more-link">Kelola Semua Berita →</a>
            </div>

            {{-- Aktivitas Terbaru --}}
            <div class="dash-card">
                <div class="dash-card-header">
                    <div class="dash-card-title">
                        <i class="bi bi-activity"></i> Aktivitas Terbaru
                    </div>
                    <a href="{{ route('permohonan.index') }}" class="btn-card-link">
                        <i class="bi bi-arrow-right-short"></i> Lihat Semua
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="aktivitas-tbl">
                        <thead>
                            <tr>
                                <th>NAMA</th>
                                <th>JENIS LAYANAN</th>
                                <th>STATUS</th>
                                <th>TANGGAL</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($permohonanTerbaru as $p)
                            @php
                                $initials = collect(explode(' ', $p->user->nama ?? 'U'))->map(fn($w) => strtoupper(substr($w,0,1)))->take(2)->join('');
                                $colors   = ['blue','green','purple','orange'];
                                $color    = $colors[$loop->index % count($colors)];
                                $status   = $p->approval->status ?? 'pending';
                            @endphp
                            <tr>
                                <td>
                                    <div class="user-cell">
                                        <div class="user-av {{ $color }}">{{ $initials }}</div>
                                        <div>
                                            <div class="user-nm">{{ $p->user->nama ?? '-' }}</div>
                                            <div class="user-nik">NIK: {{ $p->user->nik ?? '-' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $p->jenisSurat->nama_surat ?? '-' }}</td>
                                <td>
                                    @if($status === 'disetujui')
                                        <span class="bdg bdg-approved">Disetujui</span>
                                    @elseif($status === 'ditolak')
                                        <span class="bdg bdg-rejected">Ditolak</span>
                                    @else
                                        <span class="bdg bdg-pending">Menunggu</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($p->tanggal_pengajuan)->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('permohonan.show', $p->id_permohonan) }}" class="action-icon-btn edit">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align:center;padding:24px;color:var(--muted);font-size:13px;">
                                    Belum ada permohonan masuk.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>{{-- /col-xl-8 --}}

        {{-- RIGHT SIDEBAR --}}
        <div class="col-xl-4 d-flex flex-column gap-3">

            {{-- Pemberitahuan Realtime --}}
            <div class="dash-card">
                <div class="dash-card-header">
                    <div class="dash-card-title">
                        <i class="bi bi-bell-fill"></i> Pemberitahuan
                        <span id="dash-notif-count" style="font-size:11px;font-weight:600;background:#eff6ff;color:#1c64f2;border-radius:20px;padding:2px 8px;display:none"></span>
                    </div>
                </div>
                <div id="dash-notif-list" style="padding:4px 0">
                    <div style="padding:24px 18px;text-align:center;color:#94a3b8;font-size:13px">
                        <i class="bi bi-arrow-clockwise" style="font-size:20px;display:block;margin-bottom:6px"></i>
                        Memuat...
                    </div>
                </div>
                <a href="{{ route('permohonan.index') }}" class="card-more-link">Lihat semua permohonan →</a>
            </div>

            {{-- Jam Operasional --}}
            <div class="dash-card">
                <div class="dash-card-header">
                    <div class="dash-card-title">
                        <i class="bi bi-clock-fill"></i> Jam Operasional
                    </div>
                </div>
                <div style="padding:6px 18px 14px">
                    <div class="jam-row" id="row-senin-kamis">
                        <span class="jam-day">Senin – Kamis</span>
                        <span class="jam-time">08.00 – 15.00</span>
                    </div>
                    <div class="jam-row" id="row-jumat">
                        <span class="jam-day">Jumat</span>
                        <span class="jam-time">08.00 – 11.30</span>
                    </div>
                    <div class="jam-row" id="row-sabtu-minggu">
                        <span class="jam-day">Sabtu – Minggu</span>
                        <span class="bdg-closed">Tutup</span>
                    </div>
                    <div id="status-kantor" style="margin-top:12px; border-radius:8px; padding:9px 12px; font-size:12px; display:flex; align-items:center; gap:6px;"></div>
                </div>
            </div>

        </div>{{-- /sidebar --}}

    </div>{{-- /main grid --}}

</div>{{-- /page-wrapper --}}

{{-- FOOTER --}}
@include('admin.partials.footer')

@endsection

@push('scripts')
<script>
function updateStatusKantor() {
    // Gunakan timezone Asia/Jakarta
    const now = new Date(new Date().toLocaleString('en-US', { timeZone: 'Asia/Jakarta' }));
    const day  = now.getDay();   // 0=Minggu, 1=Sen, ..., 5=Jum, 6=Sab
    const hour = now.getHours();
    const min  = now.getMinutes();
    const time = hour + min / 60; // desimal jam

    let buka = false;
    let hariIni = '';

    // Highlight baris hari ini
    document.querySelectorAll('.jam-row').forEach(r => r.style.background = '');
    if (day >= 1 && day <= 4) {
        document.getElementById('row-senin-kamis').style.background = '#f0f9ff';
        hariIni = 'Senin–Kamis';
        buka = time >= 8 && time < 15;
    } else if (day === 5) {
        document.getElementById('row-jumat').style.background = '#f0f9ff';
        hariIni = 'Jumat';
        buka = time >= 8 && time < 11.5;
    } else {
        document.getElementById('row-sabtu-minggu').style.background = '#fef2f2';
        hariIni = 'Sabtu/Minggu';
        buka = false;
    }

    const el = document.getElementById('status-kantor');
    if (buka) {
        el.style.background = '#f0fdf4';
        el.style.border     = '1px solid #bbf7d0';
        el.style.color      = '#166534';
        el.innerHTML = `<i class="bi bi-circle-fill" style="font-size:8px;color:#16a34a"></i>
                        Kantor sedang <strong style="margin-left:3px">Buka</strong> sekarang`;
    } else {
        el.style.background = '#fef2f2';
        el.style.border     = '1px solid #fecaca';
        el.style.color      = '#991b1b';
        const tutupMsg = (day === 6 || day === 0) ? 'Libur akhir pekan' : 'Di luar jam operasional';
        el.innerHTML = `<i class="bi bi-circle-fill" style="font-size:8px;color:#ef4444"></i>
                        Kantor sedang <strong style="margin-left:3px">Tutup</strong> — ${tutupMsg}`;
    }
}

updateStatusKantor();
setInterval(updateStatusKantor, 60000); // update tiap menit

// ── Dashboard Pemberitahuan Panel ──────────────────────
(function() {
    const API = '{{ route("admin.notifikasi") }}';
    const panel = document.getElementById('dash-notif-list');
    const pill  = document.getElementById('dash-notif-count');

    function escHtml(s) {
        return String(s).replace(/[&<>"]/g, c=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;'}[c]));
    }

    function loadNotif() {
        fetch(API, { headers:{'Accept':'application/json'} })
            .then(r=>r.json())
            .then(data => {
                const items = data.items || [];
                const count = data.count || 0;

                if (count > 0) {
                    pill.textContent = count + ' baru';
                    pill.style.display = '';
                } else {
                    pill.style.display = 'none';
                }

                if (!items.length) {
                    panel.innerHTML = `<div style="padding:20px 18px;text-align:center;color:#94a3b8;font-size:13px">
                        <i class="bi bi-bell-slash" style="font-size:22px;display:block;margin-bottom:6px;color:#e2e8f0"></i>
                        Tidak ada notifikasi baru
                    </div>`;
                    return;
                }

                panel.innerHTML = items.slice(0,5).map(n => `
                    <a href="${escHtml(n.url)}" style="display:flex;gap:10px;align-items:flex-start;padding:11px 18px;border-bottom:1px dashed #e2e8f0;text-decoration:none;color:inherit;transition:background .15s"
                       onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background=''">
                        <div style="width:8px;height:8px;border-radius:50%;background:#1c64f2;margin-top:5px;flex-shrink:0"></div>
                        <div style="flex:1">
                            <div style="font-size:12px;color:#334155;line-height:1.5">${escHtml(n.message)}</div>
                            <div style="font-size:11px;color:#94a3b8;margin-top:2px">
                                <i class="bi bi-clock" style="font-size:10px"></i> ${escHtml(n.time)}
                            </div>
                        </div>
                    </a>`).join('');
            })
            .catch(()=>{
                panel.innerHTML = '<div style="padding:16px 18px;font-size:12px;color:#94a3b8">Gagal memuat notifikasi.</div>';
            });
    }

    loadNotif();
    setInterval(loadNotif, 30000);
})();
</script>
@endpush