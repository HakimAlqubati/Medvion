<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurveyAnswer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'survey_submission_id',
        'survey_question_id',
        'answer_value',
        'answer_json',
    ];

    protected $casts = [
        'answer_json' => 'array',
    ];

    public function submission()
    {
        return $this->belongsTo(SurveySubmission::class, 'survey_submission_id');
    }

    public function question()
    {
        return $this->belongsTo(SurveyQuestion::class, 'survey_question_id');
    }
}
