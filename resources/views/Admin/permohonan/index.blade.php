@extends('admin.layouts.app')

@section('title', 'Data Permohonan')

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
        --white: #ffffff;
    }

    /* ── PAGE HEADER ── */
    .page-top {
        display: flex; align-items: center; justify-content: space-between;
        margin-bottom: 24px; flex-wrap: wrap; gap: 12px;
    }
    .page-top h1 {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 22px; font-weight: 800; color: var(--gray-900);
    }
    .page-top p { font-size: 13px; color: var(--gray-500); margin-top: 2px; }

    /* ── STATS ROW ── */
    .stats-row {
        display: grid; grid-template-columns: repeat(4, 1fr);
        gap: 16px; margin-bottom: 24px;
    }
    .stat-card {
        background: var(--white); border: 1px solid var(--gray-200);
        border-radius: 12px; padding: 16px 20px;
        display: flex; align-items: center; gap: 14px;
    }
    .stat-icon {
        width: 42px; height: 42px; border-radius: 10px;
        display: grid; place-items: center; flex-shrink: 0;
    }
    .stat-icon svg { width: 20px; height: 20px; }
    .stat-icon.blue   { background: #eff6ff; color: var(--primary); }
    .stat-icon.yellow { background: #fffbeb; color: var(--warning); }
    .stat-icon.green  { background: #f0fdf4; color: var(--success); }
    .stat-icon.red    { background: #fef2f2; color: var(--danger);  }
    .stat-info small  { font-size: 11px; color: var(--gray-400); text-transform: uppercase; letter-spacing: .06em; font-weight: 600; }
    .stat-info strong { font-size: 22px; font-weight: 800; color: var(--gray-900); display: block; line-height: 1.2; }

    /* ── FILTER BAR ── */
    .filter-bar {
        background: var(--white); border: 1px solid var(--gray-200);
        border-radius: 12px; padding: 14px 20px;
        display: flex; align-items: center; gap: 12px; margin-bottom: 20px; flex-wrap: wrap;
    }
    .filter-bar input, .filter-bar select {
        border: 1.5px solid var(--gray-200); border-radius: 8px;
        padding: 7px 12px; font-size: 13px; color: var(--gray-700);
        outline: none; transition: border-color .15s; background: var(--gray-50);
    }
    .filter-bar input:focus, .filter-bar select:focus { border-color: var(--primary); background: var(--white); }
    .filter-bar input { width: 240px; }
    .search-icon { position: relative; }
    .search-icon input { padding-left: 34px; }
    .search-icon svg {
        position: absolute; left: 10px; top: 50%; transform: translateY(-50%);
        width: 15px; height: 15px; color: var(--gray-400); pointer-events: none;
    }
    .filter-bar .ms-auto { margin-left: auto; }

    /* ── TABLE ── */
    .table-card {
        background: var(--white); border: 1px solid var(--gray-200);
        border-radius: 14px; overflow: hidden; box-shadow: 0 1px 6px rgba(0,0,0,.05);
    }
    table { width: 100%; border-collapse: collapse; }
    thead th {
        background: var(--gray-50); padding: 11px 16px;
        text-align: left; font-size: 11px; font-weight: 700;
        text-transform: uppercase; letter-spacing: .07em;
        color: var(--gray-500); border-bottom: 1px solid var(--gray-200);
        white-space: nowrap;
    }
    tbody tr { border-bottom: 1px solid var(--gray-100); transition: background .12s; }
    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: var(--gray-50); }
    tbody td { padding: 13px 16px; font-size: 13px; color: var(--gray-700); vertical-align: middle; }
    .td-no { color: var(--gray-400); font-size: 12px; font-weight: 600; }
    .td-name { font-weight: 600; color: var(--gray-900); }
    .td-name small { display: block; font-size: 11px; font-weight: 400; color: var(--gray-400); margin-top: 1px; }
    .td-surat { font-weight: 500; }
    .td-date  { color: var(--gray-500); font-size: 12px; }

    /* ── BADGE STATUS ── */
    .pill {
        display: inline-flex; align-items: center; gap: 5px;
        padding: 3px 10px; border-radius: 20px;
        font-size: 11px; font-weight: 700; white-space: nowrap;
    }
    .pill::before { content: ''; width: 6px; height: 6px; border-radius: 50%; }
    .pill-pending  { background: #fef9c3; color: #854d0e; }
    .pill-pending::before  { background: #ca8a04; }
    .pill-approved { background: #dcfce7; color: #14532d; }
    .pill-approved::before { background: #16a34a; }
    .pill-rejected { background: #fee2e2; color: #7f1d1d; }
    .pill-rejected::before { background: #dc2626; }

    /* ── ACTION BUTTONS ── */
    .action-group { display: flex; align-items: center; gap: 6px; }
    .btn-sm {
        display: inline-flex; align-items: center; gap: 5px;
        padding: 5px 12px; border-radius: 7px; font-size: 12px; font-weight: 600;
        cursor: pointer; border: none; transition: all .15s; text-decoration: none; white-space: nowrap;
    }
    .btn-sm svg { width: 13px; height: 13px; }
    .btn-detail  { background: var(--primary-light); color: var(--primary); }
    .btn-detail:hover  { background: #dbeafe; color: #1e3a8a; }
    .btn-approve { background: #dcfce7; color: #15803d; }
    .btn-approve:hover { background: #bbf7d0; }
    .btn-reject  { background: #fee2e2; color: #b91c1c; }
    .btn-reject:hover  { background: #fecaca; }

    /* ── EMPTY STATE ── */
    .empty-state { text-align: center; padding: 60px 20px; }
    .empty-state svg { width: 48px; height: 48px; color: var(--gray-300); margin-bottom: 12px; }
    .empty-state p { font-size: 14px; color: var(--gray-400); }

    /* ── ALERT ── */
    .alert-success {
        display: flex; align-items: center; gap: 10px;
        padding: 12px 16px; border-radius: 9px; margin-bottom: 20px;
        background: #f0fdf4; border: 1px solid #bbf7d0;
        font-size: 13px; color: #166534;
    }
    .alert-success svg { flex-shrink: 0; width: 16px; height: 16px; }

    @media (max-width: 768px) {
        .stats-row { grid-template-columns: repeat(2, 1fr); }
    }
</style>

<!-- PAGE TOP -->
<div class="page-top">
    <div>
        <h1>Data Permohonan Surat</h1>
        <p>Kelola dan proses semua permohonan surat dari masyarakat</p>
    </div>
</div>

@if(session('success'))
    <div class="alert-success">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <polyline points="20 6 9 17 4 12"/>
        </svg>
        {{ session('success') }}
    </div>
@endif

<!-- STATS -->
<div class="stats-row">
    <div class="stat-card">
        <div class="stat-icon blue">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
        </div>
        <div class="stat-info">
            <small>Total</small>
            <strong>{{ $data->count() }}</strong>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon yellow">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
            </svg>
        </div>
        <div class="stat-info">
            <small>Pending</small>
            <strong>{{ $data->filter(fn($d) => !$d->approval || $d->approval->status === 'pending')->count() }}</strong>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="20 6 9 17 4 12"/>
            </svg>
        </div>
        <div class="stat-info">
            <small>Disetujui</small>
            <strong>{{ $data->filter(fn($d) => $d->approval && $d->approval->status === 'approved')->count() }}</strong>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon red">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/>
            </svg>
        </div>
        <div class="stat-info">
            <small>Ditolak</small>
            <strong>{{ $data->filter(fn($d) => $d->approval && $d->approval->status === 'rejected')->count() }}</strong>
        </div>
    </div>
</div>

<!-- FILTER BAR -->
<div class="filter-bar">
    <div class="search-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>
        <input type="text" id="searchInput" placeholder="Cari nama pemohon atau jenis surat..." oninput="filterTable()"/>
    </div>
    <select id="statusFilter" onchange="filterTable()">
        <option value="">Semua Status</option>
        <option value="pending">Pending</option>
        <option value="approved">Disetujui</option>
        <option value="rejected">Ditolak</option>
    </select>
</div>

<!-- TABLE -->
<div class="table-card">
    <table id="permohonanTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Pemohon</th>
                <th>Jenis Surat</th>
                <th>Tanggal Pengajuan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $d)
            @php $status = $d->approval->status ?? 'pending'; @endphp
            <tr data-status="{{ $status }}" data-name="{{ strtolower($d->user->nama ?? '') }}" data-surat="{{ strtolower($d->jenisSurat->nama_surat ?? '') }}">
                <td class="td-no">{{ $loop->iteration }}</td>
                <td>
                    <div class="td-name">
                        {{ $d->user->nama ?? '-' }}
                        <small>NIK: {{ $d->user->nik ?? '-' }}</small>
                    </div>
                </td>
                <td class="td-surat">{{ $d->jenisSurat->nama_surat ?? '-' }}</td>
                <td class="td-date">
                    {{ \Carbon\Carbon::parse($d->tanggal_pengajuan)->format('d M Y') }}
                </td>
                <td>
                    <span class="pill pill-{{ $status }}">
                        {{ strtoupper($status) }}
                    </span>
                </td>
                <td>
                    <div class="action-group">
                        <a href="{{ route('permohonan.show', $d->id_permohonan) }}" class="btn-sm btn-detail">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                            </svg>
                            Detail
                        </a>
                        @if(!$d->approval || $d->approval->status === 'pending')
                            <form action="{{ route('permohonan.approve', $d->id_permohonan) }}" method="POST" style="display:inline;">
                                @csrf @method('PUT')
                                <button type="submit" class="btn-sm btn-approve"
                                        onclick="return confirm('Setujui permohonan dari {{ $d->user->nama ?? '' }}?')">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                        <polyline points="20 6 9 17 4 12"/>
                                    </svg>
                                    Setujui
                                </button>
                            </form>
                            <form action="{{ route('permohonan.reject', $d->id_permohonan) }}" method="POST" style="display:inline;">
                                @csrf @method('PUT')
                                <button type="submit" class="btn-sm btn-reject"
                                        onclick="return confirm('Tolak permohonan dari {{ $d->user->nama ?? '' }}?')">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                        <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                                    </svg>
                                    Tolak
                                </button>
                            </form>
                        @endif
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">
                    <div class="empty-state">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <p>Belum ada data permohonan</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
function filterTable() {
    const search = document.getElementById('searchInput').value.toLowerCase();
    const status = document.getElementById('statusFilter').value.toLowerCase();
    const rows   = document.querySelectorAll('#permohonanTable tbody tr[data-status]');
    rows.forEach(row => {
        const name  = row.dataset.name  || '';
        const surat = row.dataset.surat || '';
        const rowStatus = row.dataset.status || '';
        const matchSearch = name.includes(search) || surat.includes(search);
        const matchStatus = !status || rowStatus === status;
        row.style.display = matchSearch && matchStatus ? '' : 'none';
    });
}
</script>

@endsection