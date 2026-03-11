<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'Kelurahan Teritih') – Kelurahan Teritih</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet"/>

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --primary:       #1c64f2;
            --primary-light: #eff6ff;
            --primary-dark:  #1a56db;
            --success:  #16a34a;
            --warning:  #d97706;
            --danger:   #dc2626;
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
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.07);
            --shadow:    0 4px 16px rgba(0,0,0,0.08);
        }

        html, body { height: 100%; }
        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--gray-50);
            color: var(--gray-800);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main { flex: 1; }

        /* ── BREADCRUMB ── */
        .breadcrumb-wrap { max-width: 1100px; margin: 0 auto; padding: 16px 24px 0; }
        .breadcrumb { display: flex; align-items: center; gap: 6px; font-size: 13px; list-style: none; }
        .breadcrumb li a { color: var(--gray-500); text-decoration: none; }
        .breadcrumb li a:hover { color: var(--primary); }
        .breadcrumb li.active { color: var(--gray-700); font-weight: 500; }
        .breadcrumb-sep { color: var(--gray-300); }

        /* ── PAGE HEADER ── */
        .page-header { max-width: 1100px; margin: 0 auto; padding: 12px 24px 24px; }
        .page-header h1 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 28px; font-weight: 800; color: var(--gray-900); margin-bottom: 4px;
        }
        .page-header p { font-size: 14px; color: var(--gray-500); }

        /* ── LAYOUT (form + sidebar) ── */
        .layout {
            max-width: 1100px; margin: 0 auto; padding: 0 24px 60px;
            display: grid; grid-template-columns: 1fr 280px;
            gap: 24px; align-items: start;
        }

        /* ── CARD ── */
        .card {
            background: var(--white); border-radius: 14px;
            border: 1px solid var(--gray-200); box-shadow: var(--shadow); overflow: hidden;
        }
        .form-card-header {
            display: flex; align-items: center; justify-content: space-between;
            padding: 18px 24px 16px; border-bottom: 1px solid var(--gray-100);
        }
        .form-card-header-left { display: flex; align-items: center; gap: 10px; }
        .form-card-header-left svg { color: var(--primary); width: 20px; height: 20px; }
        .form-card-header-left span {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 16px; font-weight: 700; color: var(--gray-900);
        }
        .badge {
            background: var(--primary-light); color: var(--primary);
            font-size: 11px; font-weight: 700; padding: 3px 9px;
            border-radius: 20px; letter-spacing: 0.04em;
        }
        .badge.status-approved { background: #dcfce7; color: #14532d; }
        .badge.status-rejected { background: #fee2e2; color: #7f1d1d; }
        .badge.status-pending  { background: #fef9c3; color: #854d0e; }

        /* ── FORM ELEMENTS ── */
        .form-body { padding: 24px; }
        .section-label {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 11px; font-weight: 700; letter-spacing: 0.10em;
            text-transform: uppercase; color: var(--gray-400);
            margin-bottom: 16px; padding-bottom: 8px;
            border-bottom: 1px solid var(--gray-100);
        }
        .form-section { margin-bottom: 28px; }
        .form-row { display: grid; gap: 16px; margin-bottom: 16px; }
        .form-row.cols-2 { grid-template-columns: 1fr 1fr; }
        .form-group { display: flex; flex-direction: column; gap: 6px; }
        .form-group label { font-size: 13px; font-weight: 600; color: var(--gray-700); }
        .form-group label .req { color: var(--danger); margin-left: 2px; }
        .form-control {
            border: 1.5px solid var(--gray-200); border-radius: 9px;
            padding: 10px 13px; font-family: 'DM Sans', sans-serif;
            font-size: 14px; color: var(--gray-800); background: var(--white);
            transition: border-color 0.15s, box-shadow 0.15s; outline: none; width: 100%;
        }
        .form-control:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(28,100,242,0.10); }
        .form-control.is-invalid { border-color: var(--danger); }
        textarea.form-control { resize: vertical; min-height: 80px; }
        .form-error { font-size: 12px; color: var(--danger); margin-top: 2px; }
        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
            background-repeat: no-repeat; background-position: right 12px center;
            padding-right: 36px; cursor: pointer;
        }

        /* ── ALERTS ── */
        .alert-error, .alert-success {
            display: flex; align-items: flex-start; gap: 10px;
            padding: 12px 16px; border-radius: 9px; margin-bottom: 20px; font-size: 13px;
        }
        .alert-error   { background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; }
        .alert-success { background: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; }
        .alert-error svg, .alert-success svg { flex-shrink: 0; margin-top: 1px; }
        .alert-error p, .alert-success p { margin: 0; line-height: 1.5; }

        /* ── UPLOAD ZONE ── */
        .upload-zone {
            border: 2px dashed var(--gray-200); border-radius: 10px;
            padding: 28px 16px; text-align: center; cursor: pointer;
            transition: border-color 0.2s, background 0.2s; background: var(--gray-50);
        }
        .upload-zone:hover { border-color: var(--primary); background: var(--primary-light); }
        .upload-icon {
            width: 44px; height: 44px; background: var(--primary); border-radius: 50%;
            display: inline-grid; place-items: center; margin-bottom: 10px;
        }
        .upload-icon svg { width: 22px; height: 22px; color: white; }
        .upload-zone p { font-size: 14px; color: var(--gray-500); margin-bottom: 4px; }
        .upload-zone p a { color: var(--primary); font-weight: 600; text-decoration: none; }
        .upload-zone small { font-size: 12px; color: var(--gray-400); }
        .uploaded-file {
            display: flex; align-items: center; gap: 12px;
            background: var(--gray-50); border: 1px solid var(--gray-200);
            border-radius: 9px; padding: 11px 14px; margin-top: 12px;
        }
        .file-icon { width: 34px; height: 34px; background: #fee2e2; border-radius: 7px; display: grid; place-items: center; flex-shrink: 0; }
        .file-icon svg { width: 18px; height: 18px; color: #dc2626; }
        .file-info { flex: 1; }
        .file-info span  { display: block; font-size: 13px; font-weight: 600; color: var(--gray-800); }
        .file-info small { font-size: 12px; color: var(--gray-400); }

        /* ── CHECKBOX ── */
        .checkbox-group { display: flex; align-items: flex-start; gap: 10px; padding: 16px 0 8px; }
        .checkbox-group input[type="checkbox"] { width: 17px; height: 17px; accent-color: var(--primary); cursor: pointer; flex-shrink: 0; margin-top: 2px; }
        .checkbox-group label { font-size: 13px; color: var(--gray-600); line-height: 1.5; cursor: pointer; }

        /* ── BUTTONS ── */
        .form-actions {
            display: flex; justify-content: center; gap: 12px;
            padding: 20px 24px 24px; border-top: 1px solid var(--gray-100);
        }
        .btn {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 11px 28px; border-radius: 9px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px; font-weight: 700; cursor: pointer; border: none;
            transition: all 0.15s; text-decoration: none;
        }
        .btn-outline { background: var(--white); border: 1.5px solid var(--gray-300); color: var(--gray-700); }
        .btn-outline:hover { background: var(--gray-100); }
        .btn-primary { background: var(--primary); color: white; box-shadow: 0 2px 8px rgba(28,100,242,.25); }
        .btn-primary:hover { background: var(--primary-dark); transform: translateY(-1px); }

        /* ── SIDEBAR CARDS ── */
        .sidebar { display: flex; flex-direction: column; gap: 16px; }
        .info-card { border-radius: 12px; border: 1px solid; padding: 16px; }
        .info-card.blue   { background: #eff6ff; border-color: #bfdbfe; }
        .info-card.yellow { background: #fffbeb; border-color: #fde68a; }
        .info-card-title {
            display: flex; align-items: center; gap: 7px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13px; font-weight: 700; margin-bottom: 12px;
        }
        .info-card.blue .info-card-title   { color: var(--primary); }
        .info-card.yellow .info-card-title { color: var(--warning); }
        .info-card-title svg { width: 16px; height: 16px; }
        .info-list { list-style: none; display: flex; flex-direction: column; gap: 7px; }
        .info-list li { display: flex; align-items: center; gap: 8px; font-size: 13px; color: var(--gray-700); }
        .info-list li::before { content: ''; width: 7px; height: 7px; border-radius: 50%; flex-shrink: 0; }
        .info-card.blue .info-list li::before { background: var(--primary); }
        .doc-list { list-style: none; display: flex; flex-direction: column; gap: 8px; }
        .doc-list li { display: flex; align-items: center; gap: 8px; font-size: 13px; color: var(--gray-700); }
        .doc-icon { width: 18px; height: 18px; border-radius: 50%; display: grid; place-items: center; flex-shrink: 0; }
        .doc-icon.ok { background: #dcfce7; }
        .doc-icon.ok svg { width: 11px; height: 11px; color: var(--success); }
        .help-card { background: var(--white); border: 1px solid var(--gray-200); border-radius: 12px; padding: 16px; }
        .help-card h4 { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13px; font-weight: 700; color: var(--gray-800); margin-bottom: 12px; }
        .help-wa { display: flex; align-items: center; gap: 10px; background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 9px; padding: 10px 14px; }
        .wa-icon { width: 34px; height: 34px; background: #16a34a; border-radius: 8px; display: grid; place-items: center; flex-shrink: 0; }
        .wa-icon svg { width: 18px; height: 18px; color: white; }
        .help-wa small { font-size: 11px; color: var(--gray-400); }
        .help-wa span  { display: block; font-size: 14px; font-weight: 700; color: var(--gray-800); }

        @media (max-width: 768px) {
            .layout { grid-template-columns: 1fr; }
            .form-row.cols-2 { grid-template-columns: 1fr; }
        }
    </style>

    @stack('styles')
</head>
<body>

    {{-- NAVBAR --}}
    @include('partials.navbar-user')

    {{-- CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER — pakai footer.blade.php --}}
    @include('partials.footer')

    <script>
    /* Fungsi upload multi-file — tersedia global untuk semua halaman */
    function showFileName(input) {
        const preview = document.getElementById('file-preview');
        const nameEl  = document.getElementById('file-name');
        const sizeEl  = document.getElementById('file-size');
        if (input.files && input.files[0]) {
            const f = input.files[0];
            nameEl.textContent = f.name;
            const kb = (f.size / 1024).toFixed(0);
            sizeEl.textContent = kb > 1024 ? (f.size/1024/1024).toFixed(2)+' MB' : kb+' KB';
            if (preview) preview.style.display = 'flex';
        }
    }
    function clearFile() {
        const input   = document.querySelector('input[type="file"]');
        const preview = document.getElementById('file-preview');
        if (input)   input.value = '';
        if (preview) preview.style.display = 'none';
    }
    </script>

    @stack('scripts')
</body>
</html>