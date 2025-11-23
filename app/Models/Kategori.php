<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'idkategori';
    protected $fillable = ['nama_kategori'];
    public $timestamps = false; // Disable timestamps

    // Relationship: One to Many - Kategori has many KodeTindakanTerapi
    public function kodeTindakanTerapi()
    {
        return $this->hasMany(Kode_Tindakan_Terapi::class, 'idkategori', 'idkategori');
    }
}
