<?php

namespace App\Models\Frontend\Pengaduan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'no_hp',
        'email',
        'alamat',
        'subjek_aduan',
        'pesan_aduan',
    ];
}
