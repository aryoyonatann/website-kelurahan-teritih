<h2>Edit Jenis Surat</h2>

<form action="{{ route('jenis-surat.update', $data->id_jenis_surat) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Nama Surat</label>
        <input type="text" name="nama_surat" value="{{ $data->nama_surat }}">
    </div>

    <div>
        <label>Deskripsi</label>
        <textarea name="deskripsi">{{ $data->deskripsi }}</textarea>
    </div>

    <button type="submit">Update</button>
</form>