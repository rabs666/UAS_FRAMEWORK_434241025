<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'iduser';
    public $timestamps = false; // Disable timestamps

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
    ];

    // Accessor untuk mapping kolom nama ke name
    public function getNameAttribute()
    {
        return $this->attributes['nama'] ?? null;
    }

    // Mutator untuk mapping kolom name ke nama
    public function setNameAttribute($value)
    {
        $this->attributes['nama'] = $value;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function pemilik()
    {
        return $this->hasOne(Pemilik::class, 'iduser', 'iduser');
    }

    public function roleUsers()
    {
        return $this->hasMany(Role_User::class, 'iduser', 'iduser');
    }

    // Relationship: Many to Many - User has many Roles through RoleUser
    public function roles()
    {
        return $this->hasManyThrough(Role::class, Role_User::class, 'iduser', 'idrole', 'iduser', 'idrole');
    }
}
