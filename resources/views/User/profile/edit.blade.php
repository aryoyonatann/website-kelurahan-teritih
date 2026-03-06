@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-6 bg-white p-6 rounded shadow">

    <h2 class="text-xl font-bold mb-4">Edit Profil</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ auth()->user()->nama }}"
                class="w-full border p-2 rounded">
        </div>

        <div class="mb-3">
            <label>NIK</label>
            <input type="text" name="nik" value="{{ auth()->user()->nik }}"
                class="w-full border p-2 rounded">
        </div>

      <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat"
                class="w-full border p-2 rounded">{{ auth()->user()->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" value="{{ auth()->user()->no_hp }}"
                class="w-full border p-2 rounded">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ auth()->user()->email }}"
                class="w-full border p-2 rounded">
        </div>

        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" value="{{ auth()->user()->username }}"
                class="w-full border p-2 rounded">
        </div>

        

        <div class="mb-3">
            <label>Password (kosongkan jika tidak diganti)</label>
            <input type="password" name="password"
                class="w-full border p-2 rounded">
        </div>

        <button type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded">
            Simpan Perubahan
        </button>
    </form>

</div>
@endsection