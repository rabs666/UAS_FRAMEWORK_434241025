<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rekam_Medis extends Model
{
    use SoftDeletes;

    protected $table = 'rekam_medis';
    protected $primaryKey = 'idrekam_medis';
    protected $fillable = ['id_pet', 'tanggal', 'keluhan', 'diagnosa', 'id_perawat', 'id_dokter', 'deleted_by'];
    protected $dates = ['deleted_at'];

    // Relationship: Many to One (inverse) - RekamMedis belongs to Pet
    public function pet()
    {
        return $this->belongsTo(Pet::class, 'id_pet', 'id_pet');
    }

    // Relationship: Many to One (inverse) - RekamMedis belongs to Dokter
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id_dokter');
    }

    // Relationship: Many to One (inverse) - RekamMedis belongs to Perawat
    public function perawat()
    {
        return $this->belongsTo(Perawat::class, 'id_perawat', 'id_perawat');
    }

    // Relationship: One to Many - RekamMedis has many DetailRekamMedis
    public function detailRekamMedis()
    {
        return $this->hasMany(Detail_Rekaman_Medis::class, 'idrekam_medis', 'idrekam_medis');
    }
}