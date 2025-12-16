<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pmi_pengaduans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pmi');
            $table->string('paspor')->nullable();
            $table->string('negara_asal');
            $table->date('tanggal_kedatangan')->nullable();
            $table->string('jenis_pengaduan');
            $table->text('deskripsi');
            $table->enum('status', ['masuk', 'diproses', 'selesai'])->default('masuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pmi_pengaduans');
    }
};
