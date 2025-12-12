<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perawat extends Model
{
    use SoftDeletes;

    protected $table = 'perawat';
    protected $primaryKey = 'id_perawat';
    
    protected $fillable = [
        'alamat',
        'no_hp',
        'jenis_kelamin',
        'pendidikan',
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
