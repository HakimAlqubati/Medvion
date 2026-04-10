<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class SurveyQuestion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'survey_id',
        'question_text',
        'type',
        'options',
        'is_required',
        'order',
        'created_by',
    ];

    protected $casts = [
        'options' => 'array',
        'is_required' => 'boolean',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (Auth::check() && empty($model->created_by)) {
                $model->created_by = Auth::id();
            }
        });
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function answers()
    {
        return $this->hasMany(SurveyAnswer::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
