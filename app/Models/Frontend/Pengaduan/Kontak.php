<?php

namespace App\Models\Frontend\Pengaduan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $fillable = [
        'alamat',
        'telpon',
        'email',
    ];
}
