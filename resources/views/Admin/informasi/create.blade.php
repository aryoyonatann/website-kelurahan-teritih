@extends('admin.layouts.app')

@section('title', 'Tambah Informasi')

@section('content')

<h1>Tambah Informasi / Berita</h1>

@if ($errors->any())
    <div style="color:red;margin-bottom:15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('informasi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div style="margin-bottom:15px;">
        <label>Judul</label><br>
        <input type="text" name="judul" style="width:100%;" required>
    </div>

    <div style="margin-bottom:15px;">
        <label>Kategori</label><br>
        <input type="text" name="kategori" style="width:100%;" required>
    </div>

    <div style="margin-bottom:15px;">
        <label>Isi</label><br>
        <textarea name="isi" rows="5" style="width:100%;" required></textarea>
    </div>

    <div style="margin-bottom:15px;">
        <label>Status</label><br>
        <select name="status" style="width:100%;">
            <option value="draft">Draft</option>
            <option value="publish">Publish</option>
        </select>
    </div>

    <div style="margin-bottom:15px;">
        <label>Gambar</label><br>
        <input type="file" name="gambar">
    </div>

    <button class="btn-primary">Simpan</button>
    <a href="{{ route('informasi.index') }}">Kembali</a>

</form>

@endsection