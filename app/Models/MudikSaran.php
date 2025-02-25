<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MudikSaran extends Model
{
    use HasFactory;

    protected $table = 'mudik_saran';

    protected $fillable = [
        'saran',
        'masukan',
        'phone_number',
        'created_at',
        'created_by'
    ];

    public function respon(): HasMany
    {
        return $this->hasMany(CorrespondentHasAnswer::class, 'id_answer', 'id');
    }
}
