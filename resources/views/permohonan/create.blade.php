<h1>Form Permohonan Surat</h1>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<form action="/permohonan" method="POST">
    @csrf

    <label>User ID:</label><br>

    <label>Jenis Surat:</label><br>
    <select name="id_jenis_surat">
        <option value="">-- Pilih Jenis Surat --</option>
        
        @foreach($jenisSurat as $js)
            <option value="{{ $js->id_jenis_surat }}">
                {{ $js->nama_surat }}
            </option>
        @endforeach

    </select><br><br>

    <label>Tanggal Pengajuan:</label><br>
    <input type="date" name="tanggal_pengajuan"><br><br>

    <label>Keperluan:</label><br>
    <textarea name="keperluan"></textarea><br><br>

    <button type="submit">Kirim</button>
</form>