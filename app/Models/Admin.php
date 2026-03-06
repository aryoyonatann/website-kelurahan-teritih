<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admins';
    protected $primaryKey = 'id_admin';
    public $timestamps = false;

    protected $fillable = [
        'nama_admin',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    // relasi approval
    public function approval()
    {
        return $this->hasMany(Approval::class, 'id_admin');
    }

    // relasi informasi
    public function informasi()
    {
        return $this->hasMany(InformasiKelurahan::class, 'id_admin');
    }
}   