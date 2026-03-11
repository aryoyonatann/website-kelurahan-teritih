@extends('layouts.user')

@section('title', 'Form Permohonan Surat')

@section('content')

<div class="breadcrumb-wrap">
    <ol class="breadcrumb">
        <li><a href="{{ route('layanan') }}">Layanan</a></li>
        <li class="breadcrumb-sep">/</li>
        <li><a href="{{ route('user.permohonan.index') }}">Permohonan Surat</a></li>
        <li class="breadcrumb-sep">/</li>
        <li class="active">Buat Permohonan</li>
    </ol>
</div>

<div class="page-header">
    <h1>Form Permohonan Surat</h1>
    <p>Silakan lengkapi formulir di bawah ini dengan data yang benar dan valid.</p>
</div>

<div class="layout">

    <div class="card">
        <div class="form-card-header">
            <div class="form-card-header-left">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span>Permohonan Surat</span>
            </div>
        </div>

        <form action="{{ route('user.permohonan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-body">

                @if($errors->any())
                    <div class="alert-error">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                            <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>
                        <div>@foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach</div>
                    </div>
                @endif

                <!-- DATA PEMOHON -->
                <div class="form-section">
                    <div class="section-label">Data Pemohon</div>
                    <p class="section-note">Data diambil dari profil akun Anda. Jika ada yang salah, perbarui di <a href="{{ route('profile.edit') }}">halaman profil</a>.</p>
                    <div class="form-row cols-2">
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" class="form-control readonly-field" value="{{ auth()->user()->nik ?? '-' }}" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control readonly-field" value="{{ auth()->user()->nama ?? auth()->user()->name ?? '-' }}" readonly/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Alamat Lengkap</label>
                            <textarea class="form-control readonly-field" rows="2" readonly>{{ auth()->user()->alamat ?? '-' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- DETAIL PERMOHONAN -->
                <div class="form-section">
                    <div class="section-label">Detail Permohonan</div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Jenis Surat <span class="req">*</span></label>
                            <select name="id_jenis_surat" class="form-control @error('id_jenis_surat') is-invalid @enderror" required>
                                <option value="">-- Pilih Jenis Surat --</option>
                                @foreach($daftarJenisSurat as $js)
                                    <option value="{{ $js->id_jenis_surat }}"
                                        {{ old('id_jenis_surat', $selectedJenis ?? '') == $js->id_jenis_surat ? 'selected' : '' }}>
                                        {{ $js->nama_surat }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_jenis_surat')<span class="form-error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Tujuan / Keperluan Surat <span class="req">*</span></label>
                            <input type="text" name="keperluan"
                                   class="form-control @error('keperluan') is-invalid @enderror"
                                   value="{{ old('keperluan') }}"
                                   placeholder="Contoh: Persyaratan Administrasi Bank, Melamar Pekerjaan, dll"
                                   required/>
                            @error('keperluan')<span class="form-error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <!-- UPLOAD DOKUMEN - MULTIPLE -->
                <div class="form-section">
                    <div class="section-label">Unggah Dokumen Pendukung</div>

                    <div class="upload-zone" id="uploadZone" onclick="document.getElementById('file-dokumen').click()">
                        <div class="upload-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                            </svg>
                        </div>
                        <p><a href="#">Klik untuk unggah</a> atau seret file ke sini</p>
                        <small>PDF, JPG, PNG — Maks. 2MB per file — Maks. <strong>5 file</strong></small>
                    </div>

                    {{-- input multiple --}}
                    <input type="file" id="file-dokumen" name="dokumen[]"
                           style="display:none" accept=".pdf,.jpg,.jpeg,.png"
                           multiple onchange="handleFiles(this)"/>

                    @error('dokumen')<span class="form-error" style="display:block;margin-top:6px;">{{ $message }}</span>@enderror
                    @error('dokumen.*')<span class="form-error" style="display:block;margin-top:6px;">{{ $message }}</span>@enderror

                    <!-- File counter -->
                    <div id="file-counter" style="display:none;" class="file-counter">
                        <span id="counter-text">0 / 5 file dipilih</span>
                    </div>

                    <!-- Preview list -->
                    <div id="file-list"></div>
                </div>

                <!-- PERNYATAAN -->
                <div class="checkbox-group">
                    <input type="checkbox" id="agree" name="agree" value="1" required/>
                    <label for="agree">Saya menyatakan bahwa data yang saya isi adalah benar dan dapat dipertanggungjawabkan. Saya bersedia menerima sanksi apabila dikemudian hari ditemukan ketidaksesuaian data.</label>
                </div>

            </div>

            <div class="form-actions">
                <a href="{{ route('user.permohonan.index') }}" class="btn btn-outline">Batal</a>
                <button type="submit" class="btn btn-primary">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                    </svg>
                    Kirim Permohonan
                </button>
            </div>

        </form>
    </div>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="info-card blue">
            <div class="info-card-title">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
                Informasi Layanan
            </div>
            <ul class="info-list">
                <li>Waktu Proses: 1–2 Hari Kerja</li>
                <li>Biaya: Gratis (Rp 0,-)</li>
                <li>Masa Berlaku: 30 Hari</li>
            </ul>
        </div>
        <div class="info-card yellow">
            <div class="info-card-title">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                Persyaratan Dokumen
            </div>
            <p style="font-size:12px;color:#92400e;margin-bottom:12px;line-height:1.6;">Pastikan Anda melampirkan dokumen berikut agar permohonan dapat diproses:</p>
            <ul class="doc-list">
                <li><div class="doc-icon ok"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>Scan/Foto KTP Asli</li>
                <li><div class="doc-icon ok"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>Scan/Foto KK Asli</li>
                <li><div class="doc-icon ok"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>Surat Pengantar RT/RW</li>
            </ul>
        </div>
        <div class="help-card">
            <h4>Butuh Bantuan?</h4>
            <div class="help-wa">
                <div class="wa-icon">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.5 2.5C6.26 2.5 2 6.76 2 12c0 1.73.49 3.35 1.34 4.73L2 22l5.45-1.31A9.43 9.43 0 0011.5 21.5c5.24 0 9.5-4.26 9.5-9.5S16.74 2.5 11.5 2.5z"/></svg>
                </div>
                <div><small>Chat WhatsApp</small><span>0812-3456-7890</span></div>
            </div>
        </div>
    </aside>

</div>

<style>
.section-note { font-size:12px; color:#6b7280; margin-bottom:14px; margin-top:-8px; }
.section-note a { color:#1c64f2; font-weight:600; }
.readonly-field { background:#f9fafb !important; color:#6b7280 !important; cursor:not-allowed; }
select.form-control {
    appearance:none;
    background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
    background-repeat:no-repeat; background-position:right 12px center;
    padding-right:36px; cursor:pointer;
}

/* File counter */
.file-counter {
    margin-top: 10px;
    display: flex; align-items: center; justify-content: space-between;
    padding: 8px 12px;
    background: #eff6ff; border: 1px solid #bfdbfe;
    border-radius: 8px; font-size: 12px; font-weight: 600; color: #1c64f2;
}

/* File preview list */
.file-item {
    display: flex; align-items: center; gap: 10px;
    background: #f9fafb; border: 1px solid #e5e7eb;
    border-radius: 9px; padding: 10px 14px; margin-top: 8px;
    animation: fadeIn .2s ease;
}
@keyframes fadeIn { from { opacity:0; transform:translateY(-4px); } to { opacity:1; transform:translateY(0); } }
.file-item-icon {
    width: 32px; height: 32px; border-radius: 7px;
    display: grid; place-items: center; flex-shrink: 0;
}
.file-item-icon.pdf { background:#fee2e2; }
.file-item-icon.img { background:#e0f2fe; }
.file-item-icon svg { width:16px; height:16px; }
.file-item-icon.pdf svg { color:#dc2626; }
.file-item-icon.img svg { color:#0284c7; }
.file-item-info { flex:1; }
.file-item-info span  { display:block; font-size:13px; font-weight:600; color:#111827; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:280px; }
.file-item-info small { font-size:11px; color:#9ca3af; }
.file-item-num { font-size:11px; font-weight:700; color:#9ca3af; background:#e5e7eb; border-radius:20px; padding:2px 8px; }
.btn-remove-file {
    width:24px; height:24px; background:#e5e7eb; border:none; border-radius:50%;
    cursor:pointer; display:grid; place-items:center; transition:background .15s; flex-shrink:0;
}
.btn-remove-file:hover { background:#fee2e2; }
.btn-remove-file svg { width:11px; height:11px; color:#6b7280; }
.btn-remove-file:hover svg { color:#dc2626; }

.upload-zone.has-files {
    padding: 16px;
    border-color: #93c5fd;
    background: #eff6ff;
}
.upload-zone.full {
    opacity: 0.5; pointer-events: none;
    border-color: #e5e7eb; background: #f9fafb;
}
</style>

<script>
const MAX_FILES = 5;
let selectedFiles = [];

function handleFiles(input) {
    const newFiles = Array.from(input.files);

    // Cek total tidak melebihi 5
    const remaining = MAX_FILES - selectedFiles.length;
    const toAdd = newFiles.slice(0, remaining);

    if (newFiles.length > remaining) {
        alert(`Maksimal ${MAX_FILES} file. Hanya ${remaining} file pertama yang ditambahkan.`);
    }

    toAdd.forEach(file => {
        // Cegah duplikat nama file
        if (!selectedFiles.find(f => f.name === file.name && f.size === file.size)) {
            selectedFiles.push(file);
        }
    });

    // Reset input agar bisa pilih file yang sama lagi
    input.value = '';

    updateFileInput();
    renderFileList();
}

function removeFile(index) {
    selectedFiles.splice(index, 1);
    updateFileInput();
    renderFileList();
}

function updateFileInput() {
    // Buat DataTransfer baru dengan file yang tersisa
    const dt = new DataTransfer();
    selectedFiles.forEach(f => dt.items.add(f));
    document.getElementById('file-dokumen').files = dt.files;
}

function renderFileList() {
    const list    = document.getElementById('file-list');
    const counter = document.getElementById('file-counter');
    const zone    = document.getElementById('uploadZone');
    const counterText = document.getElementById('counter-text');

    list.innerHTML = '';

    if (selectedFiles.length === 0) {
        counter.style.display = 'none';
        zone.classList.remove('has-files', 'full');
        return;
    }

    counter.style.display = 'flex';
    counterText.textContent = `${selectedFiles.length} / ${MAX_FILES} file dipilih`;
    zone.classList.add('has-files');

    if (selectedFiles.length >= MAX_FILES) {
        zone.classList.add('full');
        counterText.textContent = `${MAX_FILES} / ${MAX_FILES} file (batas maksimal tercapai)`;
    } else {
        zone.classList.remove('full');
    }

    selectedFiles.forEach((file, index) => {
        const isPdf = file.name.toLowerCase().endsWith('.pdf');
        const sizeKb = (file.size / 1024).toFixed(0);
        const sizeTxt = sizeKb > 1024
            ? (file.size / 1024 / 1024).toFixed(2) + ' MB'
            : sizeKb + ' KB';

        const item = document.createElement('div');
        item.className = 'file-item';
        item.innerHTML = `
            <div class="file-item-icon ${isPdf ? 'pdf' : 'img'}">
                ${isPdf
                    ? `<svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 18H17V16H7v2zm0-4h10v-2H7v2zm-2 8a2 2 0 01-2-2V4a2 2 0 012-2h8l6 6v14a2 2 0 01-2 2H5z"/></svg>`
                    : `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>`
                }
            </div>
            <div class="file-item-info">
                <span title="${file.name}">${file.name}</span>
                <small>${sizeTxt}</small>
            </div>
            <span class="file-item-num">${index + 1}</span>
            <button type="button" class="btn-remove-file" onclick="removeFile(${index})" title="Hapus file ini">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        `;
        list.appendChild(item);
    });
}
</script>

@endsection