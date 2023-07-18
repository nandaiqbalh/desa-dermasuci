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
        Schema::create('keterangan_usahas', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat')->nullable();
            $table->string('nama')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('nik')->nullable();
            $table->string('tempat_tanggal_lahir')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('agama')->nullable();
            $table->string('nama_usaha')->nullable();
            $table->string('tanggal_usaha')->nullable();
            $table->string('alamat_usaha')->nullable();
            $table->string('jenis_usaha')->nullable();
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
        Schema::dropIfExists('keterangan_usahas');
    }
};
