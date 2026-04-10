<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurveySubmission extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'survey_id',
        'applicant_email',
        'user_id',
        'status',
        'score',
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function answers()
    {
        return $this->hasMany(SurveyAnswer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
