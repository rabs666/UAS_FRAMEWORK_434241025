<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori_Klinis extends Model
{
    protected $table = 'kategori_klinis';
    protected $primaryKey = 'idkategori_klinis';
    protected $fillable = ['nama_kategori_klinis'];
    public $timestamps = false; // Disable timestamps

    // Relationship: One to Many - KategoriKlinis has many KodeTindakanTerapi
    public function kodeTindakanTerapi()
    {
        return $this->hasMany(Kode_Tindakan_Terapi::class, 'idkategori_klinis', 'idkategori_klinis');
    }
}
