<h2>Tambah Jenis Surat</h2>

<form action="{{ route('jenis-surat.store') }}" method="POST">
    @csrf

    <div>
        <label>Nama Surat</label>
        <input type="text" name="nama_surat">
    </div>

    <div>
        <label>Deskripsi</label>
        <textarea name="deskripsi"></textarea>
    </div>

    <button type="submit">Simpan</button>
</form>