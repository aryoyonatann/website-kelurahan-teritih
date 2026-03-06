@extends('layouts.app')

@section('content')

<h2>Permohonan Saya</h2>

<a href="{{ route('user.permohonan.create') }}">+ Ajukan Surat</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
<tr>
    <th>No</th>
    <th>Jenis Surat</th>
    <th>Tanggal</th>
    <th>Status</th>
</tr>

@foreach($data as $d)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $d->jenisSurat->nama_surat ?? '-' }}</td>
    <td>{{ $d->tanggal_pengajuan }}</td>
    <td>{{ $d->approval->status ?? 'Pending' }}</td>
</tr>
@endforeach

</table>

@endsection