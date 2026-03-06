@extends('admin.layouts.app')

@section('title', 'Data Jenis Surat')

@section('content')

<h1>Data Jenis Surat</h1>

@if(session('success'))
    <div style="color: green; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('jenis-surat.create') }}" style="display:inline-block;margin-bottom:15px;">
    Tambah Jenis Surat
</a>

<table border="1" cellpadding="10" width="100%">
    <tr>
        <th>No</th>
        <th>Nama Surat</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
    </tr>

    @foreach($data as $d)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $d->nama_surat }}</td>
        <td>{{ $d->deskripsi }}</td>
        <td>
            <a href="{{ route('jenis-surat.edit', $d->id_jenis_surat) }}">Edit</a>

            <form action="{{ route('jenis-surat.destroy', $d->id_jenis_surat) }}" 
                  method="POST" 
                  style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection