<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermohonanSurat extends Model
{
    protected $table = 'permohonan_surat';
protected $primaryKey = 'id_permohonan';
public $timestamps = false;

protected $fillable = [
    'id_user',
    'id_jenis_surat',
    'tanggal_pengajuan',
    'keperluan',
];

// relasi ke user
public function user()
{
    return $this->belongsTo(User::class, 'id_user', 'id_user');
}

// relasi ke jenis surat
public function jenisSurat()
{
    return $this->belongsTo(JenisSurat::class, 'id_jenis_surat', 'id_jenis_surat');
}

// relasi ke persyaratan
public function persyaratan()
{
    return $this->hasMany(Persyaratan::class, 'id_permohonan');
}

// relasi ke approval
public function approval()
{
    return $this->hasOne(Approval::class, 'id_permohonan');
}
}
