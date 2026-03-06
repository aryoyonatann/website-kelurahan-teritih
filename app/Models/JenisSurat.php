<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    protected $table = 'jenis_surat';
    protected $primaryKey = 'id_jenis_surat';
    public $timestamps = false;

    protected $fillable = [
        'nama_surat',
        'deskripsi'
    ];

    public function permohonan()
    {
        return $this->hasMany(PermohonanSurat::class, 'id_jenis_surat');
    }
}