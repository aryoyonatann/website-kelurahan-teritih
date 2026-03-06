<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisSurat;

class JenisSuratController extends Controller
{
    public function index()
    {
        $data = JenisSurat::all();
        return view('admin.jenis_surat.index', compact('data'));
    }

    public function create()
    {
        return view('admin.jenis_surat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_surat' => 'required',
            'deskripsi' => 'nullable'
        ]);

        JenisSurat::create($request->all());

        return redirect()->route('jenis-surat.index')
            ->with('success', 'Jenis surat berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = JenisSurat::findOrFail($id);
        return view('admin.jenis_surat.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_surat' => 'required'
        ]);

        $data = JenisSurat::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('jenis-surat.index')
            ->with('success', 'Jenis surat berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = JenisSurat::findOrFail($id);
        $data->delete();

        return redirect()->route('jenis-surat.index')
            ->with('success', 'Jenis surat berhasil dihapus');
    }
}