<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InformasiKelurahan;

class InformasiKelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        'judul' => 'required',
        'isi' => 'required',
        'kategori' => 'required',
        'status' => 'required'
    ]);

    $gambar = null;

    if($request->hasFile('gambar')){
        $gambar = $request->file('gambar')->store('berita','public');
    }

    InformasiKelurahan::create([
        'judul' => $request->judul,
        'kategori' => $request->kategori,
        'isi' => $request->isi,
        'tanggal_publish' => $request->status == 'publish' ? now() : null,
        'id_admin' => auth('admin')->user()->id_admin,
        'status' => $request->status,
        'gambar' => $gambar
    ]);

    return redirect()->route('informasi.index')
        ->with('success', 'Informasi berhasil ditambahkan');
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
        'judul' => 'required',
        'isi' => 'required',
        'kategori' => 'required',
        'status' => 'required'
    ]);

    if($request->hasFile('gambar')){
        $gambar = $request->file('gambar')->store('berita','public');
        $data->gambar = $gambar;
    }

    $data->update([
        'judul' => $request->judul,
        'kategori' => $request->kategori,
        'isi' => $request->isi,
        'status' => $request->status,
    ]);

    return redirect()->route('informasi.index')
        ->with('success', 'Informasi berhasil diupdate');
}

public function destroy($id)
{
    InformasiKelurahan::destroy($id);

    return back()->with('success', 'Informasi berhasil dihapus');
}
}
