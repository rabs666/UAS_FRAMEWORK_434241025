<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RasHewan extends Model
{
    protected $table = 'ras_hewan';
    protected $primaryKey = 'idras_hewan';
    protected $fillable = ['nama_ras', 'idjenis_hewan'];
    public $timestamps = false; // Disable timestamps

    // Relationship: Many to One (inverse) - RasHewan belongs to JenisHewan
    public function jenisHewan()
    {
        return $this->belongsTo(JenisHewan::class, 'idjenis_hewan', 'idjenis_hewan');
    }

    // Relationship: One to Many - RasHewan has many Pets
    public function pets()
    {
        return $this->hasMany(Pet::class, 'idras_hewan', 'idras_hewan');
    }
}

