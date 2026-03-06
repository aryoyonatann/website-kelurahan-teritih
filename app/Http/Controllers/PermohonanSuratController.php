<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermohonanSurat;
use App\Models\JenisSurat;

class PermohonanSuratController extends Controller
{
    // FORM INPUT
    public function create()
{
    $jenisSurat = JenisSurat::all(); // ambil data dari database

    return view('permohonan.create', compact('jenisSurat'));
}

    // SIMPAN DATA
    public function store(Request $request)
    {
        // VALIDASI (WAJIB BIAR AMAN)
        $request->validate([
            'id_user' => 'required',
            'id_jenis_surat' => 'required',
            'tanggal_pengajuan' => 'required|date',
            'keperluan' => 'required',
        ]);

        PermohonanSurat::create([
            'id_user' => $request->id_user,
            'id_jenis_surat' => $request->id_jenis_surat,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'keperluan' => $request->keperluan,
        ]);

        return redirect('/permohonan/create')
            ->with('success', 'Permohonan berhasil dikirim');
    }
}