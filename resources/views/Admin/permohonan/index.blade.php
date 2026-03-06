@extends('admin.layouts.app')

@section('title', 'Data Permohonan')

@section('content')
<h1>Daftar Permohonan</h1>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama Pemohon</th>
        <th>Jenis Surat</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($data as $d)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $d->user->nama ?? '-' }}</td>
        <td>{{ $d->jenisSurat->nama_surat ?? '-' }}</td>
        <td>{{ $d->tanggal_pengajuan }}</td>
        <td>
            {{ $d->approval->status ?? 'pending' }}
        </td>
        <td>
        <a href="{{ route('permohonan.show', $d->id_permohonan) }}">Detail</a>
            @if(!$d->approval)
                <form action="{{ route('permohonan.approve', $d->id_permohonan) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit">Approve</button>
                </form>

                <form action="{{ route('permohonan.reject', $d->id_permohonan) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit">Tolak</button>
                </form>
            @else
                -
            @endif
        </td>
    </tr>
    @endforeach
</table>
@endsection