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

    public function userKota()
    {
        return $this->hasMany(User::class, 'kota_tujuan', 'id');
    }

    public function rutes()
    {
        return $this->belongsToMany(MudikRute::class, 'mudik_kota_has_rute', 'id_kota', 'id_rute')->where('is_rute', 1)->orderBy('sorting','asc');
    }

    public function pemberhentian()
    {
        return $this->belongsToMany(MudikRute::class, 'mudik_kota_has_stop', 'id_kota', 'id_rute')->where('is_stop', 1)->orderBy('sorting','asc');
    }

    public function tujuan()
    {
        return $this->hasOne(MudikTujuan::class, 'id', 'tujuan_id');
    }
}
