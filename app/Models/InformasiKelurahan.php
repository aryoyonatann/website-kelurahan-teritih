<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformasiKelurahan extends Model
{
    protected $table = 'informasi_kelurahan';
protected $primaryKey = 'id_informasi';
public $timestamps = false;

protected $fillable = [
    'judul',
    'kategori',
    'isi',
    'tanggal_publish',
    'id_admin',
    'status',
    'gambar'
];

public function admin()
{
    return $this->belongsTo(Admin::class, 'id_admin');
}
}
