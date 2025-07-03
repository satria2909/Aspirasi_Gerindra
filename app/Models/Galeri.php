<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    // Nama tabel (opsional, jika sesuai konvensi Laravel bisa diabaikan)
    protected $table = 'galeris';

    // Kolom yang bisa diisi (fillable)
    protected $fillable = [
        'title',
        'description',
        'file_path',
    ];
}

