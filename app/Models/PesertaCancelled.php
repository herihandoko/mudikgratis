<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PesertaCancelled extends Model
{
    use HasFactory;

    protected $table = "pesertas_cancelled";

    public function user()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function KotaTujuan(): HasOne
    {
        return $this->hasOne(MudikTujuanKota::class, 'id', 'kota_tujuan_id');
    }

    public function profile(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
