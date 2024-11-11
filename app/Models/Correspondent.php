<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Correspondent extends Model
{
    use HasFactory;

    protected $table = "correspondent";

    protected $fillable = [
        'uuid',
        'phone_number',
        'id_period',
        'id_user',
        'created_at',
        'created_by'
    ];

    public function period(): HasOne
    {
        return $this->hasOne(MudikPeriod::class, 'id', 'id_period');
    }
}
