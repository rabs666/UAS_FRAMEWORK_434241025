<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "=== PEMILIK TABLE STRUCTURE ===\n";
$cols = DB::select('SHOW COLUMNS FROM pemilik');
foreach($cols as $col) {
    echo "{$col->Field} | {$col->Type} | Key: {$col->Key} | Extra: {$col->Extra}\n";
}
