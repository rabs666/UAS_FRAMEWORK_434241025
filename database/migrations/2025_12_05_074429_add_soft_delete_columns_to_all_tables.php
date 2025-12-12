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
        // Daftar tabel yang akan ditambahkan kolom soft delete
        $tables = [
            'users',
            'pet',
            'pemilik',
            'rekam_medis',
            'detail_rekaman_medis',
            'temu_dokter',
            'dokter',
            'perawat',
            'jenis_hewan',
            'ras_hewan',
            'kategori',
            'kategori_klinis',
            'kode_tindakan_terapi',
            'role',
            'role_user'
        ];

        foreach ($tables as $tableName) {
            if (Schema::hasTable($tableName)) {
                Schema::table($tableName, function (Blueprint $table) {
                    if (!Schema::hasColumn($table->getTable(), 'deleted_at')) {
                        $table->timestamp('deleted_at')->nullable();
                    }
                    if (!Schema::hasColumn($table->getTable(), 'deleted_by')) {
                        $table->unsignedBigInteger('deleted_by')->nullable();
                    }
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'users',
            'pet',
            'pemilik',
            'rekam_medis',
            'detail_rekaman_medis',
            'temu_dokter',
            'dokter',
            'perawat',
            'jenis_hewan',
            'ras_hewan',
            'kategori',
            'kategori_klinis',
            'kode_tindakan_terapi',
            'role',
            'role_user'
        ];

        foreach ($tables as $tableName) {
            if (Schema::hasTable($tableName)) {
                Schema::table($tableName, function (Blueprint $table) {
                    if (Schema::hasColumn($table->getTable(), 'deleted_at')) {
                        $table->dropColumn('deleted_at');
                    }
                    if (Schema::hasColumn($table->getTable(), 'deleted_by')) {
                        $table->dropColumn('deleted_by');
                    }
                });
            }
        }
    }
};
