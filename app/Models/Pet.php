<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use SoftDeletes;

    protected $table = 'pet';
    protected $primaryKey = 'id_pet';
    protected $fillable = ['nama_pet', 'jenis_kelamin', 'tanggal_lahir', 'idras_hewan', 'idpemilik', 'deleted_by'];
    protected $dates = ['deleted_at'];

    // Relationship: Many to One (inverse) - Pet to RasHewan
    public function rasHewan()
    {
        return $this->belongsTo(RasHewan::class, 'idras_hewan', 'idras_hewan');
    }

    // Relationship: Many to One (inverse) - Pet to Pemilik
    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class, 'idpemilik', 'idpemilik');
    }

    // Relationship: One to Many - Pet has many RekamMedis
    public function rekamMedis()
    {
        return $this->hasMany(Rekam_Medis::class, 'id_pet', 'id_pet');
    }

    // Relationship: One to Many - Pet has many TemuDokter
    public function temuDokter()
    {
        return $this->hasMany(TemuDokter::class, 'id_pet', 'id_pet');
    }
}
