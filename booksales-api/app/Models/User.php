<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject; // 🟩 tambahkan ini

class User extends Authenticatable implements JWTSubject // 🟩 implement interface JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * Atribut yang bisa diisi secara massal.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // 🟩 tambahkan juga role karena kamu pakai kolom ini
    ];

    /**
     * Atribut yang disembunyikan saat serialisasi.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Atribut yang dikonversi tipenya.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 🟩 DUA fungsi wajib dari JWTSubject
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
