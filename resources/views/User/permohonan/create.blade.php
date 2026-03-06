@extends('layouts.app')

@section('content')

<h2>Ajukan Permohonan Surat</h2>

<form method="POST" action="{{ route('user.permohonan.store') }}">
@csrf

<label>Jenis Surat</label>
<select name="jenis_surat_id">
    @foreach($jenisSurat as $j)
        <option value="{{ $j->id_jenis_surat }}">
            {{ $j->nama_surat }}
        </option>
    @endforeach
</select>

<br><br>

<label>Keperluan</label>
<textarea name="keperluan"></textarea>

<br><br>

<button type="submit" 
class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
    Kirim Permohonan
</button>

</form>

@endsection