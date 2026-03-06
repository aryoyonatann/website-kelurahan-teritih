<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persyaratan extends Model
{
    protected $table = 'persyaratan';
protected $primaryKey = 'id_persyaratan';
public $timestamps = false;

public function permohonan()
{
    return $this->belongsTo(PermohonanSurat::class, 'id_permohonan');
}
}
