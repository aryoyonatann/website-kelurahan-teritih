@extends('admin.layouts.app')

@section('title', 'Manajemen Informasi')

@section('content')

<h1>Manajemen Berita / Informasi</h1>

@if(session('success'))
    <div style="color:green;margin-bottom:15px;">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('informasi.create') }}" class="btn-primary" style="display:inline-block;margin-bottom:15px;">
    + Tulis Baru
</a>

<div class="card">
    <table border="1" cellpadding="10" width="100%">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>

        @foreach($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->judul }}</td>
            <td>
                @if($item->status == 'publish')
                    <span style="color:green;">Publish</span>
                @else
                    <span style="color:orange;">Draft</span>
                @endif
            </td>
            <td>{{ $item->tanggal_publish }}</td>
            <td>
                <a href="{{ route('informasi.edit', $item->id_informasi) }}">Edit</a>

                <form action="{{ route('informasi.destroy', $item->id_informasi) }}" 
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
</div>

@endsection