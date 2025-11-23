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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id('idrekam_medis');
            $table->unsignedBigInteger('id_pet');
            $table->date('tanggal');
            $table->text('keluhan');
            $table->text('diagnosa')->nullable();
            $table->unsignedBigInteger('id_perawat')->nullable();
            $table->unsignedBigInteger('id_dokter')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};
