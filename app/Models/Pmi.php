<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pmi extends Model
{
    protected $fillable = [
        'nik',
        'no_paspor',
        'nama_pmi',
        'tanggal_lahir',
        'jenis_kelamin',
        'pendidikan',
        'alamat',
        'kecamatan',
        'kabupaten_kota',
        'rt',
        'rw',
    ];

    public function arrivals()
    {
        return $this->hasMany(PmiArrival::class);
    }
}
