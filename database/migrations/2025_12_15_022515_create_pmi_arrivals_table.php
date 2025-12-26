<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pmi_arrivals', function (Blueprint $table) {
            $table->id();

            // Relasi ke users (petugas input)
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // DATA KEDATANGAN PMI
            $table->date('tanggal_kedatangan');
            $table->string('flight_number', 50);
            $table->string('jam_kedatangan', 10);
            $table->string('no_paspor', 50);
            $table->string('kantor_imigrasi', 100);

            // DATA DIRI PMI
            $table->string('nama_pmi', 150);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->enum('pendidikan', ['sd', 'smp', 'sma']);

            // ALAMAT
            $table->string('alamat_jalan');
            $table->string('kecamatan', 100);
            $table->string('kabupaten_kota', 100);
            $table->string('rt', 5);
            $table->string('rw', 5);

            // DATA PENEMPATAN & KEPULANGAN
            $table->string('pengirim', 150)->nullable();
            $table->string('agency', 150)->nullable();
            $table->string('negara_penempatan', 100);
            $table->string('pekerjaan', 100);
            $table->enum('jenis_kepulangan', [
                'finish',
                'cuti',
                'bermasalah',
                'lainnya',
            ]);
            $table->text('ket_kepulangan')->nullable();

            // DATA KEPULANGAN DARI BANDARA
            $table->string('dijemput', 50)->nullable();
            $table->string('pulang_sendiri', 50)->nullable();
            $table->string('transit', 50)->nullable();

            // METADATA
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pmi_arrivals');
    }
};
