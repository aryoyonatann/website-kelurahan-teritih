@extends('admin.layouts.app')

@section('title', 'Detail Permohonan')

@section('content')
<style>
    :root {
        --primary: #1c64f2;
        --primary-light: #eff6ff;
        --success: #16a34a;
        --warning: #d97706;
        --danger:  #dc2626;
        --gray-50:  #f9fafb;
        --gray-100: #f3f4f6;
        --gray-200: #e5e7eb;
        --gray-300: #d1d5db;
        --gray-400: #9ca3af;
        --gray-500: #6b7280;
        --gray-600: #4b5563;
        --gray-700: #374151;
        --gray-800: #1f2937;
        --gray-900: #111827;
        --white:    #ffffff;
    }

    /* ── BACK LINK ── */
    .back-link {
        display: inline-flex; align-items: center; gap: 6px;
        font-size: 13px; font-weight: 600; color: var(--gray-500);
        text-decoration: none; margin-bottom: 20px;
        transition: color .15s;
    }
    .back-link:hover { color: var(--primary); }
    .back-link svg { width: 15px; height: 15px; }

    /* ── HEADER CARD ── */
    .detail-header {
        background: var(--white); border: 1px solid var(--gray-200);
        border-radius: 14px; padding: 24px 28px; margin-bottom: 20px;
        display: flex; align-items: center; justify-content: space-between; gap: 16px;
        box-shadow: 0 1px 6px rgba(0,0,0,.05); flex-wrap: wrap;
    }
    .detail-header-left h2 {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 20px; font-weight: 800; color: var(--gray-900); margin-bottom: 4px;
    }
    .detail-header-left p { font-size: 13px; color: var(--gray-400); }
    .detail-header-actions { display: flex; gap: 10px; align-items: center; }

    /* ── STATUS PILL ── */
    .pill {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 6px 14px; border-radius: 20px;
        font-size: 12px; font-weight: 700;
    }
    .pill::before { content: ''; width: 7px; height: 7px; border-radius: 50%; }
    .pill-pending  { background: #fef9c3; color: #854d0e; }
    .pill-pending::before  { background: #ca8a04; }
    .pill-approved { background: #dcfce7; color: #14532d; }
    .pill-approved::before { background: #16a34a; }
    .pill-rejected { background: #fee2e2; color: #7f1d1d; }
    .pill-rejected::before { background: #dc2626; }

    /* ── GRID ── */
    .detail-grid {
        display: grid; grid-template-columns: 1fr 320px;
        gap: 20px; align-items: start;
    }

    /* ── SECTION CARD ── */
    .section-card {
        background: var(--white); border: 1px solid var(--gray-200);
        border-radius: 14px; overflow: hidden;
        box-shadow: 0 1px 6px rgba(0,0,0,.05); margin-bottom: 20px;
    }
    .section-card-title {
        padding: 14px 20px; border-bottom: 1px solid var(--gray-100);
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 13px; font-weight: 700; color: var(--gray-700);
        display: flex; align-items: center; gap: 8px;
        background: var(--gray-50);
    }
    .section-card-title svg { width: 15px; height: 15px; color: var(--primary); }
    .section-card-body { padding: 20px; }

    /* ── FIELD ── */
    .field-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px; }
    .field-row:last-child { margin-bottom: 0; }
    .field { display: flex; flex-direction: column; gap: 4px; }
    .field label { font-size: 11px; font-weight: 700; text-transform: uppercase;
        letter-spacing: .07em; color: var(--gray-400); }
    .field span  { font-size: 14px; color: var(--gray-800); font-weight: 500; }
    .field span.empty { color: var(--gray-300); font-style: italic; }

    /* ── DOKUMEN ── */
    .doc-preview {
        display: flex; align-items: center; gap: 12px;
        background: var(--gray-50); border: 1px solid var(--gray-200);
        border-radius: 9px; padding: 12px 16px;
    }
    .doc-preview-icon {
        width: 38px; height: 38px; background: #fee2e2;
        border-radius: 8px; display: grid; place-items: center; flex-shrink: 0;
    }
    .doc-preview-icon svg { width: 20px; height: 20px; color: #dc2626; }
    .doc-preview-info { flex: 1; }
    .doc-preview-info span  { display: block; font-size: 13px; font-weight: 600; color: var(--gray-800); }
    .doc-preview-info small { font-size: 12px; color: var(--gray-400); }
    .btn-view-doc {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 6px 14px; border-radius: 7px; font-size: 12px; font-weight: 600;
        background: var(--primary-light); color: var(--primary); text-decoration: none;
        transition: background .15s;
    }
    .btn-view-doc:hover { background: #dbeafe; }
    .btn-view-doc svg { width: 13px; height: 13px; }

    /* ── TIMELINE / APPROVAL ── */
    .timeline { list-style: none; padding: 0; }
    .timeline-item { display: flex; gap: 12px; padding-bottom: 18px; position: relative; }
    .timeline-item:last-child { padding-bottom: 0; }
    .timeline-item:not(:last-child)::before {
        content: ''; position: absolute;
        left: 13px; top: 28px; bottom: 0; width: 2px;
        background: var(--gray-100);
    }
    .tl-dot {
        width: 28px; height: 28px; border-radius: 50%;
        display: grid; place-items: center; flex-shrink: 0; margin-top: 2px;
    }
    .tl-dot.pending  { background: #fef9c3; }
    .tl-dot.approved { background: #dcfce7; }
    .tl-dot.rejected { background: #fee2e2; }
    .tl-dot svg { width: 13px; height: 13px; }
    .tl-dot.pending  svg { color: #ca8a04; }
    .tl-dot.approved svg { color: #16a34a; }
    .tl-dot.rejected svg { color: #dc2626; }
    .tl-content p     { font-size: 13px; font-weight: 600; color: var(--gray-800); margin: 0 0 2px; }
    .tl-content small { font-size: 12px; color: var(--gray-400); }

    /* ── ACTION CARD ── */
    .action-card {
        background: var(--white); border: 1px solid var(--gray-200);
        border-radius: 14px; padding: 20px;
        box-shadow: 0 1px 6px rgba(0,0,0,.05);
    }
    .action-card h4 {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 14px; font-weight: 700; color: var(--gray-800); margin-bottom: 14px;
    }
    .action-card .btn-full {
        display: flex; align-items: center; justify-content: center; gap: 8px;
        width: 100%; padding: 11px; border-radius: 9px;
        font-size: 13px; font-weight: 700; cursor: pointer;
        border: none; transition: all .15s; margin-bottom: 10px;
    }
    .btn-approve-full { background: #dcfce7; color: #15803d; }
    .btn-approve-full:hover { background: #bbf7d0; }
    .btn-reject-full  { background: #fee2e2; color: #b91c1c; }
    .btn-reject-full:hover  { background: #fecaca; }
    .btn-full svg { width: 15px; height: 15px; }
    .action-done {
        text-align: center; padding: 12px;
        font-size: 13px; color: var(--gray-400);
        background: var(--gray-50); border-radius: 9px;
    }

    @media (max-width: 768px) {
        .detail-grid { grid-template-columns: 1fr; }
        .field-row { grid-template-columns: 1fr; }
    }
</style>

<!-- BACK -->
<a href="{{ route('permohonan.index') }}" class="back-link">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <polyline points="15 18 9 12 15 6"/>
    </svg>
    Kembali ke Daftar Permohonan
</a>

<!-- HEADER CARD -->
@php $status = $data->approval->status ?? 'pending'; @endphp
<div class="detail-header">
    <div class="detail-header-left">
        <h2>Detail Permohonan — #{{ $data->id_permohonan }}</h2>
        <p>{{ $data->jenisSurat->nama_surat ?? 'Surat Keterangan Umum' }} &middot;
           Diajukan {{ \Carbon\Carbon::parse($data->tanggal_pengajuan)->format('d M Y') }}</p>
    </div>
    <span class="pill pill-{{ $status }}">{{ strtoupper($status) }}</span>
</div>

<div class="detail-grid">

    <!-- KIRI -->
    <div>

        <!-- DATA PEMOHON -->
        <div class="section-card">
            <div class="section-card-title">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/>
                </svg>
                Data Pemohon
            </div>
            <div class="section-card-body">
                <div class="field-row">
                    <div class="field">
                        <label>Nama Lengkap</label>
                        <span>{{ $data->user->nama ?? '-' }}</span>
                    </div>
                    <div class="field">
                        <label>NIK</label>
                        <span>{{ $data->user->nik ?? '-' }}</span>
                    </div>
                </div>
                <div class="field-row" style="grid-template-columns:1fr;">
                    <div class="field">
                        <label>Alamat</label>
                        <span>{{ $data->user->alamat ?? '-' }}</span>
                    </div>
                </div>
                <div class="field-row">
                    <div class="field">
                        <label>No. Telepon</label>
                        <span>{{ $data->user->no_telp ?? '-' }}</span>
                    </div>
                    <div class="field">
                        <label>Email</label>
                        <span>{{ $data->user->email ?? '-' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- DETAIL PERMOHONAN -->
        <div class="section-card">
            <div class="section-card-title">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Detail Permohonan
            </div>
            <div class="section-card-body">
                <div class="field-row">
                    <div class="field">
                        <label>Jenis Surat</label>
                        <span>{{ $data->jenisSurat->nama_surat ?? '-' }}</span>
                    </div>
                    <div class="field">
                        <label>Tanggal Pengajuan</label>
                        <span>{{ \Carbon\Carbon::parse($data->tanggal_pengajuan)->format('d M Y') }}</span>
                    </div>
                </div>
                <div class="field-row" style="grid-template-columns:1fr;">
                    <div class="field">
                        <label>Keperluan / Tujuan Surat</label>
                        <span>{{ $data->keperluan ?? '-' }}</span>
                    </div>
                </div>
                @if($data->keterangan)
                <div class="field-row" style="grid-template-columns:1fr;">
                    <div class="field">
                        <label>Keterangan Tambahan</label>
                        <span>{{ $data->keterangan }}</span>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- DOKUMEN -->
        @if($data->dokumen)
        <div class="section-card">
            <div class="section-card-title">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                </svg>
                Dokumen Pendukung
            </div>
            <div class="section-card-body">
                <div class="doc-preview">
                    <div class="doc-preview-icon">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7 18H17V16H7v2zm0-4h10v-2H7v2zm-2 8a2 2 0 01-2-2V4a2 2 0 012-2h8l6 6v14a2 2 0 01-2 2H5z"/>
                        </svg>
                    </div>
                    <div class="doc-preview-info">
                        <span>{{ basename($data->dokumen) }}</span>
                        <small>Dokumen permohonan</small>
                    </div>
                    <a href="{{ asset('storage/' . $data->dokumen) }}" target="_blank" class="btn-view-doc">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                        </svg>
                        Lihat Dokumen
                    </a>
                </div>
            </div>
        </div>
        @endif

    </div><!-- /kiri -->

    <!-- KANAN / SIDEBAR -->
    <div>

        <!-- AKSI -->
        <div class="action-card" style="margin-bottom:16px;">
            <h4>Tindakan Permohonan</h4>
            @if(!$data->approval || $data->approval->status === 'pending')
                <form action="{{ route('permohonan.approve', $data->id_permohonan) }}" method="POST">
                    @csrf @method('PUT')
                    <button type="submit" class="btn-full btn-approve-full"
                            onclick="return confirm('Setujui permohonan ini?')">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                        Setujui Permohonan
                    </button>
                </form>
                <form action="{{ route('permohonan.reject', $data->id_permohonan) }}" method="POST">
                    @csrf @method('PUT')
                    <button type="submit" class="btn-full btn-reject-full"
                            onclick="return confirm('Tolak permohonan ini?')">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                        </svg>
                        Tolak Permohonan
                    </button>
                </form>
            @else
                <div class="action-done">
                    Permohonan ini sudah diproses<br>
                    <strong style="color:var(--gray-700)">Status: {{ strtoupper($status) }}</strong>
                </div>
            @endif
        </div>

        <!-- TIMELINE -->
        <div class="section-card">
            <div class="section-card-title">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                </svg>
                Riwayat Status
            </div>
            <div class="section-card-body">
                <ul class="timeline">
                    <li class="timeline-item">
                        <div class="tl-dot approved">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                        </div>
                        <div class="tl-content">
                            <p>Permohonan Diajukan</p>
                            <small>{{ \Carbon\Carbon::parse($data->tanggal_pengajuan)->format('d M Y, H:i') }}</small>
                        </div>
                    </li>
                    @if($data->approval)
                    <li class="timeline-item">
                        <div class="tl-dot {{ $data->approval->status }}">
                            @if($data->approval->status === 'approved')
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            @else
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                            @endif
                        </div>
                        <div class="tl-content">
                            <p>{{ $data->approval->status === 'approved' ? 'Permohonan Disetujui' : 'Permohonan Ditolak' }}</p>
                            <small>{{ \Carbon\Carbon::parse($data->approval->tanggal_approval)->format('d M Y, H:i') }}</small>
                        </div>
                    </li>
                    @else
                    <li class="timeline-item">
                        <div class="tl-dot pending">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                            </svg>
                        </div>
                        <div class="tl-content">
                            <p>Menunggu Proses Admin</p>
                            <small>Belum diproses</small>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        <!-- INFO PEMOHON -->
        <div class="section-card" style="margin-top:16px;">
            <div class="section-card-title">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/>
                </svg>
                Info Pemohon
            </div>
            <div class="section-card-body">
                <div class="field" style="margin-bottom:12px;">
                    <label>Nama</label>
                    <span>{{ $data->user->nama ?? '-' }}</span>
                </div>
                <div class="field" style="margin-bottom:12px;">
                    <label>Email</label>
                    <span>{{ $data->user->email ?? '-' }}</span>
                </div>
                <div class="field">
                    <label>No. Telepon</label>
                    <span>{{ $data->user->no_telp ?? '-' }}</span>
                </div>
            </div>
        </div>

    </div><!-- /kanan -->

</div><!-- /detail-grid -->

@endsection