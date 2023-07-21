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
        Schema::create('kades', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Add the '' column as a string
            $table->string('jabatan'); // Add the '' column as a string
            $table->string('photo');  // Add the '' column as a string
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kades');
    }
};
