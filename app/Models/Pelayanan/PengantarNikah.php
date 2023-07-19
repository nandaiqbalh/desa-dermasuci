<?php

namespace App\Models\Pelayanan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengantarNikah extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_surat',
        'nama',
        'no_hp',
        'nik',
        'tempat_tanggal_lahir',
        'pekerjaan',
        'alamat',
        'agama',
        'status_perkawinan',
        'nama_ayah',
        'no_hp_ayah',
        'nik_ayah',
        'tempat_tanggal_lahir_ayah',
        'pekerjaan_ayah',
        'alamat_ayah',
        'agama_ayah',
        'nama_ibu',
        'no_hp_ibu',
        'nik_ibu',
        'tempat_tanggal_lahir_ibu',
        'pekerjaan_ibu',
        'alamat_ibu',
        'agama_ibu',
        'status',
        'catatan',
    ];
}
