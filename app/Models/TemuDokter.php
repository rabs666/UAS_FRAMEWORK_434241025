<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TemuDokter extends Model
{
    use SoftDeletes;

    protected $table = 'temu_dokter';
    protected $primaryKey = 'id_temu_dokter';
    protected $fillable = ['id_pet', 'id_dokter', 'tanggal_temu', 'jam_temu', 'keluhan_awal', 'status', 'deleted_by'];
    protected $dates = ['deleted_at'];

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
