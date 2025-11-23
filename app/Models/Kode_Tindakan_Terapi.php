<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kode_Tindakan_Terapi extends Model
{
    protected $table = 'kode_tindakan_terapi';
    protected $primaryKey = 'idkode_tindakan_terapi';
    protected $fillable = ['kode', 'deskripsi_tindakan_terapi', 'idkategori', 'idkategori_klinis'];
    public $timestamps = false; // Disable timestamps

    // Relationship: Many to One (inverse) - KodeTindakanTerapi belongs to Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'idkategori', 'idkategori');
    }

    // Relationship: Many to One (inverse) - KodeTindakanTerapi belongs to KategoriKlinis
    public function kategoriKlinis()
    {
        return $this->belongsTo(Kategori_Klinis::class, 'idkategori_klinis', 'idkategori_klinis');
    }

    // Relationship: One to Many - KodeTindakanTerapi has many DetailRekamMedis
    public function detailRekamMedis()
    {
        return $this->hasMany(Detail_Rekaman_Medis::class, 'idkode_tindakan_terapi', 'idkode_tindakan_terapi');
    }
}