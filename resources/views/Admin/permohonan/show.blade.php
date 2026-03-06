<h2>Detail Permohonan Surat</h2>

<a href="{{ route('permohonan.index') }}">← Kembali</a>

<hr>

<p><strong>Nama Pemohon:</strong> {{ $data->user->nama ?? '-' }}</p>

<p><strong>Jenis Surat:</strong> {{ $data->jenisSurat->nama_surat ?? '-' }}</p>

<p><strong>Tanggal Pengajuan:</strong> {{ $data->tanggal_pengajuan }}</p>

<p><strong>Keperluan:</strong></p>
<p>{{ $data->keperluan }}</p>

<p><strong>Status:</strong>
    {{ $data->approval->status ?? 'pending' }}
</p>

@if($data->approval)
    <p><strong>Tanggal Approval:</strong>
        {{ $data->approval->tanggal_approval }}
    </p>
@endif