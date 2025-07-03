<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'name', 'address', 'phone', 'nama_dewan', 'dapil', 'tujuan', 'message', 'kategori',
        'urgensi', 'cakupan_wilayah', 'dampak_sosial', 'file_path', 'status'
    ];
    

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
