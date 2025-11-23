<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate tables first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('role_user')->truncate();
        DB::table('dokter')->truncate();
        DB::table('perawat')->truncate();
        DB::table('pemilik')->truncate();
        DB::table('user')->truncate();
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Password untuk semua user: 123456
        $password = Hash::make('123456');

        // 1. Admin User
        // Insert ke tabel user (untuk role_user FK)
        $adminUserIdOld = DB::table('user')->insertGetId([
            'nama' => 'Admin System',
            'email' => 'admin@clinic.com',
            'password' => $password,
        ]);

        // Insert ke tabel users (untuk Laravel auth)
        $adminUserId = DB::table('users')->insertGetId([
            'name' => 'Admin System',
            'email' => 'admin@clinic.com',
            'password' => $password,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('role_user')->insert([
            'iduser' => $adminUserIdOld,
            'idrole' => 1, // Administrator
        ]);

        // 2. Dokter User
        // Insert ke tabel user (untuk role_user FK)
        $dokterUserIdOld = DB::table('user')->insertGetId([
            'nama' => 'Dr. Budi Santoso',
            'email' => 'dokter@clinic.com',
            'password' => $password,
        ]);

        // Insert ke tabel users (untuk Laravel auth dan dokter FK)
        $dokterUserId = DB::table('users')->insertGetId([
            'name' => 'Dr. Budi Santoso',
            'email' => 'dokter@clinic.com',
            'password' => $password,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('role_user')->insert([
            'iduser' => $dokterUserIdOld,
            'idrole' => 2, // Dokter
        ]);

        // Insert ke tabel dokter
        DB::table('dokter')->insert([
            'id_user' => $dokterUserId,
            'bidang_dokter' => 'Dokter Hewan Umum',
            'alamat' => 'Jl. Sudirman No. 45',
            'no_hp' => '081234567890',
            'jenis_kelamin' => 'L',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 3. Perawat User
        $perawatUserIdOld = DB::table('user')->insertGetId([
            'nama' => 'Siti Nurhaliza',
            'email' => 'perawat@clinic.com',
            'password' => $password,
        ]);

        $perawatUserId = DB::table('users')->insertGetId([
            'name' => 'Siti Nurhaliza',
            'email' => 'perawat@clinic.com',
            'password' => $password,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('role_user')->insert([
            'iduser' => $perawatUserIdOld,
            'idrole' => 3, // Perawat
        ]);

        // Insert ke tabel perawat
        DB::table('perawat')->insert([
            'id_user' => $perawatUserId,
            'alamat' => 'Jl. Gatot Subroto No. 12',
            'no_hp' => '081234567891',
            'jenis_kelamin' => 'P',
            'pendidikan' => 'D3 Keperawatan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 4. Resepsionis User
        $resepsionisUserIdOld = DB::table('user')->insertGetId([
            'nama' => 'Dewi Lestari',
            'email' => 'resepsionis@clinic.com',
            'password' => $password,
        ]);

        DB::table('users')->insertGetId([
            'name' => 'Dewi Lestari',
            'email' => 'resepsionis@clinic.com',
            'password' => $password,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('role_user')->insert([
            'iduser' => $resepsionisUserIdOld,
            'idrole' => 4, // Resepsionis
        ]);

        // 5. Pemilik User
        $pemilikUserIdOld = DB::table('user')->insertGetId([
            'nama' => 'Ahmad Yani',
            'email' => 'pemilik@clinic.com',
            'password' => $password,
        ]);

        $pemilikUserId = DB::table('users')->insertGetId([
            'name' => 'Ahmad Yani',
            'email' => 'pemilik@clinic.com',
            'password' => $password,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('role_user')->insert([
            'iduser' => $pemilikUserIdOld,
            'idrole' => 5, // Pemilik
        ]);

        // Insert ke tabel pemilik
        DB::table('pemilik')->insert([
            'idpemilik' => $pemilikUserIdOld,
            'id_user' => $pemilikUserId,
            'iduser' => $pemilikUserIdOld,
            'alamat' => 'Jl. Merdeka No. 123, Jakarta',
            'no_wa' => '081234567892',
        ]);

        echo "✅ Login credentials created:\n";
        echo "1. Admin - Email: admin@clinic.com | Password: 123456\n";
        echo "2. Dokter - Email: dokter@clinic.com | Password: 123456\n";
        echo "3. Perawat - Email: perawat@clinic.com | Password: 123456\n";
        echo "4. Resepsionis - Email: resepsionis@clinic.com | Password: 123456\n";
        echo "5. Pemilik - Email: pemilik@clinic.com | Password: 123456\n";
    }
}
