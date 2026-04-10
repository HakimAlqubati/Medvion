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

    public function analyze()
    {
        $answers = $this->answers()->with('question')->get()->keyBy('question.key');

        $status = 'pending';
        $score = 50; // Starting base score

        // 1. Check Experience Level
        $expLevel = $answers->get('experience_level')?->answer_value;
        if ($expLevel === 'مبتدئ') {
            $status = 'rejected';
            $score -= 30;
        } elseif ($expLevel === 'خبير') {
            $score += 20;
        }

        // 2. Check Years of Experience
        $expYears = $answers->get('exp_years')?->answer_value;
        if ($expYears === 'أقل من سنة') {
            $status = 'rejected';
            $score -= 20;
        } elseif (in_array($expYears, ['5–10 سنوات', 'أكثر من 10 سنوات'])) {
            $score += 15;
        }

        // 3. Check Training Experience
        $hasTraining = $answers->get('has_training_exp')?->answer_value;
        if ($hasTraining === 'نعم') {
            $score += 15;
        } else {
            $score -= 5;
        }

        // 4. Check Content Readiness
        $hasContent = $answers->get('has_content')?->answer_value;
        if ($hasContent === 'نعم') {
            $score += 10;
            if ($expLevel === 'خبير' || $expLevel === 'متقدم') {
                $status = 'priority';
            }
        }

        // 5. Final Categorization for Elite
        if ($score >= 85 && $status !== 'rejected') {
            $status = 'elite';
        }

        $this->update([
            'status' => $status,
            'score' => max(0, min(100, $score)),
        ]);
    }
}
