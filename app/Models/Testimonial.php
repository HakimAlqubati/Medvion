<?php

namespace App\Models;

use App\Enums\TestimonialStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $guarded = [];

    public $translatable = ['client_name', 'role', 'content'];

    protected $casts = [
        'status' => TestimonialStatus::class,
    ];

    protected static function booted()
    {
        static::saved(function () {
            \App\Services\Frontend\TestimonialService::clearCache();
        });

        static::deleted(function () {
            \App\Services\Frontend\TestimonialService::clearCache();
        });

        static::restored(function () {
            \App\Services\Frontend\TestimonialService::clearCache();
        });

        static::forceDeleted(function () {
            \App\Services\Frontend\TestimonialService::clearCache();
        });
    }
}
