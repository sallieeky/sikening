<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
        'foto',
        'status',
        'alamat',
        'kota',
        'provinsi',
        'kode_pos'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }
    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
    public function aktifitas()
    {
        return $this->hasMany(Aktifitas::class);
    }
    public function keuangan()
    {
        return $this->hasMany(Keuangan::class);
    }
}
