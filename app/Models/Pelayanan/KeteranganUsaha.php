<?php

namespace App\Models\Pelayanan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganUsaha extends Model
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
        'nama_usaha',
        'tanggal_usaha',
        'alamat_usaha',
        'jenis_usaha',
        'status',
        'catatan',
    ];
}
