<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dokter extends Model
{
    use SoftDeletes;

    protected $table = 'dokter';
    protected $primaryKey = 'id_dokter';
    
    protected $fillable = [
        'alamat',
        'no_hp',
        'bidang_dokter',
        'jenis_kelamin',
        'id_user',
        'deleted_by'
    ];
    protected $dates = ['deleted_at'];
    
    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'iduser');
    }
}
