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
        Schema::create('detail_rekaman_medis', function (Blueprint $table) {
            $table->id('iddetail_rekaman_medis');
            $table->unsignedBigInteger('idrekam_medis');
            $table->integer('idkode_tindakan_terapi')->unsigned();
            $table->text('hasil')->nullable();
            $table->text('catatan')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_rekaman_medis');
    }
};
