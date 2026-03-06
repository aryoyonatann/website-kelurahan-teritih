<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PermohonanSurat;
use App\Models\JenisSurat;
use Illuminate\Http\Request;

class PermohonanUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'jenis_surat_id' => 'required',
            'keperluan' => 'required'
        ]);

        

        PermohonanSurat::create([
            'id_user' => auth()->user()->id_user, // penting!
            'id_jenis_surat' => $request->jenis_surat_id,
            'tanggal_pengajuan' => now(),
            'keperluan' => $request->keperluan,
        ]);

        return redirect()->route('user.permohonan.index')
            ->with('success', 'Permohonan berhasil dikirim');
    }
    public function index()
{
    $data = \App\Models\PermohonanSurat::where('id_user', auth()->user()->id_user)
        ->with(['jenisSurat', 'approval'])
        ->get();

    return view('User.permohonan.index', compact('data'));
}
public function create()
{
    $jenisSurat = \App\Models\JenisSurat::all();

    return view('User.permohonan.create', compact('jenisSurat'));
}
}
