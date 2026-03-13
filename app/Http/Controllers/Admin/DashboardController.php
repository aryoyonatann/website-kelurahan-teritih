<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InformasiKelurahan;
use App\Models\PermohonanSurat;
use App\Models\User;
use App\Models\Approval;

class DashboardController extends Controller
{
    public function index()
    {
        // ── Stat cards realtime ──────────────────────────
        $totalWarga       = User::count();
        $perluVerifikasi  = PermohonanSurat::whereDoesntHave('approval')
            ->orWhereHas('approval', fn($q) => $q->whereRaw('LOWER(status) = ?', ['pending']))
            ->count();
        $suratKeluar      = Approval::whereRaw('LOWER(status) = ?', ['disetujui'])->count();

        // ── Berita terbaru ───────────────────────────────
        $beritaTerbaru = InformasiKelurahan::orderBy('tanggal_publish', 'desc')
            ->take(5)
            ->get();

        // ── Permohonan terbaru ───────────────────────────
        $permohonanTerbaru = PermohonanSurat::with(['user', 'jenisSurat', 'approval'])
            ->latest('tanggal_pengajuan')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalWarga',
            'perluVerifikasi',
            'suratKeluar',
            'beritaTerbaru',
            'permohonanTerbaru'
        ));
    }
}