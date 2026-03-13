<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PermohonanSurat;
use App\Models\JenisSurat;
use App\Models\Persyaratan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PermohonanUserController extends Controller
{
    /**
     * Daftar permohonan milik user yang sedang login
     */
    public function index()
    {
        $data = PermohonanSurat::with(['jenisSurat', 'approval'])
            ->where('id_user', Auth::id())
            ->latest('tanggal_pengajuan')
            ->get();

        return view('User.permohonan.index', compact('data'));
    }

    /**
     * Form buat permohonan baru
     * Akses: /user/permohonan/create?jenis_surat=1
     */
    public function create(Request $request)
    {
        $daftarJenisSurat = JenisSurat::all();
        $selectedJenis = $request->jenis_surat ?? null;

        return view('User.permohonan.create', compact('daftarJenisSurat', 'selectedJenis'));
    }

    /**
     * Simpan permohonan baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_jenis_surat'  => 'required|exists:jenis_surat,id_jenis_surat',
            'nama_pemohon'    => 'required|string|max:255',
            'nik_pemohon'     => 'required|string|max:20',
            'alamat_pemohon'  => 'required|string|max:500',
            'keperluan'       => 'required|string|max:500',
            'dokumen'         => 'nullable|array|max:5',
            'dokumen.*'       => 'file|mimes:pdf,jpg,jpeg,png|max:10240',
        ], [
            'id_jenis_surat.required' => 'Jenis surat wajib dipilih.',
            'id_jenis_surat.exists'   => 'Jenis surat tidak valid.',
            'nama_pemohon.required'   => 'Nama pemohon wajib diisi.',
            'nik_pemohon.required'    => 'NIK pemohon wajib diisi.',
            'alamat_pemohon.required' => 'Alamat pemohon wajib diisi.',
            'keperluan.required'      => 'Tujuan/keperluan surat wajib diisi.',
            'dokumen.max'             => 'Maksimal 5 file yang dapat diunggah.',
            'dokumen.*.mimes'         => 'Format file harus PDF, JPG, atau PNG.',
            'dokumen.*.max'           => 'Ukuran setiap file maksimal 2MB.',
        ]);

        $user = Auth::user();

        // Cek apakah mengajukan untuk diri sendiri atau orang lain
        $isWakil = ($request->nik_pemohon !== $user->nik);

        $permohonan = PermohonanSurat::create([
            'id_user'           => Auth::id(),
            'id_jenis_surat'    => $request->id_jenis_surat,
            'nama_pemohon'      => $request->nama_pemohon,
            'nik_pemohon'       => $request->nik_pemohon,
            'alamat_pemohon'    => $request->alamat_pemohon,
            'keperluan'         => $request->keperluan,
            'tanggal_pengajuan' => now(),
        ]);

        // Simpan semua file ke tabel persyaratan
        if ($request->hasFile('dokumen')) {
            foreach ($request->file('dokumen') as $file) {
                if ($file->isValid()) {
                    Persyaratan::create([
                        'id_permohonan' => $permohonan->id_permohonan,
                        'nama_file'     => $file->getClientOriginalName(),
                        'path_file'     => $file->store('persyaratan', 'public'),
                        'uploaded_at'   => now(),
                    ]);
                }
            }
        }

        return redirect()
            ->route('user.permohonan.index')
            ->with('success', 'Permohonan berhasil dikirim! Silakan tunggu konfirmasi dari admin.');
    }

    /**
     * Detail permohonan milik user
     */
    public function show($id)
    {
        $permohonan = PermohonanSurat::with(['jenisSurat', 'approval', 'persyaratan'])
            ->where('id_user', Auth::id())
            ->findOrFail($id);

        return view('User.permohonan.show', compact('permohonan'));
    }

    /**
     * Form edit permohonan (hanya jika masih pending)
     */
    public function edit($id)
    {
        $permohonan = PermohonanSurat::with(['jenisSurat', 'approval', 'persyaratan'])
            ->where('id_user', Auth::id())
            ->findOrFail($id);

        if ($permohonan->approval && $permohonan->approval->status !== 'pending') {
            return redirect()
                ->route('user.permohonan.index')
                ->with('error', 'Permohonan yang sudah diproses tidak dapat diedit.');
        }

        return view('User.permohonan.edit', compact('permohonan'));
    }

    /**
     * Update permohonan
     */
    public function update(Request $request, $id)
    {
        $permohonan = PermohonanSurat::with(['approval', 'persyaratan'])
            ->where('id_user', Auth::id())
            ->findOrFail($id);

        if ($permohonan->approval && $permohonan->approval->status !== 'pending') {
            return redirect()
                ->route('user.permohonan.index')
                ->with('error', 'Permohonan yang sudah diproses tidak dapat diedit.');
        }

        $request->validate([
            'keperluan'   => 'required|string|max:500',
            'dokumen'     => 'nullable|array|max:5',
            'dokumen.*'   => 'file|mimes:pdf,jpg,jpeg,png|max:10240',
        ], [
            'keperluan.required'  => 'Tujuan/keperluan surat wajib diisi.',
            'dokumen.max'         => 'Maksimal 5 file yang dapat diunggah.',
            'dokumen.*.mimes'     => 'Format file harus PDF, JPG, atau PNG.',
            'dokumen.*.max'       => 'Ukuran setiap file maksimal 2MB.',
        ]);

        $permohonan->keperluan = $request->keperluan;
        $permohonan->save();

        // Tambah file baru ke persyaratan (tidak hapus yang lama)
        if ($request->hasFile('dokumen')) {
            $jumlahLama = $permohonan->persyaratan()->count();
            $filesBaru  = $request->file('dokumen');
            $sisa       = 5 - $jumlahLama;

            foreach (array_slice($filesBaru, 0, $sisa) as $file) {
                if ($file->isValid()) {
                    Persyaratan::create([
                        'id_permohonan' => $permohonan->id_permohonan,
                        'nama_file'     => $file->getClientOriginalName(),
                        'path_file'     => $file->store('persyaratan', 'public'),
                        'uploaded_at'   => now(),
                    ]);
                }
            }
        }

        return redirect()
            ->route('user.permohonan.index')
            ->with('success', 'Permohonan berhasil diperbarui.');
    }

    /**
     * Hapus permohonan (hanya jika masih pending)
     */
    public function destroy($id)
    {
        $permohonan = PermohonanSurat::with(['approval', 'persyaratan'])
            ->where('id_user', Auth::id())
            ->findOrFail($id);

        if ($permohonan->approval && $permohonan->approval->status !== 'pending') {
            return redirect()
                ->route('user.permohonan.index')
                ->with('error', 'Permohonan yang sudah diproses tidak dapat dihapus.');
        }

        foreach ($permohonan->persyaratan as $dok) {
            Storage::disk('public')->delete($dok->path_file);
        }

        $permohonan->delete();

        return redirect()
            ->route('user.permohonan.index')
            ->with('success', 'Permohonan berhasil dihapus.');
    }
}