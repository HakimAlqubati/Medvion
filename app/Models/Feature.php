<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Feature extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];

    public $translatable = ['title', 'description'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function booted()
    {
        static::saved(function () {
            \App\Services\Frontend\FeatureService::clearCache();
        });

        static::deleted(function () {
            \App\Services\Frontend\FeatureService::clearCache();
        });
    }
}
