<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'no_kk',
        'nik',
        'gender',
        'tgl_lahir',
        'tujuan',
        'kota_tujuan',
        'jumlah',
        'email_verified_at',
        'tempat_lahir',
        'nomor_bus',
        'status_mudik',
        'nomor_registrasi',
        'pass_code',
        'last_login',
        'periode_id'
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

    public function address()
    {
        return $this->hasOne(UserAdress::class, 'user_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id', 'id');
    }

    public function peserta()
    {
        return $this->hasMany(Peserta::class, 'user_id', 'id');
    }

    public function mudiktujuan()
    {
        return $this->hasOne(MudikTujuan::class, 'id', 'tujuan');
    }

    public function kotatujuan()
    {
        return $this->hasOne(MudikTujuanKota::class, 'id', 'kota_tujuan');
    }

    public function bus()
    {
        return $this->hasOne(Bus::class, 'id', 'nomor_bus');
    }

    public function userCity()
    {
        return $this->hasOneThrough(City::class, UserAdress::class, 'user_id', 'id', 'id', 'city');
    }
}
