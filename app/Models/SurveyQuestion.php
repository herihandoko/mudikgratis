<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SurveyQuestion extends Model
{
    use HasFactory;

    protected $table = 'survey_question';

    public function answers()
    {
        return $this->hasMany(SurveyAnswer::class, 'question_id', 'id')->orderBy('sorting', 'asc');
    }

    public function period(): HasOne
    {
        return $this->hasOne(MudikPeriod::class, 'id', 'id_period');
    }

    protected static function booted()
    {
        static::deleting(function ($detail) {
            $detail->answers()->delete();
        });
    }

    public function respondenAnswer()
    {
        return $this->hasMany(CorrespondentHasAnswer::class, 'id_question', 'id');
    }
}
