<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // ── Primary key sesuai database ─────────────────────────────────
    protected $primaryKey = 'id_user';

    // ── Nama tabel (opsional, tapi eksplisit lebih aman) ────────────
    protected $table = 'users';

    // ── Kolom yang boleh diisi massal ───────────────────────────────
    // Disesuaikan PERSIS dengan kolom yang ada di tabel users
    protected $fillable = [
        'nama',
        'nik',
        'alamat',
        'no_hp',
        'email',
        'tempat_lahir',
        'tanggal_lahir',
        'username',
        'password',
        // Kolom baru (setelah migration)
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'foto',
    ];

    // ── Kolom yang disembunyikan ────────────────────────────────────
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // ── Cast ────────────────────────────────────────────────────────
    protected function casts(): array
    {
        return [
            'tanggal_lahir' => 'date',
            'password'      => 'hashed',
        ];
    }
}