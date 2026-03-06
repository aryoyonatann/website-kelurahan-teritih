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
        $data = PermohonanSurat::with(['user','jenisSurat','approval'])->get();
        return view('admin.permohonan.index', compact('data'));
    }

    public function approve($id)
    {
        Approval::updateOrCreate(
            ['id_permohonan' => $id],
            [
                'id_admin' => 1, // sementara isi manual
                'status' => 'disetujui',
                'tanggal_approval' => now()
            ]
        );

        return redirect()->back()->with('success', 'Permohonan disetujui');
    }

    public function reject($id)
    {
        Approval::updateOrCreate(
            ['id_permohonan' => $id],
            [
                'id_admin' => auth('admin')->id(),
                'status' => 'ditolak',
                'tanggal_approval' => now()
            ]
        );

        return redirect()->back()->with('success', 'Permohonan ditolak');
    }
    public function show($id)
{
    $data = PermohonanSurat::with([
        'user',
        'jenisSurat',
        'approval'
    ])->findOrFail($id);

    return view('admin.permohonan.show', compact('data'));
}
}