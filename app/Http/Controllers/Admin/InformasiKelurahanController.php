<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InformasiKelurahan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InformasiKelurahanController extends Controller
{
    public function index()
    {
        $data = InformasiKelurahan::orderBy('tanggal_publish', 'desc')->get();
        return view('admin.informasi.index', compact('data'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'isi'      => 'required|string',
            'status'   => 'required|in:draft,publish',
            'gambar'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambar = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('berita', 'public');
        }

        InformasiKelurahan::create([
            'judul'           => $request->judul,
            'slug'            => Str::slug($request->judul) . '-' . time(),
            'kategori'        => $request->kategori,
            'isi'             => $request->isi,
            'ringkasan'       => $request->ringkasan ?? Str::limit(strip_tags($request->isi), 150),
            'status'          => $request->status,
            'tanggal_publish' => $request->status === 'publish' ? now() : null,
            'id_admin'        => auth('admin')->user()->id_admin,
            'gambar'          => $gambar,
            'views'           => 0,
        ]);

        // ✅ Fix: route name yang benar adalah 'informasi-admin.index'
        return redirect()->route('informasi-admin.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = InformasiKelurahan::findOrFail($id);
        return view('admin.informasi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = InformasiKelurahan::findOrFail($id);

        $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'isi'      => 'required|string',
            'status'   => 'required|in:draft,publish',
            'gambar'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Ganti gambar lama jika ada upload baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage
            if ($data->gambar) {
                Storage::disk('public')->delete($data->gambar);
            }
            $data->gambar = $request->file('gambar')->store('berita', 'public');
        }

        // Update tanggal_publish hanya jika status berubah dari draft ke publish
        $tanggalPublish = $data->tanggal_publish;
        if ($request->status === 'publish' && $data->status === 'draft') {
            $tanggalPublish = now();
        } elseif ($request->status === 'draft') {
            $tanggalPublish = null;
        }

        $data->update([
            'judul'           => $request->judul,
            'slug'            => Str::slug($request->judul) . '-' . $data->id_informasi,
            'kategori'        => $request->kategori,
            'isi'             => $request->isi,
            'ringkasan'       => $request->ringkasan ?? Str::limit(strip_tags($request->isi), 150),
            'status'          => $request->status,
            'tanggal_publish' => $tanggalPublish,
            'gambar'          => $data->gambar,
        ]);

        // ✅ Fix: route name yang benar
        return redirect()->route('informasi-admin.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = InformasiKelurahan::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($data->gambar) {
            Storage::disk('public')->delete($data->gambar);
        }

        $data->delete();

        return back()->with('success', 'Berita berhasil dihapus.');
    }
}