<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PermohonanSurat;
use App\Models\Approval;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    public function index()
    {
        $data = PermohonanSurat::with(['user', 'jenisSurat', 'approval', 'persyaratan'])->latest('tanggal_pengajuan')->get();
        return view('admin.permohonan.index', compact('data'));
    }

    public function show($id)
    {
        $data = PermohonanSurat::with(['user', 'jenisSurat', 'approval', 'persyaratan'])->findOrFail($id);
        return view('admin.permohonan.show', compact('data'));
    }

    public function approve($id)
    {
        Approval::updateOrCreate(
            ['id_permohonan' => $id],
            [
                'id_admin'         => auth('admin')->id() ?? 1,
                'status'           => 'disetujui',
                'tanggal_approval' => now(),
            ]
        );

        return redirect()->back()->with('success', 'Permohonan berhasil disetujui.');
    }

    public function reject($id)
    {
        Approval::updateOrCreate(
            ['id_permohonan' => $id],
            [
                'id_admin'         => auth('admin')->id() ?? 1,
                'status'           => 'ditolak',
                'tanggal_approval' => now(),
            ]
        );

        return redirect()->back()->with('success', 'Permohonan berhasil ditolak.');
    }

    public function print($id)
    {
        $data = PermohonanSurat::with(['user', 'jenisSurat', 'approval'])->findOrFail($id);
        return view('admin.permohonan.show', compact('data'));
    }

    public function uploadTtd(Request $request)
    {
        $request->validate([
            'ttd' => 'required|image|mimes:png,jpeg,jpg|max:2048',
        ]);

        $request->file('ttd')->storeAs('ttd', 'ttd_lurah.png', 'public');

        return redirect()->back()->with('success', 'Tanda tangan berhasil diupload.');
    }
}