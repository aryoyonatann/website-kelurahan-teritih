<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_user';
    protected $table = 'users';

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
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'foto',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_lahir' => 'date',
            'password'      => 'hashed',
        ];
    }
}