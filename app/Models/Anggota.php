<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $fillable = [
        'jam_masuk',
        'jam_pulang',
        'jam_masuk_telat',
        'jam_pulang_telat',
        'jam_kerja',
        'user_id'
    ];

}
