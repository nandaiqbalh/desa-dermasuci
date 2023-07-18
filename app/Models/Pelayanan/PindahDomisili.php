<?php

namespace App\Models\Pelayanan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PindahDomisili extends Model
{
    use HasFactory;
    protected $fillable = ['no_surat', 'nama', 'no_kk', 'no_hp', 'nik', 'keterangan', 'tempat_tanggal_lahir',  'alamat_asal', 'alamat_tujuan',  'status'];
}
