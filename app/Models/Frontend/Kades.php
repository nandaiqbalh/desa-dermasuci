<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kades extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'jabatan', 'photo'];
}
