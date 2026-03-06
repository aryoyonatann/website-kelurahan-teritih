@extends('admin.layouts.app')

@section('title', 'Edit Informasi')

@section('content')

<h1>Edit Informasi / Berita</h1>

@if ($errors->any())
    <div style="color:red;margin-bottom:15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('informasi.update', $data->id_informasi) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div style="margin-bottom:15px;">
        <label>Judul</label><br>
        <input type="text" name="judul" value="{{ $data->judul }}" style="width:100%;" required>
    </div>

    <div style="margin-bottom:15px;">
        <label>Kategori</label><br>
        <input type="text" name="kategori" value="{{ $data->kategori }}" style="width:100%;" required>
    </div>

    <div style="margin-bottom:15px;">
        <label>Isi</label><br>
        <textarea name="isi" rows="5" style="width:100%;" required>{{ $data->isi }}</textarea>
    </div>

    <div style="margin-bottom:15px;">
        <label>Status</label><br>
        <select name="status" style="width:100%;">
            <option value="draft" {{ $data->status == 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="publish" {{ $data->status == 'publish' ? 'selected' : '' }}>Publish</option>
        </select>
    </div>

    <div style="margin-bottom:15px;">
        <label>Gambar</label><br>
        @if($data->gambar)
            <img src="{{ asset('storage/'.$data->gambar) }}" width="150"><br><br>
        @endif
        <input type="file" name="gambar">
    </div>

    <button class="btn-primary">Update</button>
    <a href="{{ route('informasi.index') }}">Kembali</a>

</form>

@endsection