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
}
