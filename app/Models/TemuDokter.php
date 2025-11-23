<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemuDokter extends Model
{
    protected $table = 'temu_dokter';
    protected $primaryKey = 'id_temu_dokter';
    protected $fillable = ['id_pet', 'id_dokter', 'tanggal_temu', 'jam_temu', 'keluhan_awal', 'status'];

    // Relationship: Many to One (inverse) - TemuDokter belongs to Pet
    public function pet()
    {
        return $this->belongsTo(Pet::class, 'id_pet', 'id_pet');
    }

    // Relationship: Many to One (inverse) - TemuDokter belongs to Dokter
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id_dokter');
    }
}
