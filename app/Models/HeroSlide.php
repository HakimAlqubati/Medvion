<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HeroSlide extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];

    public $translatable = ['badge', 'title_1', 'title_2', 'subtitle'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Intelligent Accessor for Image:
     * Returns the image if it exists, otherwise falls back to a default local image.
     */
    public function getImageUrlAttribute()
    {
        if (!empty($this->image)) {
            if (filter_var($this->image, FILTER_VALIDATE_URL)) {
                return $this->image;
            }
            if (\Illuminate\Support\Facades\Storage::disk('public')->exists($this->image)) {
                return \Illuminate\Support\Facades\Storage::disk('public')->url($this->image);
            }
        }
        
        // Fallback to exactly the first available banner image
        return asset('images/hero-slide-1.png');
    }
}
