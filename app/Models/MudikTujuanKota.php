<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MudikTujuanKota extends Model
{
    use HasFactory;

    protected $table = "mudik_tujuan_kota";

    public function provinsi()
    {
        return $this->hasOne(MudikTujuanProvinsi::class, 'id', 'provinsi_id');
    }

    public function bus()
    {
        return $this->hasManyThrough(Bus::class, MudikTujuanKotaHasBus::class, 'kota_tujuan', 'id', 'id', 'bus_id');
    }

    public function pesertaKota()
    {
        return $this->hasMany(Peserta::class, 'kota_tujuan_id', 'id');
    }
}
