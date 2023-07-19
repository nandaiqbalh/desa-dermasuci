<?php

namespace App\Models\Pelayanan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktaKematian extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_surat',
        'nama',
        'no_hp',
        'nik',
        'tempat_tanggal_lahir',
        'alamat',
        'nama_termohon',
        'bin_termohon',
        'nik_termohon',
        'ttl_termohon',
        'jenis_kelamin_termohon',
        'agama_termohon',
        'tanggal_meninggal',
        'jam_meninggal',
        'tempat_meninggal',
        'status',
        'catatan',
    ];
}
