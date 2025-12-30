<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\PmiPengaduan;

class PmiArrival extends Model
{
    protected $fillable = [

        'user_id',

        // Kedatangan
        'tanggal_kedatangan',
        'flight_number',
        'jam_kedatangan',
        'no_paspor',
        'kantor_imigrasi',

        // Data diri
        'nama_pmi',
        'tanggal_lahir',
        'jenis_kelamin',
        'pendidikan',

        // Alamat
        'alamat_jalan',
        'kecamatan',
        'kabupaten_kota',
        'rt',
        'rw',

        // Penempatan
        'pengirim',
        'agency',
        'negara_penempatan',
        'pekerjaan',
        'jenis_kepulangan',
        'ket_kepulangan',

        // Kepulangan
        'dijemput',
        'pulang_sendiri',
        'transit',
    ];

    /**
     * Relasi ke tabel users
     * Satu data kedatangan dicatat oleh satu user
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pengaduanPmis(): HasMany
    {
        return $this->hasMany(PmiPengaduan::class);
    }
    
    public function pmi()
    {
        return $this->belongsTo(Pmi::class);
    }
}
