<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PmiPengaduan extends Model
{
    protected $fillable = [
        'user_id',
        'nama_pmi',
        'paspor',
        'negara_asal',
        'tanggal_kedatangan',
        'jenis_pengaduan',
        'deskripsi',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pmiArrival(): BelongsTo
    {
        return $this->belongsTo(PmiArrival::class);
    }
}
