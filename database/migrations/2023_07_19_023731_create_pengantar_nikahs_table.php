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
        Schema::create('pengantar_nikahs', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat')->nullable();
            $table->string('nama')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('nik')->nullable();
            $table->string('tempat_tanggal_lahir')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('agama')->nullable();
            $table->string('status_perkawinan')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('no_hp_ayah')->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('tempat_tanggal_lahir_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('alamat_ayah')->nullable();
            $table->string('agama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('no_hp_ibu')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('tempat_tanggal_lahir_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('alamat_ibu')->nullable();
            $table->string('agama_ibu')->nullable();
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
        Schema::dropIfExists('pengantar_nikahs');
    }
};
