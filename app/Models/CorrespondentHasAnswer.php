<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorrespondentHasAnswer extends Model
{
    use HasFactory;

    protected $table = "correspondent_has_answer";

    protected $fillable = [
        'id_correspondent',
        'id_question',
        'id_answer',
        'nilai',
        'created_at',
        'created_by',
        'id_period',
    ];
}
