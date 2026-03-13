<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KependudukanController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $q = $request->search;
            $query->where(function ($q2) use ($q) {
                $q2->where('nama', 'like', "%$q%")
                   ->orWhere('nik', 'like', "%$q%")
                   ->orWhere('email', 'like', "%$q%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $sort = $request->get('sort', 'terbaru');
        match($sort) {
            'terlama' => $query->oldest('created_at'),
            'nama'    => $query->orderBy('nama'),
            default   => $query->latest('created_at'),
        };

        $users     = $query->paginate(10)->withQueryString();
        $totalUser = User::count();
        $nonAktif  = User::whereIn('status', ['non-aktif', 'blokir'])->count();

        return view('admin.kependudukan.index', compact('users', 'totalUser', 'nonAktif'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.kependudukan.show', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'          => 'required|string|max:100',
            'nik'           => 'required|string|max:20|unique:users,nik',
            'email'         => 'required|email|unique:users,email',
            'no_hp'         => 'required|string|max:15',
            'username'      => 'required|string|max:50|unique:users,username',
            'password'      => 'required|string|min:6',
            'alamat'        => 'nullable|string',
            'rt'            => 'nullable|string|max:10',
            'rw'            => 'nullable|string|max:10',
            'kelurahan'     => 'nullable|string|max:100',
            'kecamatan'     => 'nullable|string|max:100',
            'tempat_lahir'  => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
        ], [
            'nik.unique'      => 'NIK sudah terdaftar.',
            'email.unique'    => 'Email sudah digunakan.',
            'username.unique' => 'Username sudah dipakai.',
            'password.min'    => 'Password minimal 6 karakter.',
        ]);

        User::create([
            'nama'          => $request->nama,
            'nik'           => $request->nik,
            'email'         => $request->email,
            'no_hp'         => $request->no_hp,
            'username'      => $request->username,
            'password'      => Hash::make($request->password),
            'alamat'        => $request->alamat,
            'rt'            => $request->rt,
            'rw'            => $request->rw,
            'kelurahan'     => $request->kelurahan ?? 'Teritih',
            'kecamatan'     => $request->kecamatan ?? 'Walantaka',
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'status'        => 'aktif',
        ]);

        return redirect()->route('kependudukan.index')
            ->with('success', 'Data warga berhasil ditambahkan.');
    }

    public function toggleStatus($id)
    {
        $user         = User::findOrFail($id);
        $user->status = $user->status === 'aktif' ? 'non-aktif' : 'aktif';
        $user->save();

        return back()->with('success', 'Status warga berhasil diubah.');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return back()->with('success', 'Data warga berhasil dihapus.');
    }
}