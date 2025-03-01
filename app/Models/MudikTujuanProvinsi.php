<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MudikTujuanProvinsi extends Model
{
    use HasFactory;

    protected $table = "mudik_tujuan_provinsi";

    public function tujuan()
    {
        return $this->hasOne(MudikTujuan::class, 'id', 'tujuan_id');
    }

    public function kota()
    {
        return $this->hasMany(MudikTujuanKota::class, 'provinsi_id', 'id');
    }

    public function kotax()
    {
        return $this->hasMany(MudikTujuanKota::class, 'provinsi_id', 'id')->where('status', 'inactive');
    }
}
