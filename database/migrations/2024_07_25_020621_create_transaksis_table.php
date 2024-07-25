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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->string('id_transaksi')->primary(); // Menjadikan id_transaksi sebagai primary key
            $table->string('id_buku');
            $table->string('id_anggota');
            $table->string('tanggal_meminjam');
            $table->string('tanggal_mengembalikan');
            $table->string('status_transaksi');
            $table->timestamps();

            // Definisikan foreign key dengan benar
            $table->foreign('id_buku')->references('id_buku')->on('bukus');
            $table->foreign('id_anggota')->references('id_anggota')->on('anggotas'); // Perbarui referensi ke tabel 'anggotas'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
