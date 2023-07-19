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
        Schema::create('akta_kematians', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat')->nullable();
            $table->string('nama')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('nik')->nullable();
            $table->string('tempat_tanggal_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nama_termohon')->nullable();
            $table->string('bin_termohon')->nullable();
            $table->string('nik_termohon')->nullable();
            $table->string('ttl_termohon')->nullable();
            $table->string('jenis_kelamin_termohon')->nullable();
            $table->string('agama_termohon')->nullable();
            $table->string('tanggal_meninggal')->nullable();
            $table->string('jam_meninggal')->nullable();
            $table->string('tempat_meninggal')->nullable();
            $table->integer('status')->default(0);
            $table->longText('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akta_kematians');
    }
};
