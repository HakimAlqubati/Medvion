<?php

namespace App\Services\Frontend;

use App\Models\Testimonial;
use App\Enums\TestimonialStatus;
use Illuminate\Support\Facades\Cache;

class TestimonialService
{
    /**
     * Get active testimonials for the landing page.
     */
    public static function getActiveTestimonials()
    {
        $locale = app()->getLocale();
        $cacheKey = "testimonials.active.{$locale}";

        return Cache::remember($cacheKey, now()->addHours(2), function () {
            return Testimonial::where('status', TestimonialStatus::ACTIVE)
                ->latest()
                ->get();
        });
    }
}
