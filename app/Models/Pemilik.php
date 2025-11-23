<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    protected $table = 'pemilik';
    protected $primaryKey = 'idpemilik';
    public $incrementing = false; // idpemilik is not auto-increment
    protected $fillable = ['idpemilik', 'iduser', 'alamat', 'no_wa'];
    public $timestamps = false; // Disable timestamps

    // Relationship: One to One (inverse) - Pemilik belongs to User
    public function user()
    {
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    }

    // Relationship: One to Many - Pemilik has many Pets
    public function pets()
    {
        return $this->hasMany(Pet::class, 'idpemilik', 'idpemilik');
    }
}