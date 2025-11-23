<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail_Rekaman_Medis extends Model
{
    protected $table = 'detail_rekaman_medis';
    protected $primaryKey = 'iddetail_rekaman_medis';
    protected $fillable = ['idrekam_medis', 'idkode_tindakan_terapi', 'hasil', 'catatan'];

    // Relationship: Many to One (inverse) - DetailRekamMedis belongs to RekamMedis
    public function rekamMedis()
    {
        return $this->belongsTo(Rekam_Medis::class, 'idrekam_medis', 'idrekam_medis');
    }

    // Relationship: Many to One (inverse) - DetailRekamMedis belongs to KodeTindakanTerapi
    public function kodeTindakanTerapi()
    {
        return $this->belongsTo(Kode_Tindakan_Terapi::class, 'idkode_tindakan_terapi', 'idkode_tindakan_terapi');
    }
}