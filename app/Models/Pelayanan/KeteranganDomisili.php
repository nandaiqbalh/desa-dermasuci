<?php

namespace App\Models\Pelayanan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganDomisili extends Model
{
    use HasFactory;

    protected $fillable = ['no_surat', 'nama', 'no_hp', 'nik', 'tempat_tanggal_lahir',  'alamat_ktp', 'alamat_sekarang',  'status'];
}
