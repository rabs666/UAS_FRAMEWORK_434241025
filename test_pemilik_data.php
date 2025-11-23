<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "=== PEMILIK TABLE STRUCTURE ===\n";
$cols = DB::select('SHOW COLUMNS FROM pemilik');
foreach($cols as $col) {
    echo "{$col->Field} ({$col->Type})\n";
}

echo "\n=== RONALD DATA (user table) ===\n";
$ronald = DB::table('user')->where('nama', 'LIKE', '%Ronald%')->first();
print_r($ronald);

echo "\n=== PEMILIK DATA (idpemilik=5) ===\n";
$pemilik = DB::table('pemilik')->where('idpemilik', 5)->first();
print_r($pemilik);

echo "\n=== TEMU DOKTER FOR PEMILIK 5 ===\n";
$temu = DB::table('temu_dokter')
    ->join('pet', 'temu_dokter.id_pet', '=', 'pet.id_pet')
    ->where('pet.idpemilik', 5)
    ->select('temu_dokter.*', 'pet.nama_pet')
    ->get();
echo "Count: " . $temu->count() . "\n";
print_r($temu->toArray());

echo "\n=== REKAM MEDIS FOR PEMILIK 5 ===\n";
$rekam = DB::table('rekam_medis')
    ->join('pet', 'rekam_medis.id_pet', '=', 'pet.id_pet')
    ->where('pet.idpemilik', 5)
    ->select('rekam_medis.*', 'pet.nama_pet')
    ->get();
echo "Count: " . $rekam->count() . "\n";
print_r($rekam->toArray());
