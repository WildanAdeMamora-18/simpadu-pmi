<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PmiArrival extends Model
{
    protected $fillable = [

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
}
