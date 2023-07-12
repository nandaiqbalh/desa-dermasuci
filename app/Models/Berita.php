<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'judul_berita',
        'subjudul_berita',
        'isi_berita',
        'penulis',
        'thumbnail',
        'galeri',
    ];

    protected $casts = [
        'galeri' => 'array',
    ];
}
