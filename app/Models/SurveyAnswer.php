<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SurveyAnswer extends Model
{
    use HasFactory;

    protected $table = 'survey_answer';

    protected $fillable = [
        'jawaban',
        'question_id',
        'nilai',
        'sorting',
        'color',
        'icon',
        'created_at',
        'created_by'
    ];

    public function respon(): HasMany
    {
        return $this->hasMany(CorrespondentHasAnswer::class, 'id_answer', 'id');
    }
}
