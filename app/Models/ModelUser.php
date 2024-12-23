<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Sudah cukup extend ini
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ModelUser extends Authenticatable
{
    use HasApiTokens, Notifiable;

    // Tentukan nama tabel yang digunakan
    protected $table = 'users';

    // Tentukan primary key jika berbeda dari 'id'
    protected $primaryKey = 'id';

    // Tentukan apakah primary key auto increment
    public $incrementing = false;

    // Tentukan kolom yang dapat diisi secara massal (mass assignment)
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'author_id');
    }
}
