<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MudikTujuan extends Model
{
    use HasFactory;

    protected $table = "mudik_tujuan";

    public function provinsis()
    {
        return $this->hasMany(MudikTujuanProvinsi::class, 'tujuan_id', 'id');
    }
    public function period(): HasOne
    {
        return $this->hasOne(MudikPeriod::class, 'id', 'id_period');
    }
}
