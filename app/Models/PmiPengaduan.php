<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PmiPengaduan extends Model
{
    protected $fillable = [
        'nama_pmi',
        'paspor',
        'negara_asal',
        'tanggal_kedatangan',
        'jenis_pengaduan',
        'deskripsi',
        'status',
    ];
}
