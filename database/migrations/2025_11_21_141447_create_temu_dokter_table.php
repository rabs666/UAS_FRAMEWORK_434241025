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
        Schema::create('temu_dokter', function (Blueprint $table) {
            $table->id('id_temu_dokter');
            $table->unsignedBigInteger('id_pet');
            $table->unsignedBigInteger('id_dokter');
            $table->date('tanggal_temu');
            $table->time('jam_temu');
            $table->text('keluhan_awal')->nullable();
            $table->enum('status', ['Menunggu', 'Selesai', 'Batal'])->default('Menunggu');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temu_dokter');
    }
};
