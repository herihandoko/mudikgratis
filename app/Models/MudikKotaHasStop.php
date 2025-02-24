<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MudikKotaHasStop extends Model
{
    use HasFactory;

    protected $table = "mudik_kota_has_stop";

    public function kota() {
        return $this->hasOne(MudikRute::class,'id','id_rute');
    }
}
